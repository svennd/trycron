<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ping extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
		
		// helpers
		$this->load->helper('url');
		$this->load->helper('date');
		
		// models
		$this->load->model('Ping_model', 'ping');
		$this->load->model('Ping_log_model', 'plog');
    }
	
	public function index()
	{
		echo "ping::index()";
	}
	
	# got a ping
	# now store it
	public function send_ping($hash = false)
	{
		// verify if we know this hash
		$ping_info = $this->ping->where('hash', $hash)->get();
		
		if ($ping_info)
		{
			// update count for this ping
			$this->ping->update_count($hash);
		
			// add ping
			$this->plog->insert(array(
											'hash'     => $ping_info['hash'],
											'location' => $this->input->ip_address()
			));
			
			// return response code
			http_response_code(200);
		}
		else			
		{
			// not ok
			http_response_code(400);
		}
	}
		
	# get specific cron info
	public function get_cron($id = false)
	{
		$this->load->view('ping/cron_details', 
						array(
								'cron_detail' 	=> $this->ping->get($id),
								'cron_pings' 	=> $this->plog->where(array("hash" => $id))->limit(5)->order_by("created_at",'DESC')->get_all()
						)
		);
	}
	
	# list crons
	public function list_cron()
	{
		if ($this->input->post())
		{
			$this->add();
		}
	
		// get all crons from db
		$all_cron = $this->ping->get_all();
		
		// page with all cron links
		$this->load->view('ping/list_cron', array('cron_list' => $all_cron));
	}
	
	# add a cron
	private function add()
	{
		// input handling
		$cron_id = ($this->input->post('cron_id')) ? $this->input->post('cron_id') : false;
		$description = ($this->input->post('description')) ? $this->input->post('description') : null;
		$exp_result = ($this->input->post('exp_result')) ? $this->input->post('exp_result') : null;
		$cron_script = ($this->input->post('cron_script')) ? $this->input->post('cron_script') : null;
		
		if ($cron_id) 
		{
			$this->ping->insert(array(	
										"hash" 					=> $cron_id,
										"cron_code" 			=> $cron_script,
										"descr" 				=> $description,
										"expected_result" 		=> $exp_result,
										"count"					=> 0
			));
		}
		
		// in any case
		return;
	}
}
