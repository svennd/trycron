<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ping_model extends MY_Model
{
    public $table = 'ping';
    public $primary_key = 'hash';
		
    public function __construct()
    {
        parent::__construct();
		
		$this->has_many['ping_log'] = array(
											'foreign_model'	=> 'Ping_log_model',
											'foreign_table'	=> 'ping_log',
											'foreign_key'	=> 'hash',
											'local_key'		=> 'hash'
										);   
    }
	
	public function update_count($hash)
	{
		$result = $this->db->query("UPDATE ping set count = count+1, updated_at = '" . date('Y-m-d H:i:s') . "'  where hash='" . $hash . "';");
		
		return $result;
	}
}