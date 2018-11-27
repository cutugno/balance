<?php

	class Events_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getEvents($id=false) {
			if ($id) $query=$this->db->where('id',$id);
			$query=$this->db->get('events');
			return $query->result();
		}
		
		public function createEvent($data) {
			$query=$this->db->set($data)->insert('events');
			return $this->db->affected_rows() > 0;
		}
	
	}
	
?>
