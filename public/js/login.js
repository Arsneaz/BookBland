function validateLoginForm() {
    let userName = document.getElementById("username").value;
    let userPassword = document.getElementById("password").value;

    if (userInput.trim() === "" || userPassword.trim() === "") {
        alert("Please Provide a correct")
        return false;
    }

    return true;
}

