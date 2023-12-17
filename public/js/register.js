function validateRegisterForm() {
    let userName = document.getElementById('username').value;
    let userEmail = document.getElementById('email').value;
    let userPassword = document.getElementById('password').value;

    if(userName.trim() === '' || userEmail.trim() === '' || userPassword.trim() === '') {
        alert('Please fill in all fields.');
        return false;
    }

    if(!userEmail.includes('@')) {
        alert('Please enter a valid email address.');
        return false;
    }

    return true;
}
