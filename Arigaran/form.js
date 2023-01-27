function validateForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  if (name == "") {
    alert("Name is required");
    return false;
  }

  if (email == "") {
    alert("Email is required");
    return false;
  }

  if (password == "") {
    alert("Password is required");
    return false;
  }

  alert("Form submitted successfully!");
  return true;
}