$(document).ready(function(){
	$('.email_input').focus(function(){
		if($(this).val() == 'Your Email') $(this).val('');
	});
	$('.email_input').blur(function(){
		if($(this).val() == '') $(this).val('Your Email');
	});
	$('.message_input').focus(function(){
		if($(this).val() == 'Ask us anything!') $(this).val('');	
	});
	$('.message_input').blur(function(){
		if($(this).val() == '') $(this).val('Ask us anything!');
	});
	$('.login_email_input, .login_password_input, .email_input, .message_input').focus(function(){
		$(this).addClass('input_active');
	});
	$('.login_email_input, .login_password_input, .email_input, .message_input').blur(function(){
		$(this).removeClass('input_active');
	});
	/*$('.login_email_input').focus(function(){
		if($(this).val() == 'Email') $(this).val('');
	});
	$('.login_email_input').blur(function(){
		if($(this).val() == '') $(this).val('Email');
	});
	$('.login_password_input').focus(function(){
		if($(this).val() == 'Password') $(this).val('');
	});
	$('.login_password_input').blur(function(){
		if($(this).val() == '') $(this).val('Password');
	});*/
	$('.button').mouseover(function(){
		$(this).addClass('button_hover');
	});
	$('.button').mouseout(function(){
		$(this).removeClass('button_hover');
	});
	$('.button').click(function(){
		$(this).addClass('button_active');
	});
});