<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="container alert alert-info" id="events_create_section">
	<div class="row">
		<div class="col-sm-8 col-md-6">
			<p class="lead">NUOVO EVENTO</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8 col-md-6">
			<?php 
				$attr = array('id' => 'events_create_form');
				echo form_open('events/create', $attr);
			?>	
			<div class="form-group">
				<label for="descr">Descrizione</label>
				<input type="text" class="form-control" name="descr" placeholder="Descrizione evento">
			</div>
			<div class="form-group">
				<label for="date">Data evento</label>
				<input type="text" class="form-control datetimepicker" name="date" autocomplete="off" placeholder="Inserisci data evento">
			</div>	
			<button type="button" class="btn btn-primary" id="save_event_btn">SALVA</button>	
			<?= form_close() ?>
		</div>
	</div>	
</section>
