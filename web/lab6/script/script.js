document.getElementById("confirm_password").addEventListener("input", function() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    var errorText = document.getElementById("password_error");
    var registerButton = document.getElementById("register_button");

    if (password !== confirmPassword && confirmPassword !== "") {
      errorText.textContent = "Пароли не совпадают";
      registerButton.disabled = true;
      
    } else {
      errorText.textContent = "";
      registerButton.disabled = false;
    }
  })