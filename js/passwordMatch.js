function checkPasswordMatch(e){
    var password = document.getElementById('password');
    var passwordCheck = document.getElementById('rpassword');

    if (password.value !== passwordCheck.value){
      alert("Passwords don't match!");
      makeRed(password);
      makeRed(passwordCheck);
      e.preventDefault();
    }

  }