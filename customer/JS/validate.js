function loginSuccessful() {
    alert("Login successful!");
    // Redirect to the dashboard or another page
    window.location.href = "/dashboard";
}

// Example usage
// Assuming you have a form with id 'loginForm'
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Perform your login validation here
    // If login is successful, call the loginSuccessful function
    loginSuccessful();
});
function registrationSuccessful() {
    alert("Registration successful!");
    // Redirect to the welcome page or another page
    window.location.href = "/view/login.php";
}

// Example usage
// Assuming you have a form with id 'registrationForm'
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Perform your registration validation here
    // If registration is successful, call the registrationSuccessful function
    registrationSuccessful();
});