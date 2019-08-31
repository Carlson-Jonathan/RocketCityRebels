/******************************************************************************
* bootcamp.js
* Author:
*   Jonathan Carlson
* Description:
*   The admin user will be able to set a "from" and "to" date representing when
*   the bootcamp enrollement season for roller derby starts and stops. These
*   functions use JavaScript to determine today's date and return a boolean
*   stating whether or not today's date falls between the bootcamp start and
*   stop dates. These functions are used to either show or hide the bootcamp
*   advertisement bar in the title-nav.php file.
******************************************************************************/

// Admin defined "from" and "to" dates for bootcamp.
var dateFrom = "08/30/2019";
var dateTo = "12/01/2019";

// Get today's date in JS
function getDateToday() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = mm + '/' + dd + '/' + yyyy;
    return today;
}

// Determine if today's date lies between the open and close dates for 
// boot camp season.
function inSeason() {
    var d1 = dateFrom.split("/");
    var d2 = dateTo.split("/");
    var c = getDateToday().split("/");

    // -1 because months are from 0 to 11
    var from = new Date(d1[2], parseInt(d1[0])-1, d1[1]);  
    var to = new Date(d2[2], parseInt(d2[0])-1, d2[1]);
    var check = new Date(c[2], parseInt(c[0])-1, c[1]);
    return (check >= from && check <= to);
}

// Used only on the 'Enlist' page while bootcamp is in season.
function scrolldown() {
    if(inSeason() == true)
        window.scroll(0,1150);
}

// Changes the bootcamp bar display from 'none' to 'block' if in season.
var bcbar = document.getElementById('bootcampbar');
if(inSeason() == true) {
    bcbar.style.display = 'block';
}

// Adjust the CSS after the header
function startHeight() {
    if(inSeason())
        document.getElementById("start").style.margin = "285px";
}

