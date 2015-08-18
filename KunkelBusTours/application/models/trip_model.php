<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trip_model extends CI_Model {
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function get_trips()
	{/*
		$this->db->select('*');
		$this->db->from('trips');
		$this->db->order_by("id","desc");
		$query=$this->db->get();
		return $query->result();
		*/
		$sql="SELECT trips.id, trips.name, trips.originId, trips.destinationId, trips.days, trips.nights, ".
				"trips.adultPrice, A.country as originCountry, ".
				"A.province as originProvince, A.city as originCity, B.country as destinationCountry, ".
				"B.province as destinationProvince, B.city  AS destinationCity FROM trips ".
				"LEFT JOIN locations A ON A.id=trips.originId ".
				"LEFT JOIN locations B ON B.id=trips.destinationId ".
				"ORDER BY trips.id desc";
		$results=$this->db->query($sql);
		return $results->result();		
	}
	
    public function insert_trip($trip)
    {
    	$this->db->insert('trips', $trip);
    	return ($this->db->affected_rows() == 1) ? true: false;
    }
    
    public function get_trip_details($id=0)
    {
       	$sql="SELECT trips.id, trips.name, trips.originId, trips.destinationId, trips.days, trips.nights, ".
    		  "trips.adultPrice, trips.childPrice, trips.tripDetails, A.country as originCountry, ".
    		  "A.province as originProvince, A.city as originCity, B.country as destinationCountry, ".
    		  "B.province as destinationProvince, B.city  AS destinationCity FROM trips ".
    		  "LEFT JOIN destinations A ON A.id=trips.originId ".
    		  "LEFT JOIN destinations B ON B.id=trips.destinationId ".
    		  "WHERE trips.id=".$id;
    	$results=$this->db->query($sql);
    	//return $results->result();
    	return $results->row_array();
    }
    
    
}
