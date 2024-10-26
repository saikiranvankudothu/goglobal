function validateForm() {
    const passwordInput = document.getElementById("Password");
    const password = passwordInput.value.trim();
  
    if (password === "") {
      alert("Please enter a password.");
      return false;
    }
  
    if (password.length < 8 || password.length > 25) {
      alert("Password must be between 8 and 25 characters long.");
      return false;
    }
  
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,25}$/.test(password)) {
      alert("Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.");
      return false;
    }
  
    return true;
  }