<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
        'event' => array(
			array(
				'field' => 'descr',
				'label' => 'Descrizione',
				'rules' => 'required',
				'errors' => array(
						'required' => 'Campo %s obbligatorio'
				)
			),
			array(
				'field' => 'date',
				'label' => 'Data evento',
				'rules' => 'required',
				'errors' => array(
						'required' => 'Campo %s obbligatorio'
				)
			)
        )
	);
