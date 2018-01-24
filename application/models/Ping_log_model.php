<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ping_log_model extends MY_Model
{
    public $table = 'ping_log';
    public $primary_key = 'id';
		
    public function __construct()
    {
        parent::__construct();
		
		$this->has_one['ping'] = array(
											'foreign_model'	=> 'Ping_model',
											'foreign_table'	=> 'ping',
											'foreign_key'	=> 'hash',
											'local_key'		=> 'hash'
										);   
    }
}