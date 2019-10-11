/******************************************************************************
* This file sets a css class to the navigation bar item associated with the 
* page currently being viewed. Each navigation li item has an id named after 
* its own php page. The below code determines the current page being viewed,
* then sets a css class to the element with the same id as the page name.
******************************************************************************/

var path = window.location.pathname;
var page = path.split("/").pop();
document.getElementById(page).classList.add("thispage");

if (page == 'store.php') {
    var nav = document.getElementById('navigation');
    nav.insertAdjacentElement('afterend', '<div><p>store baby</p></div>');
}