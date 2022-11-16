/*-------------------------------------------------------------
variable
-------------------------------------------------------------*/
const username = document.getElementById("username").value;
const usernameLabel = document.getElementById("usernameLabel");
const password = document.getElementById("password").value;
const passwordLabel = document.getElementById("passwordLabel");

/*-------------------------------------------------------------
Input fields
-------------------------------------------------------------*/
const onFocusUsername = () => {
  if (username != null) {
    usernameLabel.classList.add("peer-empty:text-transparent");
  }
  if (username == null) {
    usernameLabel.classList.remove("peer-empty:text-transparent");
  }
};

const onFocusPassword = () => {
  if (password != null) {
    passwordLabel.classList.add("peer-empty:text-transparent");
  }
  if (password == null) {
    passwordLabel.classList.remove("peer-empty:text-transparent");
  }
};

/*-------------------------------------------------------------
show password
-------------------------------------------------------------*/
const show = () => {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("showimg").classList.add("hidden");
    document.getElementById("hideimg").classList.remove("hidden");
  } else {
    x.type = "password";
    document.getElementById("showimg").classList.remove("hidden");
    document.getElementById("hideimg").classList.add("hidden");
    labelInput.classList.remove("text-transparent");
  }
};

/*-------------------------------------------------------------
toggle switch color
-------------------------------------------------------------*/
/*-------------------------------------------------------------
clock
-------------------------------------------------------------*/
