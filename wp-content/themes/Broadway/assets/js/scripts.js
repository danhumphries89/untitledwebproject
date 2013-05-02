$(window).ready(function(){

	$('a').click(function(e){
		e.preventDefault();
		var url = $(this).attr('href');

		//present loading message to user
		$('.ajax_return').html('Loading...');

		//execute ajax page request
		$.ajax({
			url: url,
			context: document.body,
			success: function(result){ 
				$('.ajax_return').html(result);
			}
		});

	});

});