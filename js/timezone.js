/**
 * In order to determine the timezone of the client, get the date offset
 * on the client side and send it to the post array.
 */
$(document).ready(function() {
    var date = new Date();
    var date_offset = -(date.getTimezoneOffset()/60);
    $.ajax({
        type: "POST",
        url: '../include/timezone.php',
        data: "date_offset=" + date_offset,
        error: function(data) {
            alert("ERRORS!");
        }
    });
});
