let globalEmailChecker = false;
let globalPasswordChecker = false;

function validateEmail() {
    let inputEmail = document.getElementById("email").value;
    let correctEmail = new RegExp('^[\\w]+@([\\w-]+\\.)+[\\w-]{2,4}$').test(inputEmail);
    let iInfoIconEmail = $("#iconEmail");
    if (correctEmail) {
        iInfoIconEmail.removeClass("fa fa-times fa-lg");
        iInfoIconEmail.addClass("fa fa-check fa-lg");
        globalEmailChecker = true;
    }
    else if (inputEmail === '') {
        iInfoIconEmail.removeClass("fa fa-times fa-lg");
        iInfoIconEmail.removeClass("fa fa-check fa-lg");
        globalEmailChecker = false;
    }
    else {
        iInfoIconEmail.removeClass("fa fa-check fa-lg");
        iInfoIconEmail.addClass("fa fa-times fa-lg");
        globalEmailChecker = false;
    }
    validateInput();
}

function validatePassword() {
    let inputPassword = document.getElementById("password").value;
    let iInfoIconPassword = $("#iconPassword");
    let infoPassword = $(".tooltiptext123");
    let rules = [{
            Pattern: "[A-Z]",
            Target: "UpperCase"
        },
        {
            Pattern: "[a-z]",
            Target: "LowerCase"
        },
        {
            Pattern: "[0-9]",
            Target: "Numbers"
        },
        {
            Pattern: "[!@@#$%^&*]",
            Target: "Symbols"
        }
    ];

    let allCorrect = true;
    for (let i = 0; i < rules.length; i++) {
        let actualInfo = $("#" + rules[i].Target);
        actualInfo.removeClass(new RegExp(rules[i].Pattern).test(inputPassword) ? "visible" : "invisible");
        actualInfo.addClass(new RegExp(rules[i].Pattern).test(inputPassword) ? "invisible" : "visible");
        let checkIfCorrect = new RegExp(rules[i].Pattern).test(inputPassword);
        if(!checkIfCorrect){
            allCorrect = false;
        }
    }
    if (allCorrect && inputPassword.length > 7) {
        iInfoIconPassword.removeClass("fa fa-times fa-lg");
        iInfoIconPassword.addClass("fa fa-check fa-lg");
        infoPassword.addClass("invisible");
        globalPasswordChecker = true;
    }
    else if (inputPassword === '') {
        iInfoIconPassword.removeClass("fa fa-times fa-lg");
        iInfoIconPassword.removeClass("fa fa-check fa-lg");
        infoPassword.removeClass("invisible");
        globalPasswordChecker = false;
    }
    else {
        iInfoIconPassword.removeClass("fa fa-check fa-lg");
        iInfoIconPassword.addClass("fa fa-times fa-lg");
        infoPassword.removeClass("invisible");
        globalPasswordChecker = false;
    }
    validateInput();
}

function validateInput(){
    let submitButton = $("#submit");
    let actualWebsite = window.location.href;
    if(actualWebsite.endsWith('favourites')) {
        if(globalEmailChecker) {
            submitButton.removeAttr("disabled")
            submitButton.addClass("submit");
            submitButton.removeClass("locked");
        }
        else {
            submitButton.disabled = true;
            submitButton.removeClass("submit");
            submitButton.addClass("locked");
        }
    }
    else {
        if (globalEmailChecker && globalPasswordChecker) {
            submitButton.removeAttr("disabled")
            submitButton.addClass("submit");
            submitButton.removeClass("locked");
        } else {
            submitButton.disabled = true;
            submitButton.removeClass("submit");
            submitButton.addClass("locked");
        }
    }
}

function infoColor(){
    let info = $("#info");
    if(info.text().trim() === "Poprawnie zarejestrowano!") {
        info.removeClass('incorrectInput');
        info.addClass('correctInput');
    }
    else {
        info.removeClass('correctInput');
        info.addClass('incorrectInput');
    }
}

$(document).ready(function () {
    $("#email").on('keyup', validateEmail)
    $("#password").on('keyup', validatePassword)
    infoColor();
});