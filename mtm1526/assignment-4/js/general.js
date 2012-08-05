// JavaScript Document
$(document).ready(function () {
	var loadtab = $.get('blue.html', function (data) {
		$('#tabs').append(data);
		});
	
	$('#bluetab').on('click', function(ev) {
		ev.preventDefault();
		$("li").removeClass("ctab");
		$('#bluetab').addClass("ctab");
		$('#tabs').load('blue.html');
	
	});
		$('#blue').on('click', function(ev) {
		ev.preventDefault();
		$("li").removeClass("ctab");
		$('#bluetab').addClass("ctab");
		$('#tabs').load('blue.html');
	});


	$('#redtab').on('click', function(ev) {
		ev.preventDefault();
		$("li").removeClass("ctab");
		$('#redtab').addClass("ctab");
		$('#tabs').load('red.html');
	});
		$('#red').on('click', function(ev) {
		ev.preventDefault();
		$("li").removeClass("ctab");
		$('#redtab').addClass("ctab");
		$('#tabs').load('red.html');
	});

	
	$('#greentab').on('click', function(ev) {
		ev.preventDefault();
		$("li").removeClass("ctab");
		$('#greentab').addClass("ctab");
		$('#tabs').load('green.html');
	});
		$('#green').on('click', function(ev) {
		ev.preventDefault();
		$("li").removeClass("ctab");
		$('#greentab').addClass("ctab");
		$('#tabs').load('green.html');
	});

	
	$('#yellowtab').on('click', function(ev) {
		ev.preventDefault();
		$("li").removeClass("ctab");
		$('#yellowtab').addClass("ctab");
		$('#tabs').load('yellow.html');
	});
		$('#yellow').on('click', function(ev) {
		ev.preventDefault();
		$("li").removeClass("ctab");
		$('#yellowtab').addClass("ctab");
		$('#tabs').load('yellow.html');
	});
});