function confirmBox(title, url) {

}

function confirmForm(title, form) {
    if(confirm(title)) {
        form.submit();
    }

    return false;
}