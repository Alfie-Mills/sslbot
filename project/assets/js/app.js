$(document).foundation();

function myFunction() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var domain = document.getElementById("domain").value;
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = '&name1=' + name + '&email1=' + email + '&domain1=' + domain;
    if (name == '' || email == '' || domain == '') {
        alert("Please Fill All Fields");
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: document.URL + "project/functions/submit.php",
            data: dataString,
            cache: false
        });
    }

    setTimeout(() => { location.reload(); }, 200);

    return false;
}
/**
 * This
 */
function update() {
    var name = document.getElementById("appendname").value;
    var email = document.getElementById("appendemail").value;
    var domain = document.getElementById("appenddomain").value;

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = '&name1=' + name + '&email1=' + email + '&domain1=' + domain;
    if (name == '' || email == '' || domain == '') {
        alert("Please Fill All Fields");
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "project/functions/submit.php",
            data: dataString,
            cache: false
        });
    }
    setTimeout(() => { location.reload(); }, 200);

    return false;
}


function delEntry(id) {

    var dataString = 'id=' + id;

    // AJAX code to submit form.
    $.ajax({
        type: "POST",
        url: "project/functions/delete.php",
        data: dataString,
        cache: false
    });
    setTimeout(() => { location.reload(); }, 200);

    return false;
}

function append(id) {
    document.getElementById("email" + id).style.pointerEvents = "all"
    document.getElementById("name" + id).style.pointerEvents = "all"
    document.getElementById("domain" + id).style.pointerEvents = "all"
    document.getElementById("email" + id).style.borderBottom = "solid 2px white"
    document.getElementById("name" + id).style.borderBottom = "solid 2px white"
    document.getElementById("domain" + id).style.borderBottom = "solid 2px white"
    document.getElementById("editBtn" + id).style.display = "none"
    document.getElementById("applyBtn" + id).style.display = "inline"
}

function closeBtn() {
    document.getElementById("newdiv").style.display = "none"
    document.getElementById("container").style.zIndex = "-1"
    document.getElementById("container").style.backgroundColor = "#ffffff"
    document.getElementById("maintable").style.webkitFilter = "blur(0px)"
}

function applyAppend(id) {
    document.getElementById("email" + id).style.pointerEvents = "none"
    document.getElementById("name" + id).style.pointerEvents = "none"
    document.getElementById("domain" + id).style.pointerEvents = "none"
    document.getElementById("email" + id).style.borderBottomStyle = "none"
    document.getElementById("name" + id).style.borderBottomStyle = "none"
    document.getElementById("domain" + id).style.borderBottomStyle = "none"
    document.getElementById("editBtn" + id).style.display = "inline"
    document.getElementById("applyBtn" + id).style.display = "none"

    var name = document.getElementById("name" + id).value;
    var email = document.getElementById("email" + id).value;
    var domain = document.getElementById("domain" + id).value;
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = '&id1=' + id + '&name1=' + name + '&email1=' + email + '&domain1=' + domain;
    if (name == '' || email == '' || domain == '') {
        alert("Please Fill All Fields");
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "project/functions/append.php",
            data: dataString,
            cache: false
        });
    }

    setTimeout(() => { location.reload(); }, 200);

    return false;


}

function sortTable() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("maintable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[4];
            y = rows[i + 1].getElementsByTagName("TD")[4];
            //check if the two rows should switch place:
            if (Number(x.innerHTML) > Number(y.innerHTML)) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

//boxchilli ssl bot created by Alfie Mills 2020