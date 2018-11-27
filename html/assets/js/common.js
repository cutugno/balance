	
	function isArray(obj) {
		return obj instanceof Array;
	}
	
	function resetForm($form) {
		$form.find('input:text, input:password, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox')
			 .removeAttr('checked').removeAttr('selected');
	}
	
	$(function(){
		
		$('body').tooltip({
			selector: '[rel=tooltip]'
		});

		$('.tooltipped').tooltip();

		if ($(".datepicker").prop("readonly")==false) {
			$('.datepicker').datepicker({
				dateFormat: 'dd/mm/yy',
				changeMonth: true,
				changeYear: true
			});	
		}

		if ($(".timepicker").prop("readonly")==false) {
			$('.timepicker').timepicker({
				timeFormat: "HH:mm",
				controlType: 'select',
				oneLine: true,
				ignoreReadonly: false
			});	
		}
		
		if ($(".datetimepicker").prop("readonly")==false) {
			$('.datetimepicker').datetimepicker({
				dateFormat: 'dd/mm/yy',
				timeFormat: "HH:mm",
				ignoreReadonly: false,
				changeMonth: true,
				changeYear: true,
				controlType: 'select',
				oneLine: true,
				onSelect: function() {
					$(this).change();
				}
			});	
		}

			
		if ($(".monthyearpicker").prop("readonly")==false) {
			$('.monthyearpicker').datepicker({
				dateFormat: 'mm/yy',
				changeMonth: true,
				changeYear: true,
				onClose: function(dateText, inst) { 
					$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
				}
			});
		}
	});
	
	$('body').on('focus',".dyn_datepicker", function(){
		$(this).datepicker({
			dateFormat: 'dd/mm/yy',
			changeMonth: true,
			changeYear: true
		});	
	});
	
	$('body').on('focus',".dyn_datetimepicker", function(){
		$(this).datetimepicker({
			dateFormat: 'dd/mm/yy',
			timeFormat: "HH:mm",
			changeMonth: true,
			changeYear: true,
			controlType: 'select',
			oneLine: true
		});	
	});
	
	$('body').on('focus',".dyn_timepicker", function(){
		$(this).timepicker({
			timeFormat: "HH:mm",
			controlType: 'select',
			oneLine: true
		});	
	});
	
