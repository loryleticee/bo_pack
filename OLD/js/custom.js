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

         // Get the button that opens the modal
         var modal = document.getElementById("myModal_ML");
         var modal_pharma = document.getElementById("myModal_pharma");
		var modal_doc = document.getElementById("myModal_doc");
        

		$( "#btn_contact" ).click(function() {
		  window.location.href = 'contact.html';
		});
		$( "#valid" ).click(function() {
		  window.location.href = 'document.html';
		});
	
		
		// When the user clicks on the button, open the modal
		$( "#btn_pharma" ).click(function() {
		  modal_pharma.style.display = "block";
		});
		$( "#btn_ML" ).click(function() {
		  modal.style.display = "block";
		});
		$( "#btn_doc" ).click(function() {
		  modal_doc.style.display = "block";
		});
		$( "#close_ML" ).click(function() {
			modal.style.display = "none";
		});
		$( "#close_pharma" ).click(function() {
			modal_pharma.style.display = "none";
		});
		$( "#close_doc" ).click(function() {
			modal_doc.style.display = "none";
		});