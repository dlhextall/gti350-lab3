
/**
 * This file will handle the hashing of the passwords for any forms.
 * 
 * @param  {[type]} form     [description]
 * @param  {[type]} password [description]
 * @return {[type]}          [description]
 */
function formhash(form, password) {
   // Create a new element input, this will be our hashed password field.
   var p = document.createElement("input");
   // Add the new element to our form.
   form.appendChild(p);
   p.name = "p";
   p.type = "hidden"
   p.value = hex_sha512(password.value);
   // Make sure the plaintext password doesn't get sent.
   password.value = "";
   // Finally submit the form.
   form.submit();
}

function custom_formhash(form, username, current_pass, new_pass) {
   if (!isPasswordValid(new_pass.value, username)) {
      window.location.replace("./home.php?error=" + encodeURI("You chose an invalid password."));
      return false;
   } else {
      // Create a new element input, this will be our hashed password field.
      var cp = document.createElement("input");
      var np = document.createElement("input");
      // Add the new element to our form.
      form.appendChild(cp);
      form.appendChild(np);

      cp.name = "cp";
      cp.type = "hidden"
      cp.value = hex_sha512(current_pass.value);

      np.name = "np";
      np.type = "hidden"
      np.value = hex_sha512(new_pass.value);
      // Make sure the plaintext password doesn't get sent.
      current_pass.value = "";
      new_pass.value = "";
      // Finally submit the form.
      form.submit();
   }
}

/**
 * Verifies if the new password is valid
 * @param  {String}  _newpasswd the new password inputed by the user
 * @param  {String}  _username  the username of the current user
 * @return {Boolean}            true if the password is valid, false if not
 *
 *
 * http://stackoverflow.com/questions/1559751/regex-to-make-sure-that-the-string-contains-at-least-one-lower-case-char-upper#answer-1559788
 * ^                  // the start of the string
 * (?=.*[a-z])        // use positive look ahead to see if at least one lower case letter exists
 * (?=.*[A-Z])        // use positive look ahead to see if at least one upper case letter exists
 * (?=.*\d)           // use positive look ahead to see if at least one digit exists
 * .+                 // gobble up the entire string
 * $                  // the end of the string
 */
function isPasswordValid(_newpasswd, _username) {
   return (_newpasswd.toLowerCase().indexOf(_username.toLowerCase()) == -1 && _newpasswd.length >= 8 && /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/.test(_newpasswd));
}