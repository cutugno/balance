<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
	
	function get_events() {
		$.getJSON("<?= site_url('events/get') ?>",function(resp) {			
			if (resp.length > 0) {
				var pagin=$("#tpl_pagin").html();
				var event_list=$("#tpl_event_list").html();
				var event_row=$("#tpl_event_row").html();
				var events="";
				$.each(resp,function(k,v) {					
					var row=event_row.replace(/%id%/g,v.id);
					row=row.replace("%descr%",v.descr);
					row=row.replace("%date%",v.date);
					events+=row;
				});							
				event_list=event_list.replace(/%pagin%/g,pagin);				
			}else{
				var event_list=$("#tpl_empty_list").html();
			}
			$("#event_list").html(event_list);	
			$("#event_list_tbl tbody").html(events);	
			$("#event_list_tbl").tablesorter()
			.tablesorterPager({
				container: $(".pagin"),
				size: 50,
				output: '{startRow} - {endRow} di {filteredRows} (tot. {totalRows})'  
			});	
		});
	}
	
	$(function() {
		get_events();
	});	
	
	$("#save_event_btn").click(function() {
		var dati=$("#events_create_form").serialize();
		var url="<?= site_url('events/create') ?>";
		$.post(url,dati)
			.success(function(resp) {
				swal('',resp,'success').then((result) => {
					resetForm($("#events_create_form"));
					get_events();
				});
			})
			.fail(function(resp) {
				swal('',resp.responseText,'error');
			});
	});
</script>

