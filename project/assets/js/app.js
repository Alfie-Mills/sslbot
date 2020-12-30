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
    document.getElementById("email" + id).style.borderBottomStyle = "groove"
    document.getElementById("name" + id).style.borderBottomStyle = "groove"
    document.getElementById("domain" + id).style.borderBottomStyle = "groove"
    document.getElementById("editBtn" + id).style.display = "none"
    document.getElementById("applyBtn" + id).style.display = "inline"
}

function newEntry() {
    document.getElementById("newdiv").style.display = "block"
    document.getElementById("container").style.zIndex = "1"
    document.getElementById("container").style.backgroundColor = "#222222cc"
    document.getElementById("maintable").style.webkitFilter = "blur(6px)";
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

//boxchilli ssl bot created by Alfie Mills 2020