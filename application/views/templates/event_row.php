<tr>
	<td class="text-right">%id%</td>
	<td>%descr%</td>
	<td>%date%</td>
	<td class="text-center">
		<a href="<?= site_url('events/manage/') ?>%id%" target="_self"><button type="button" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Dettagli</button></a>
		<button type="button" class="btn btn-sm btn-warning delete_event_btn" data-id="%id%"><i class="fa fa-eraser" aria-hidden="true"></i> Cancella</button>
	</td>
</tr>
