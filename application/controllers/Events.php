<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('events_model','events');
	}

	public function index() {	
		// PAGINA INIZIALE EVENTI: CREATE + LIST	
		$this->load->view('common/open');
		$this->load->view('common/navigation');
		$this->load->view('events/create');
		$this->load->view('events/list');
		$this->load->view('common/scripts');
		$this->load->view('events/index_scripts');
		$this->load->view('common/close');
	}
	
	public function manage($id) {
		// PAGINA GESTIONE EVENTO: MANAGE + LIST
		if (!$data['event']=$this->events->getEvents($id)) {
			show_404();
		}
		$data['event']->date=convertDate($data['event']->date,"Y-m-d H:i:s","d/m/Y H:i");
		
		$this->load->view('common/open');
		$this->load->view('common/navigation');
		$this->load->view('events/manage',$data);
		$this->load->view('events/list');
		$this->load->view('common/scripts');
		$this->load->view('events/index_scripts');
		$this->load->view('common/close');
	}
	
	public function get($id=false) {
		// AJAX GET LISTA EVENTI
		echo json_encode($this->events->getEvents($id));
	}
	
	public function create() {
		// AJAX POST SALVA EVENTO
		try {
			if (null==$this->input->post()) throw new Exception("Dati POST mancanti",400);
			$this->load->library('form_validation');
			if ($this->form_validation->run('event') == FALSE) {
				throw new Exception (validation_errors(),400);
			}
			$post=$this->input->post();
			$post['date']=convertDate($post['date'],"d/m/Y H:i","Y-m-d H:i:s");			
			if (!$this->events->createEvent($post)) throw new Exception("Errore salvataggio evento",500);
			$echo="Evento salvato";
			audit_log("Evento salvato (".json_encode($post).")","events");
		} catch (Exception $e) {
			http_response_code($e->getCode());
			$echo=$e->getMessage();
		}
		
		echo $echo;
	}
	
	public function update() {
		// AJAX POST AGGIORNA EVENTO
		try {
			if (null==$this->input->post()) throw new Exception("Dati POST mancanti",400);
			if (!$this->input->post('id')) throw new Exception("Campo ID obbligatorio",400);
			$this->load->library('form_validation');
			if ($this->form_validation->run('event') == FALSE) {
				throw new Exception (validation_errors(),400);
			}
			$post=$this->input->post();
			$post['date']=convertDate($post['date'],"d/m/Y H:i","Y-m-d H:i:s");	
			$id=$post['id'];unset($post['id']);		
			if (!$this->events->updateEvent($post,$id)) throw new Exception("Errore salvataggio evento",500);
			$echo="Evento aggiornato";
			audit_log("Evento $id aggiornato (".json_encode($post).")","events");
		} catch (Exception $e) {
			http_response_code($e->getCode());
			$echo=$e->getMessage();
		}
		
		echo $echo;
	}
	
	public function delete($id) {
		// AJAX GET CANCELLA EVENTO
		
		try {
			if (!$this->events->deleteEvent($id)) throw new Exception("Evento non trovato",404);
			
			$echo="Evento cancellato";
		} catch (Exception $e) {
			http_response_code($e->getCode());
			$echo=$e->getMessage();
		}
		
		echo $echo;
	}
	
}
