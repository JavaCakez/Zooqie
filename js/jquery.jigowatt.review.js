jQuery(document).ready(function(){

	$('#contactform').submit(function(){

		var action = $(this).attr('action');

		$("#message").slideUp(750,function() {
		$('#message').hide();

 		$('#submit')
			.after('<img src="http://www.zooqie.com/css/http://www.zooqie.com/images/ajax-loader.gif" class="loader" />')
			.attr('disabled','disabled');

		$.post(action, {
			name: $('#name').val(),
			email: $('#email').val(),
			product: $('#product').val(),
			subject: $('#subject').val(),
			comments: $('#comments').val(),
			rating: $('#rating').val(),
			verify: $('#verify').val()
		},
			function(data){
				document.getElementById('message').innerHTML = data;
				$('#message').slideDown('slow');
				$('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit').removeAttr('disabled');
				if(data.match('success') != null) $('#contactform').slideUp('slow');

			}
		);

		});

		return false;

	});

});