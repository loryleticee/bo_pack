// SLIDER DATE
$(function () {
	var count = $("#month > span").length;
	var slider = 1
	var speed=5000
	var fadeSpeed = 300
	$("#month span:first").fadeIn(fadeSpeed);
	$('.right').click(right)
	$('.left').click(left)

	function right() {
		next()
		return false
	}

	function left() {
		prev()
		return false
	}

	function prev() {
		slider--
		if (slider < 1) {
			slider = count
		}

		$("#month > span").fadeOut(fadeSpeed)
		$("#month > section").fadeOut(fadeSpeed)
		$(".text-" + slider).fadeIn(fadeSpeed)
	}

	function next() {
		slider++
		if (slider > count) {
			slider = 1
		}

		$("#month > span").fadeOut(fadeSpeed)
		$(".text-" + slider).fadeIn(fadeSpeed)
	}
});