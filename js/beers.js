function countMaxLinesInRow(rowName, blockName){
    let elements = document.getElementById(rowName).getElementsByClassName(blockName);
    let maxHeight = 0;
    for (let i = 0; i < elements.length; i++) {
        let actualHeight = elements[i].scrollHeight;
        maxHeight = Math.max(maxHeight, actualHeight);
    }
    for (let i = 0; i < elements.length; i++) {
        elements[i].style.height = maxHeight.toString() + 'px';
    }
}

function changeWebsite(){
    $(function () {
        let url_string = window.location.href
        let url = new URL(url_string);
        let id = url.searchParams.get("id");
        $('.button').click(function () {
            if($(this).hasClass("right")) {
                window.location = '/?page=beers&id=' + (parseInt(id) + 1).toString();
            }
            else if($(this).hasClass("left")) {
                window.location = '/?page=beers&id=' + (parseInt(id) - 1).toString();
            }
            else {
                window.location = '/?page=beers&id=' + $(this).text().trim();
            }
        });
    });
}

$(document).ready(function () {
    countMaxLinesInRow("firstRow", "description");
    countMaxLinesInRow("secondRow", "description");
    countMaxLinesInRow("firstRow", "ingredients");
    countMaxLinesInRow("secondRow", "ingredients");
    changeWebsite();
});