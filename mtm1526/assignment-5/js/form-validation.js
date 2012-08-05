$(document).ready(function() {
var userAvailable = $('.user-available');
var emailAvailable = $('.email-available');
var passwordReqs = 0;

$('#username').on('change', function (ev) {
	var username = $(this).val();
	userAvailable.attr('data-status', 'unchecked');
	if (username.length>=3 && username.length<=25) {
		var ajax = $.post('check-username.php',{'username' :username });
		ajax.done(function (data){
			if (data == 'available'){
				userAvailable.attr('data-status', 'available').html('Available');
			}else{
				userAvailable.attr('data-status', 'unavailable').html('Unavailable');
			}
		});
	}else{
			userAvailable.attr('data-status', 'unavailable').html('Must be 3-25 characters long');
	}
});

$('#password').on('keyup', function(ev) {
	var password = $(this).val();
	passwordReqs = 0;
	if (password.length > 5) {
		passwordReqs++;
		$('.pass-length').attr('data-state', 'achieved');
	}
	if (password.match(/[a-z]/)) {
		passwordReqs++;
		$('.pass-lowercase').attr('data-state', 'achieved')
	}
	if (password.match(/[A-Z]/)) {
		passwordReqs++;
		$('.pass-uppercase').attr('data-state', 'achieved')
	}
	if (password.match(/\d/)) {
		passwordReqs++;
		$('.pass-number').attr('data-state', 'achieved')
	}
	if (password.match(/[^a-zA-Z0-9]/)) {
		passwordReqs++;
		$('.pass-symbol').attr('data-state', 'achieved')
	}
});

$('#email').on('change', function(ev) {
	var email = $(this).val();
	if (email.length>=4 && email.length<=256 && email.match(/@./)) {
		var ajax = $.post('check-email.php',{'email' :email});
	
		ajax.done(function (data){
			if (data == 'available'){
			emailAvailable.attr('data-event', 'available').html('Available');
			}else{
			emailAvailable
			.attr('data-event', 'unavailable')
			.html('Unavailable');
			}
		});
	}else{
	emailAvailable.attr('data-event', 'unavailable').html('Enter correct e-mail');
	}
});

$('#city').on('change', function() {
	var city = $(this).val();
	if (city.match(/['~!@#$%^&*()\+={}[]|":;?<>/)) {
	$('.city-invalid').attr('data-status', 'invalid-cityname').html('City name contains invalid characters');
	} else { 
	$('.city-invalid').attr('data-status', 'valid-cityname').html('City name OK');
	}
});

$('#canada').on('click', function (ev) {
	$(function() {
		$( '.country' ).load('canada.html');
	});
});
$('#usa').on('click', function (ev) {
	$(function() {
		$( '.country' ).load('usa.html');
	});
});

$('form').on('submit', function (ev) {
	if (userAvailable.attr('data-status') == 'unchecked' 
	|| userAvailable.attr('data-status') == 'unavailable' 
	|| passwordReqs < 5) {
	ev.preventDefault();
	}
	});
});