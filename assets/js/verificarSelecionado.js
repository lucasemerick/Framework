function habilitaText(obj, id) {
    if (obj.checked == true) {
        document.getElementById(id).disabled = false;
    } else {
        document.getElementById(id).disabled = true;
    }
}