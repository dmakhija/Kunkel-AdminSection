<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bus_model extends CI_Model {
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function get_bus()
    {	/*	
		$sql="SELECT * FROM buses;";
		$results=$this->db->query($sql);
		return $results->result();
		*/
		$this->db->select('*');
	    $this->db->order_by("status","asc");
	    $this->db->from('buses');
	    $query=$this->db->get();
	    return $query->result();			
    }
    
    public function insert_bus($bus_array)
    {
    	$this->db->insert('buses', $bus_array);
    	return ($this->db->affected_rows() == 1) ? true: false;
    }
    
    public function get_bus_details($id)
    {
    	
    	$sql="SELECT * FROM buses WHERE vin='".$id."'";
    	$results=$this->db->query($sql);
    	//return $results->result();
    	return $results->row_array();
    }
    
    public function update_bus_details($id, $bus)
    {
    	$this->db->where('vin', $id);
    	$this->db->update('buses', $bus);
    	return $this->db->affected_rows();
    	//return ($this->db->affected_rows() == 1) ? true: false;  delete_bus_details($id)
    }
    
    public function delete_bus_details($id)
    {
    	$this->db->where('vin', $id);
    	$this->db->delete('buses');
    	return $this->db->affected_rows();
    	//return ($this->db->affected_rows() == 1) ? true: false;  delete_bus_details($id)
    }
    
    
}
