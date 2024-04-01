$(function () {

  'use strict'

  //---------------------Login--------------------------------------------------------------------------------

  var forms = document.querySelectorAll('#formLogin')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
          form.classList.add('was-validated')
        } else {
          event.preventDefault()
          let email = $("#txt-email").val();
          let password = $("#txt-password").val();

          let objData = new FormData();
          objData.append("login_Email", email);
          objData.append("login_Password", password);

          fetch('control/loginControl.php', {
            method: 'POST',
            body: objData
          }).then(response => response.json()).catch(error => {
            console.error(error);
          }).then(response => {
            if (response["codigo"] == "200") {
              window.location = response["mensaje"];
            } else {
              alert(response["mensaje"]);
            }
          });

        }
      }, false)
    })

})
