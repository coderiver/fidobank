$(document).ready(function() {

// slider
(function () {
	var sl = $('.js-slider'),
		slValue = $('.js-slider-value');
	sl.slider({
		range: 'min',
		value: 7500,
		min: 1000,
		max: 50000,
		step: 100,
		slide: function( event, ui ) {
		    slValue.val(String(ui.value).replace(/(\d)(?=(\d{3})+([^\d]|$))/g, '$1 '));
		}
	});
}());

// select
(function () {
	var el = $('.js-select');
	if (el.length) {
		el.each(function () {
			el.find('select').on('change', function () {
			    var select = $(this),
			    	val = select.find(':selected').text();
			    select.prev().html(val);
			});
		});
	};
}());

// validate
(function () {
	$.validate({
		onSuccess : function() {
			return true;
		}
	});
}());
	
});