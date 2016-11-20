<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
					//Codeigniter Pagination Configurations

	$config['base_url'] 			= 'http://localhost:8081/LMS/index.php';
	$config['total_rows'] 			= $total_rows_records;
	$config['per_page'] 			= $this->limit;
	$config['uri_segment'] 			= 3;
	$this->pagination->initialize($config);
	$page_links 					= $this->pagination->create_links();


					//Ajax Pagination Configurations

	$config['target']      = '.resultTable';
	$config['base_url']    = base_url().'index.php/Auth/ajaxPaginationData';
	$config['total_rows']  = $total_rows;
	$config['per_page']    = $per_page;
	$this->ajax_pagination->initialize($config);
*/


if ( ! function_exists('pagination') ) 
{
	function pagination($total_rows, $per_page, $url = null, $uri_segment = 3)
	{
		$ci =& get_instance();

		if (is_null($url)) {
			$segment[] = $ci->router->class;
			$segment[] = $ci->router->method;
			$url = implode("/", $segment);
		}

		$config['base_url']    = site_url($url);
		$config['total_rows']  = $total_rows;
		$config['uri_segment'] = $uri_segment;
		$config['per_page']    = $per_page;

		$ci->load->library('pagination');		
		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
	}

	function ajax_pagination($total_rows, $per_page, $url = null, $uri_segment = 3)
	{
		$ci =& get_instance();

		if (is_null($url)) {
			$segment[] = $ci->router->class;
			$segment[] = $ci->router->method;
			$url = implode("/", $segment);
		}

		$config['target']      = '.resultTable';
		$config['base_url']    = site_url($url);
		$config['total_rows']  = $total_rows;
		$config['per_page']    = $per_page;
		$ci->ajax_pagination->initialize($config);

		return $ci->ajax_pagination->create_links();
	}
}