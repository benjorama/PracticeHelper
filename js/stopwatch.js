/**
 * Stopwatch functionality for practice page. 
 */
$(document).ready(function() {
    // all custom jQuery will go here
    if ($("#button").val() === "start") {
    } else {
        var start = Date.now();
        setInterval(function() {
            var diff = Date.now() - start;

            //calculate milliseconds
            var milliseconds = diff % 1000;

            //calculate seconds
            var seconds = Math.floor(diff / 1000) % 60;

            //calculate minutes
            var minutes = Math.floor(diff / (1000 * 60)) % 60;
            
            //calculate hours
            var hours = Math.floor(diff / (1000 * 60 * 60));

            $("#milliseconds").html((milliseconds.toString()).padStart(3, "0"));
            $("#seconds").html((seconds.toString()).padStart(2, "0"));
            $("#minutes").html((minutes.toString()).padStart(2, "0"));
            $("#hours").html((hours.toString()).padStart(2, "0"));

        }, 100);
    }
});
