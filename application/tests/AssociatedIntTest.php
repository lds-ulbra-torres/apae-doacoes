<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AssociatedIntTest {

  private $CI;

  const DEFAULT_UUID = '00000';

  const DEFAULT_ASSOCIATE = [
    'uuid_associate'  => self::DEFAULT_UUID,
    'name_associate'  => 'John',
    'email_associate' => 'john@localhost',
    'birth_date'      => '2000-01-01',
    'cpf'             => '00.000.000/0000-00',
    'rg'              => '000000000000',
    'id_city'         => '8004',
    'cep'             => '00000-000',
    'street'          => 'Rua',
    'number'          => '0',
    'neighborhood'    => 'Bairro',
    'complement'      => 'Complemento',
    'id_frequency'    => '2',
    'duo_date'        => '2000-01-01',
    'value_frequency' => '0',
    'id_payment_type' => '2',
    'term_route'      => '0',
    'name_in_card'    => '',
    'agency_number'   => '',
    'account_number'  => '',
    'obs'             => 'Observações'
  ];

  public function __construct() {
    $this->CI =& get_instance();
    $this->CI->load->library('unit_test');
    $this->CI->load->model('AssociatedModel');
  }

  public function doAllTests() {
    $this->testInsertAssociated();
    $this->assertAssociatedExistsInDb();
    $this->assertAssociatedIsDeleted();
    echo $this->CI->unit->report();
  }

  public function testInsertAssociated() {
    $dbSizeBeforeInsert = $this->CI->AssociatedModel->totalCount();
    $id = $this->CI->AssociatedModel->create(self::DEFAULT_ASSOCIATE);
    $dbSizeAfterInsert = $this->CI->AssociatedModel->totalCount();
    $this->CI->unit->run($id, 'is_int', 'O registro foi inserido no banco');
    $this->CI->unit->run($id !== 0, TRUE, 'O id retornado é diferente de 0');
    $this->CI->unit->run($dbSizeBeforeInsert !== $dbSizeAfterInsert, TRUE, 'O count da tabela é maior após a inserção');
  }

  private function assertAssociatedExistsInDb() {
    $associate = $this->CI->AssociatedModel->getByUuidLazy(self::DEFAULT_UUID);
    $this->CI->unit->run($associate, 'is_object', 'O registro existe no banco');
  }

  private function assertAssociatedIsDeleted() {
    $associate = $this->CI->AssociatedModel->getByUuidLazy(self::DEFAULT_UUID);
    $this->CI->AssociatedModel->delete($associate->id_associate);
    $associate = $this->CI->AssociatedModel->getByUuidLazy(self::DEFAULT_UUID);
    $this->CI->unit->run($associate, 'is_null', 'O registro foi removido do banco');
  }
}
