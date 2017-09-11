<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @description Helper para paginação do codeigniter
 * *pode melhorar, o controller ta com um trecho de codigo bem estranho.
 * @param baseUrl A base url do serviço. Ex: api/users
 * @param totalRows Total de linhas da tabela, total_count
 * @param perPage A quantidade de itens por pagina, padrão 10.
 *
 */
function PaginationHelper($baseUrl, $totalRows, $perPage) {
  $config['base_url'] = $baseUrl ? $baseUrl : base_url();
  $config['total_rows'] = $totalRows ? $totalRows : 0;
  $config['per_page'] = $perPage ? $perPage : 10;
  $config['page_query_string'] = TRUE;
  $config['query_string_segment'] = 'page';
  $config['use_page_numbers'] = TRUE;
  $config["num_links"] = 5; // floor($config["total_rows"]/$config["per_page"]);
  // bootstrap dom
  $config['full_tag_open'] = '<ul class="pagination">';
  $config['full_tag_close'] = '</ul>';
  $config['first_link'] = false;
  $config['last_link'] = false;
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['prev_link'] = '&laquo';
  $config['prev_tag_open'] = '<li class="prev">';
  $config['prev_tag_close'] = '</li>';
  $config['next_link'] = '&raquo';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';
  $config['cur_tag_open'] = '<li class="active"><a href="#">';
  $config['cur_tag_close'] = '</a></li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';
  return $config;
}
