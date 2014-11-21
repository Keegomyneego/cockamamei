$(document).ready(function () {
    $("#weekview-container div").on("mousedown", function () {
        $(this).toggleClass("large", 250);
    })
});