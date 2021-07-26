let isLogged;

function countMaxLinesInRow(rowName, blockName) {
    let elements = document.getElementById(rowName).getElementsByClassName(blockName);
    if($(window).width() > 767) {
        let maxHeight = 0;
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.removeProperty('height');
            let actualHeight = elements[i].scrollHeight;
            maxHeight = Math.max(maxHeight, actualHeight);
            console.log(rowName, blockName, actualHeight, i)
        }
        console.log(rowName, blockName, maxHeight)
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.height = maxHeight.toString() + 'px';
        }
    }
    else {
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.removeProperty('height');
        }
    }
}

function changeWebsite() {
    $(function () {
        let url_string = window.location.href
        let url = new URL(url_string);
        let id = url.searchParams.get("id");
        $('.button').click(function () {
            if ($(this).hasClass("right")) {
                window.location = '/?page=beers&id=' + (parseInt(id) + 1).toString();
            } else if ($(this).hasClass("left")) {
                window.location = '/?page=beers&id=' + (parseInt(id) - 1).toString();
            } else {
                window.location = '/?page=beers&id=' + $(this).text().trim();
            }
        });
    });
}

function changeFavouriteButton() {
    $(function () {
        $('.fa-star').click(function () {
            let isLogged = checkIfLoggedIn();
            if(isLogged.trim() === 'UserLoggedIn') {
                let idBeer = $(this).attr('id');
                if ($(this).hasClass("normal")) {
                    $(this).removeClass('normal');
                    $(this).addClass('favorite');

                    $.ajax({
                        data: {'idBeerAdd': idBeer},
                        type: 'post'
                    });

                } else if ($(this).hasClass("favorite")) {
                    $(this).removeClass('favorite');
                    $(this).addClass('normal');

                    $.ajax({
                        data: {'idBeerRemove': idBeer},
                        type: 'post'
                    });
                }
            }
            else {
                alert('Log in to add this beer to your favourites list!')
            }
        });
    });
}

function checkIfLoggedIn() {
    var isLogged = '';
    $.ajax({
        data: {'isLoggedIn': null},
        type: 'post',
        async: false,
        success: function (response) {
            isLogged = response;
        }
    });
    return(isLogged);
}

function setFavouriteButton() {
    let url_string = window.location.href
    let url = new URL(url_string);
    let id = url.searchParams.get("id");
    $.ajax({
        data: {'getFavourites': id},
        type: 'post',
        success: function (alreadyFavouritesIDs) {
            alreadyFavouritesIDs = JSON.parse(alreadyFavouritesIDs);
            for (let i = 0; i < alreadyFavouritesIDs.length; i++) {
                let actualID = parseInt(alreadyFavouritesIDs[i]) + 1;
                let actualStar = $('#' + actualID.toString());
                $(actualStar).removeClass('normal');
                $(actualStar).addClass('favorite');
            }
        }
    });
}

$(window).resize(function () {
    countMaxLinesInRow("firstRow", "header");
    countMaxLinesInRow("secondRow", "header");
    countMaxLinesInRow("firstRow", "description");
    countMaxLinesInRow("secondRow", "description");
    countMaxLinesInRow("firstRow", "ingredients");
    countMaxLinesInRow("secondRow", "ingredients");
});

$(document).ready(function () {
    countMaxLinesInRow("firstRow", "header");
    countMaxLinesInRow("secondRow", "header");
    countMaxLinesInRow("firstRow", "description");
    countMaxLinesInRow("secondRow", "description");
    countMaxLinesInRow("firstRow", "ingredients");
    countMaxLinesInRow("secondRow", "ingredients");
    changeWebsite();
    setFavouriteButton();
    changeFavouriteButton();
});