$(document).ready(function () {
	$('.l_school').click(function(){
		$(this).removeClass('l_school');
	})

	$('#registration_panel').hide('1000');
	$('.l_already').hide();
	$('.l_already span').click(function(){
		$('#registration_panel').hide('1000');
		$('.l_already').hide();
		$('#login_panel').show();
		$('.l_register').show();
	})

	$('.l_register span').click(function(){
		$('#login_panel').hide();
		$('.l_register').hide();
		$('#registration_panel').show('1000');
		$('.l_already').show();
	});
})