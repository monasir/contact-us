var inputName = document.getElementById('input-name');
var inputMail = document.getElementById('input-mail');
var inputPhone = document.getElementById('input-phone');
var button = document.querySelector('.submit-button');
var regEx = /\S+@\S+\.\S+/;

var form = document.querySelector('.form');

function checkInput() {
    if (inputName.value.trim() !== "" && regEx.test(inputMail.value) && inputPhone.value.trim() !== "") {
        button.style.backgroundColor = '#fa923f';
        button.disabled = false;

    } else {
        button.style.backgroundColor = '#979695';
    }
}

