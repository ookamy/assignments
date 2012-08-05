// JavaScript Document
$(document).ready(function () {
	$('#blue').on('click', function(ev) {
		ev.preventDefault();
		$("a").removeClass("ctab");
		$("li").removeClass("ctab");
		$('#blue').addClass("ctab");
		$('#tabs').load('includes/blue.php');
	});

	$('#red').on('click', function(ev) {
		ev.preventDefault();
		$("a").removeClass("ctab");
		$("li").removeClass("ctab");
		$('#red').addClass("ctab");
		$('#tabs').load('includes/red.php');
	});
	
	$('#green').on('click', function(ev) {
		ev.preventDefault();
		$("a").removeClass("ctab");
		$("li").removeClass("ctab");
		$('#green').addClass("ctab");
		$('#tabs').load('includes/green.php');
	});
	
	$('#yellow').on('click', function(ev) {
		ev.preventDefault();
		$("a").removeClass("ctab");
		$("li").removeClass("ctab");
		$('#yellow').addClass("ctab");
		$('#tabs').load('includes/yellow.php');
	});
});