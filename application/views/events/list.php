<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="container" id="events_list_section">
	<div class="row">
		<div class="col-sm-8 col-md-6">
			<p class="lead">LISTA EVENTI</p>			
		</div>
	</div>	
	<div class="row" id="event_list">	
	</div>
</section>

<template id="tpl_pagin"><?php $this->load->view('templates/pagin') ?></template>
<template id="tpl_event_list"><?php $this->load->view('templates/event_list') ?></template>
<template id="tpl_event_row"><?php $this->load->view('templates/event_row') ?></template>
<template id="tpl_empty_list">
	<div class="col-xs-12">
		Nessun evento disponibile
	</div>
</template>


