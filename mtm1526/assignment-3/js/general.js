$(document).ready(function ($) {
		var $circle = $('#circle')
			, $property = $('#property')
			, $color = $('#color');

	
		$('form').on('submit', function (e) {
			e.preventDefault();
			var color = $color.val();
			console.log('submit click');
	
				if (color) {
				$circle.css($property.val(), color);
				}
		});

		$('#hideshow').on('click', function (e) {
			console.log('hideshow click');
			$circle.toggle(500);
		});
		
		$('#rotate').on('click', function (e) {
		console.log('rotate click');
		$circle.css('-moz-transform', 'rotate(180deg)');
		$circle.css('-webkit-transform', 'rotate(180deg)');
		$circle.css('-o-transform', 'rotate(180deg)');
		$circle.css('transform', 'rotate(180deg)');
		});
});