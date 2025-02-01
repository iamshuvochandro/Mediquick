function formvalidate() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;
    var address = document.getElementById('address').value;
    var phone = document.getElementById('phone').value;
    var message = document.getElementById('message').value;
    var error_message = document.getElementById('error_message');
    var text;
    error_message.style.padding = '10px';
    if (name.length < 5) {
        text = 'Please Enter Valid Name';
        error_message.innerHTML = text;
        return false;
    }
    if (email.indexOf('@') == -1 || email.length < 6) {
        text = 'Please Enter Valid Email';
        error_message.innerHTML = text;
        return false;
    }   
    if (password.length < 6) {
        text = 'Please Enter Valid Password';
        error_message.innerHTML = text;
        return false;
    }
    if (cpassword.length < 6) {
        text = 'Please Enter Valid Confirm Password';
        error_message.innerHTML = text;
        return false;
    }
    if (password != cpassword) {
        text = 'Password and Confirm Password should be same';
        error_message.innerHTML = text;
        return false;
    }
    if (address.length < 10) {
        text = 'Please Enter Valid Address';
        error_message.innerHTML = text;
        return false;
    }
    if (phone.length < 10) {
        text = 'Please Enter Valid Phone Number';
        error_message.innerHTML = text;
        return false;
    }
    if (message.length < 10) {
        text = 'Please Enter Valid Message';
        error_message.innerHTML = text;
        return false;
    }
    alert('Form Submitted Successfully!');
    return true;
    
}