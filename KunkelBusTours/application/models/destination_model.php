<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class destination_model extends CI_Model {
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function get_destinations()
    {	
		$this->db->select('*');
	    $this->db->order_by("country","asc");
	    $this->db->order_by("province","asc");
	    $this->db->order_by("city","asc");
	    $this->db->from('locations');
	    $query=$this->db->get();
	    return $query->result();			
    }
    
    public function insert_destination($destination)
    {
    	$this->db->insert('locations', $destination);
    	return ($this->db->affected_rows() == 1) ? true: false;
    }
    
    public function get_destination_details($id)
    {
    	
    	$sql="SELECT * FROM locations WHERE id=".$id;
    	$results=$this->db->query($sql);
    	//return $results->result();
    	return $results->row_array();
    }
    
    public function update_destination_details($id, $destination)
    {
    	$this->db->where('id', $id);
    	$this->db->update('locations', $destination);
    	return $this->db->affected_rows();
    }
    
    public function delete_destination_details($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('locations');
    	return $this->db->affected_rows();
    }
    
    public function get_countries()
    {
    	 
    	$sql="SELECT DISTINCT(country) FROM locations";
    	$results=$this->db->query($sql);
    	//return $results->row_array();
    	return $results->result();
    }
    
    public function get_provinces($country)
    {    
    	$sql="SELECT DISTINCT(province) FROM locations WHERE country='".$country."'";
    	$results=$this->db->query($sql);
    	//return $results->row_array();
    	return $results->result();
    }
    
    public function get_cities($province)
    {
    	$sql="SELECT DISTINCT(city) FROM locations WHERE province='".$province."'";
    	$results=$this->db->query($sql);
    	//return $results->row_array();
    	return $results->result();
    }
    
    public function getLocationId($country, $province, $city)
    {
    	$this->db->select('id');
    	$array = array('country=' => $country, 'province=' => $province, 'city=' => $city);
    	$this->db->where($array);
    	$this->db->from('locations');
    	$query=$this->db->get();//->row()->id;
    	//return $query->result();
    	//return $query->row_array();
    	return $query->row();
    }
    
    
}
