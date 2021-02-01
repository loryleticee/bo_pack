import $ from "jquery";
// Get the button that opens the modal
var modal_Ml = document.getElementById("myModal_ML");
var modal_pharma = document.getElementById("myModal_pharma");
// When the user clicks on the button, open the modal
$( "#btn_pharma" ).click(function() {
    modal_pharma.style.display = "block";
});
$( "#btn_ML" ).click(function() {
    modal_Ml.style.display = "block";
});
$( "#close_ML" ).click(function() {
    modal_Ml.style.display = "none";
});
$( "#close_pharma" ).click(function() {
    modal_pharma.style.display = "none";
});

// When the user clicks on the button, open the modal

// When the user clicks on the button, open the modal
$( "#valid" ).click(function() {
    document.getElementById("creneau-content").style.display = "none";
    document.getElementById("valid-content").style.display = "inline-block";
    document.getElementById("back-popin-2").style.display = "none";
    document.getElementById("back-popin-1").style.display = "none";
    $.ajax({
        url : 'mail.php' // La ressource ciblée
    });
});


