<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section class="container alert alert-info" id="events_manage_section">
	<div class="row">
		<div class="col-sm-8 col-md-6">
			<p class="lead">DETTAGLI EVENTO</p>
		</div>
		<div class="col-sm-4 col-md-6 text-right">
			<a href="<?= site_url('events') ?>"><button class="btn btn-info">Nuovo evento</button></a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8 col-md-6">
			<?php 
				$attr = array('id' => 'events_update_form');
				echo form_open('events/update', $attr);
			?>	
			<div class="form-group">
				<label for="id">ID</label>
				<span><?= $event->id ?></span>
				<?= form_hidden('id', $event->id) ?>
			</div>
			<div class="form-group">
				<label for="descr">Descrizione</label>
				<input type="text" class="form-control" name="descr" value="<?= $event->descr ?>" placeholder="Descrizione evento">
			</div>
			<div class="form-group">
				<label for="date">Data evento</label>
				<input type="text" class="form-control datetimepicker" name="date" value="<?= $event->date ?>" autocomplete="off" placeholder="Inserisci data evento">
			</div>	
			<button type="button" class="btn btn-primary" id="update_event_btn">AGGIORNA</button>	
			<?= form_close() ?>
		</div>
	</div>	
</section>
