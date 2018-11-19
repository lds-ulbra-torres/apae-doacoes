<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BirthdaysController extends CI_Controller {

  const PER_PAGE = 10;

  public function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
    }
  }

  private function loadFormDependencies($data=NULL) {
    $data['cidades'] = $this->CitiesModel->GetAllCities();
    $data['contact_types'] = $this->AssociatedModel->getAllContactTypes();
    $data['payment_types'] = $this->AssociatedModel->getAllPaymentTypes();
    $data['frequencias'] = $this->FrequencyModel->getAll();
    $data['banks'] = $this->BanksModel->getAll();
    return $data;
  }

  private function loadFormRules() {
    $this->form_validation->set_rules('uuid_associate', 'UUID', 'required|is_unique[associated.uuid_associate]');
    $this->form_validation->set_rules('name_associate', 'Nome', 'required');
    $this->form_validation->set_rules('rg', 'RG', 'required|is_unique[associated.rg]');
    $this->form_validation->set_rules('cpf', 'CPF', 'required|is_unique[associated.cpf]');
    $this->form_validation->set_rules('birth_date', 'Data de Nascimento', 'required');
    $this->form_validation->set_rules('duo_date', 'Data de Vencimento', 'required');
    $this->form_validation->set_rules('value_frequency', 'Valor de Contribuição', 'required');
    $this->form_validation->set_rules('id_payment_type', 'Tipo de Pagamento', 'required');
  }

/* GET /associated *birthdays* */
  public function index($searchText=NULL) {

    $searchText = $this->input->get('month');
    $data['mesAtual'] = (empty($searchText) ? date('n', time()) : $searchText);  
    $getPage = (int) $this->input->get("page");
    $data['search'] = $searchText;
    $baseUrl = base_url('birthdays?month='. urlencode($searchText));

    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE; 

    $totalRows = $this->BirthdaysModel->totalCount($data);
    $data['months'] = $this->BirthdaysModel->getAllMonths();
    $data['birthdays'] = $this->BirthdaysModel->getBirthdaysMonths($data, self::PER_PAGE, $page);
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();   
    
    $this->template->load('template', 'birthdays/listBirthdays', $data);
  }

/* GET /birthdays?month={queryString} */
  public function Search() {
    $data['months'] = $this->BirthdaysModel->getAllMonths();// dropdown list
    $searchText = $this->input->get('month');
    $data['mesAtual'] = $searchText;
    $getPage = (int) $this->input->get("page");
    $data['search'] = $searchText;
    $baseUrl = base_url('birthdays?month='. urlencode($searchText));
    $totalRows = $this->BirthdaysModel->searchTotalCount($searchText);
    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
    $data['birthdays'] = $this->BirthdaysModel->getBirthdaysMonths(self::PER_PAGE, $page, $searchText);
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $this->template->load('template', 'birthdays/listBirthdays', $data);
  }

  public function CreateMessage(){ //pagina de edição
    $data['email'] = $this->ReturnIdSelected();
    $this->template->load('template', 'birthdays/createMessage', $data);
  }

  public function ReturnIdSelected(){ // retorna os selecionados
    if(isset($_POST['checked'])){
      $checked = $_POST['checked'];
        foreach ($checked as $key => $value) {
          $selecionados[] = $value;
        }
    } else { 
      $this->index(); 
    }
    return $selecionados;
  }

  public function Send(){

    $id = $this->ReturnIdSelected(); // recebe os id's selecionados no checkbox
    $data['email'] = $this->BirthdaysModel->getDataBirthdays($id); // recebe lista de emails
    
    foreach ($data['email'] as $key => $value) { // coloca a lista de emails em um vetor
      $to[] = $value->email_associate;
    }

    $route = null;
    if (isset($_FILES)) {
      $tmp = $_FILES['photo_birthdays']['tmp_name'];
      $name = $_FILES['photo_birthdays']['name'];
      $type = substr($name, -4, 4);
      $new_name = md5($name.microtime());
      $dir = './uploads/';
      $route = $dir . $new_name . $type;

      if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
      }
      move_uploaded_file($tmp, $route); 
    }

      $subject = $_POST['subject'];
      $mensagem = nl2br($_POST['message']);
      $image = base_url('uploads/' . $new_name . $type);  

      $stringmail = $this->htmlMail($subject, $mensagem, $image);

      $dataMsg =  $this->ConfigMail($to, $subject, $stringmail);

     $this->template->load('template', 'birthdays/send');
  }
  
  public function htmlMail($subject, $mensagem, $image){

    return $html = "    
      <img src=\" $image \" alt=\"\">
    
      <h1 style='position: absolute; top: 150px; left: 50px; font-size:20pt;'>{$subject}</h1>
  
      <h2 style='position: absolute;top: 230px;left: 60px; font-size: 14pt;'>{$mensagem}</h2>
    ";
  }


  public function ConfigMail($to, $subject, $txt){
    require 'assets/mailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = $_ENV["email"];
    $mail->Password = $_ENV["senhaEmail"];
    $mail->Port = 587;
    $mail->CharSet   = 'utf-8';
    $mail->setFrom('apae@gmail.com');
    $mail->isHTML(true);

    foreach ($to as $key => $value) {
      $mail->addBCC($value);      
    }
    
    $mail->MsgHTML($txt);
    $mail->Subject = $subject;
    $mail->Body    = $txt;
    $mail->AltBody = $txt;
    $mail->setLanguage('pt');

    if(!$mail->send()) {
      echo 'Não foi possível enviar a mensagem.<br>';
      echo 'Erro: ' . $mail->ErrorInfo;
    } else {
      return 'Mensagem enviada.';
    }
  }

}
