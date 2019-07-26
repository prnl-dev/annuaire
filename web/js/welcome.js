window.onload = function() {
    //display set contact form when click on "modifier le contact" link
    let deleteElmts = document.getElementsByClassName("set");
    for (element of deleteElmts) {
        element.addEventListener("click", function(e) {
            let id = this.id;
            let displaySetContactForm = document.getElementById("setContactForm"+id);
            if (displaySetContactForm.hidden) {
                displaySetContactForm.hidden = false;
                e.preventDefault();
            } else displaySetContactForm.hidden;
        });
    }

    let newContactForm = document.getElementById("newContactForm");
    newContactForm.addEventListener("submit", function(e) {
        let tel = newContactForm.elements.tel.value;
        let regexTel = /^0[1-9]([-. ]?[0-9]{2}){4}$/
        if (!regexTel.test(tel)) {
            let telInput = document.getElementById("telInput");
            telInput.style.borderColor = "red";
            let msgError = document.getElementById("msgErrorTel")
            msgError.innerHTML = "Format incorrect";
            msgError.style.color = "red";
            telInput.addEventListener("input", function(e) {
                if (regexTel.test(e.target.value)) {
                    telInput.style.borderColor = "";
                    msgError.innerHTML ="";
                } else {
                    telInput.style.borderColor ="red";
                    msgError.innerHTML = "Format incorrect";
                    msgError.style.color = "red";
                }
            });
            e.preventDefault();
        }
    });
    

}