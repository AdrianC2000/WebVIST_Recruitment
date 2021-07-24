function infoColor(){
    let info = $("#info");
    if(info.text().trim() === "Poprawnie zalogowano!") {
        info.removeClass('incorrectInput');
        info.addClass('correctInput');
    }
    else {
        info.removeClass('correctInput');
        info.addClass('incorrectInput');
    }
}

$(document).ready(function () {
    infoColor();
});