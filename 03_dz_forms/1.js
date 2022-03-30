if(location.search != "") {
    let params = new URLSearchParams(location.search);
    let fname = params.get("fname");
    let lname = params.get("lname");
    let email = params.get("email");
    let comment = params.get("comments");

    document.write("<h1>");
    document.writeln("First name: " + fname);
    document.writeln("<br>Last name: " + lname);
    document.writeln("<br>Email: " + email);
    document.writeln("<br>Comment: " + comment);
    document.write("</h1>");

    window.stop()
}

function submit_click() {
    let f;

    f = document.getElementById("f_fname");
    if(f.value.length < 4) {
        f.focus();
        alert("First name must have more than 4 characters")
        return false;
    }

    f = document.getElementById("f_lname");
    if(f.value.length < 4) {
        f.focus();
        alert("Last name must have more than 4 characters")
        return false;
    }

    f = document.getElementById("f_email");
    if(f.value.length == 0) {
        f.focus();
        alert("Fill email")
        return false;
    } else if(!f.value.includes("@") || !f.value.includes(".")) {
        f.focus();
        alert("Fill real email (with . and @)");
        return false;
    }

    f = document.getElementById("f_comments");
    if(f.value.length < 4) {
        f.focus();
        alert("Comment must have more than 15 characters")
        return false;
    }

    return true;
}
