<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workorderlist_update extends CI_Controller {

	public function index() 
	{
    $this ->load->view("head");
		$this ->load->view("left");
		$this ->load->view("Content_workorderlist_update");
	}
}