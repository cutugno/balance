<?php

	class Events_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getEvents($id=false) {
			if ($id) $query=$this->db->where('id',$id);
			$query=$this->db->get('events');
			if ($id) return $query->row();
			return $query->result();
		}
		
		public function createEvent($data) {
			$query=$this->db->set($data)->insert('events');
			return $this->db->affected_rows() > 0;
		}
		
		public function updateEvent($data,$id) {
			$query=$this->db->set($data)->where('id',$id)->update('events');
			return $query;
		}
		
		public function deleteEvent($id) {
			$query=$this->db->where('id',$id)->delete('events');
			return $this->db->affected_rows() > 0;
		}
	
	}
	
?>
