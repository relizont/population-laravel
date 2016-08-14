jQuery(document).ready(function($){
$('#country-name').change(function(){
	$.getJSON("city/dropdown", 
		{ id: $(this).val() }, 
		function(data) {
			var model = $('#city-name');
			model.empty();

			$.each(data, function(index, element) {
	            model.append("<option value='"+ element.id +"'>" + element.name + "</option>");
	        });
		});
});
});