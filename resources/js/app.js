import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);


document.getElementById("submit-registration").addEventListener("click", function (evt) {

    let pw = document.getElementById("password");
    let pwConfirm = document.getElementById("password-confirm");
    let pwError = document.getElementById("pw-error");

    if (pw.value === pwConfirm.value) {
        pwError.classList.add("d-none");
    } else {
        pwError.classList.remove("d-none");
        evt.preventDefault();
    }

});

document.getElementById("submit-edit").addEventListener("click", function (evt) {

    let pw = document.getElementById("password");
    let pwConfirm = document.getElementById("password-confirm");
    let pwError = document.getElementById("pw-error");

    if (pw.value === pwConfirm.value) {
        pwError.classList.add("d-none");
    } else {
        pwError.classList.remove("d-none");
        evt.preventDefault();
    }

});
