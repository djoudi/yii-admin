$(function(){
	
	$('a.copy').relCopy({
		append: '<a href="" class="remove-row">remove</a>',
	});
	
	$('a.copy').click(function(){
		var weight = $('input.input-weight').length -1;
		$('input.input-weight:last').val(weight);
	});
	
	$('a.remove-row').click(function(){
		$(this).parents('.row-item').remove();
		return false;
	});
	
	$('#band-pics').sortable({
		axis: 'y',
		update: function(event, ui){
			$('#band-pics li').each(function(index) {
			  $(this).find('input.input-weight').val(index);
			});
		}
	});
	
	$('input.date').datepicker();
	
	var fixHelper = function(e, ui) {
	  ui.children().each(function() {
	    $(this).width($(this).width());
	  });
    return ui;
  };
	
	$('.grid-view.sortable .items tbody').sortable({
		axis: 'y',
		helper: fixHelper,
		update: function(event, ui){
			var $this = $(this);
			var data = {'ids': []};
			$(this).children('tr').each(function(index) {
			  data['ids'].push($(this).attr('data-record-id'));
				$(this).removeClass('odd even').addClass(index % 2 == 0 ? 'odd' : 'even');
			});
			// console.log(data);
			var model = $(this).parents('.grid-view').attr('data-model');
			$.post('/admin/' + model + '/order', data, function(response){
				if(response == ''){
					var $success = $('<div class="success order">Order successfully saved!</div>');
					$this.parents('table').after($success);
					setTimeout(function(){
						$success.remove();
					}, 2000);
				}
			});
		}
	});
	
});