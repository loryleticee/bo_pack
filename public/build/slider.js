(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["slider"],{

/***/ "./assets/js/slider.js":
/*!*****************************!*\
  !*** ./assets/js/slider.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {// SLIDER DATE
$(function () {
  var count = $("#month > span").length;
  var slider = 1;
  var speed = 5000;
  var fadeSpeed = 300;
  $("#month span:first").fadeIn(fadeSpeed);
  $('.right').click(right);
  $('.left').click(left);

  function right() {
    next();
    return false;
  }

  function left() {
    prev();
    return false;
  }

  function prev() {
    slider--;

    if (slider < 1) {
      slider = count;
    }

    $("#month > span").fadeOut(fadeSpeed);
    $("#month > section").fadeOut(fadeSpeed);
    $(".text-" + slider).fadeIn(fadeSpeed);
  }

  function next() {
    slider++;

    if (slider > count) {
      slider = 1;
    }

    $("#month > span").fadeOut(fadeSpeed);
    $(".text-" + slider).fadeIn(fadeSpeed);
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/slider.js","runtime","vendors~app~carousel~modal~slider"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvc2xpZGVyLmpzIl0sIm5hbWVzIjpbIiQiLCJjb3VudCIsImxlbmd0aCIsInNsaWRlciIsInNwZWVkIiwiZmFkZVNwZWVkIiwiZmFkZUluIiwiY2xpY2siLCJyaWdodCIsImxlZnQiLCJuZXh0IiwicHJldiIsImZhZGVPdXQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBO0FBQ0FBLENBQUMsQ0FBQyxZQUFZO0FBQ2IsTUFBSUMsS0FBSyxHQUFHRCxDQUFDLENBQUMsZUFBRCxDQUFELENBQW1CRSxNQUEvQjtBQUNBLE1BQUlDLE1BQU0sR0FBRyxDQUFiO0FBQ0EsTUFBSUMsS0FBSyxHQUFDLElBQVY7QUFDQSxNQUFJQyxTQUFTLEdBQUcsR0FBaEI7QUFDQUwsR0FBQyxDQUFDLG1CQUFELENBQUQsQ0FBdUJNLE1BQXZCLENBQThCRCxTQUE5QjtBQUNBTCxHQUFDLENBQUMsUUFBRCxDQUFELENBQVlPLEtBQVosQ0FBa0JDLEtBQWxCO0FBQ0FSLEdBQUMsQ0FBQyxPQUFELENBQUQsQ0FBV08sS0FBWCxDQUFpQkUsSUFBakI7O0FBRUEsV0FBU0QsS0FBVCxHQUFpQjtBQUNoQkUsUUFBSTtBQUNKLFdBQU8sS0FBUDtBQUNBOztBQUVELFdBQVNELElBQVQsR0FBZ0I7QUFDZkUsUUFBSTtBQUNKLFdBQU8sS0FBUDtBQUNBOztBQUVELFdBQVNBLElBQVQsR0FBZ0I7QUFDZlIsVUFBTTs7QUFDTixRQUFJQSxNQUFNLEdBQUcsQ0FBYixFQUFnQjtBQUNmQSxZQUFNLEdBQUdGLEtBQVQ7QUFDQTs7QUFFREQsS0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQlksT0FBbkIsQ0FBMkJQLFNBQTNCO0FBQ0FMLEtBQUMsQ0FBQyxrQkFBRCxDQUFELENBQXNCWSxPQUF0QixDQUE4QlAsU0FBOUI7QUFDQUwsS0FBQyxDQUFDLFdBQVdHLE1BQVosQ0FBRCxDQUFxQkcsTUFBckIsQ0FBNEJELFNBQTVCO0FBQ0E7O0FBRUQsV0FBU0ssSUFBVCxHQUFnQjtBQUNmUCxVQUFNOztBQUNOLFFBQUlBLE1BQU0sR0FBR0YsS0FBYixFQUFvQjtBQUNuQkUsWUFBTSxHQUFHLENBQVQ7QUFDQTs7QUFFREgsS0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQlksT0FBbkIsQ0FBMkJQLFNBQTNCO0FBQ0FMLEtBQUMsQ0FBQyxXQUFXRyxNQUFaLENBQUQsQ0FBcUJHLE1BQXJCLENBQTRCRCxTQUE1QjtBQUNBO0FBQ0QsQ0F2Q0EsQ0FBRCxDIiwiZmlsZSI6InNsaWRlci5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIFNMSURFUiBEQVRFXG4kKGZ1bmN0aW9uICgpIHtcblx0dmFyIGNvdW50ID0gJChcIiNtb250aCA+IHNwYW5cIikubGVuZ3RoO1xuXHR2YXIgc2xpZGVyID0gMVxuXHR2YXIgc3BlZWQ9NTAwMFxuXHR2YXIgZmFkZVNwZWVkID0gMzAwXG5cdCQoXCIjbW9udGggc3BhbjpmaXJzdFwiKS5mYWRlSW4oZmFkZVNwZWVkKTtcblx0JCgnLnJpZ2h0JykuY2xpY2socmlnaHQpXG5cdCQoJy5sZWZ0JykuY2xpY2sobGVmdClcblxuXHRmdW5jdGlvbiByaWdodCgpIHtcblx0XHRuZXh0KClcblx0XHRyZXR1cm4gZmFsc2Vcblx0fVxuXG5cdGZ1bmN0aW9uIGxlZnQoKSB7XG5cdFx0cHJldigpXG5cdFx0cmV0dXJuIGZhbHNlXG5cdH1cblxuXHRmdW5jdGlvbiBwcmV2KCkge1xuXHRcdHNsaWRlci0tXG5cdFx0aWYgKHNsaWRlciA8IDEpIHtcblx0XHRcdHNsaWRlciA9IGNvdW50XG5cdFx0fVxuXG5cdFx0JChcIiNtb250aCA+IHNwYW5cIikuZmFkZU91dChmYWRlU3BlZWQpXG5cdFx0JChcIiNtb250aCA+IHNlY3Rpb25cIikuZmFkZU91dChmYWRlU3BlZWQpXG5cdFx0JChcIi50ZXh0LVwiICsgc2xpZGVyKS5mYWRlSW4oZmFkZVNwZWVkKVxuXHR9XG5cblx0ZnVuY3Rpb24gbmV4dCgpIHtcblx0XHRzbGlkZXIrK1xuXHRcdGlmIChzbGlkZXIgPiBjb3VudCkge1xuXHRcdFx0c2xpZGVyID0gMVxuXHRcdH1cblxuXHRcdCQoXCIjbW9udGggPiBzcGFuXCIpLmZhZGVPdXQoZmFkZVNwZWVkKVxuXHRcdCQoXCIudGV4dC1cIiArIHNsaWRlcikuZmFkZUluKGZhZGVTcGVlZClcblx0fVxufSk7Il0sInNvdXJjZVJvb3QiOiIifQ==