function div_show(){
    document.getElementById("popup").style.display = "block";
}
window.onload = function () {
    document.getElementsByTagName("button")[0].addEventListener("click", div_show);
    document.getElementById('auto').onclick = function () {
        var books = require('google-books-search');

        var isbn = prompt("Enter an ISBN: ");

        var book = undefined;
        var options = {
            key: "AIzaSyA9d3aNH0Nmd7weoAQQ7hOBwNgoYvjh_qQ",
            field: 'isbn',
            offset: 0,
            limit: 10,
            type: 'books',
            order: 'relevance',
            lang: 'en'
        };

        books.search(isbn, options, function (error, result, apiResponse) {
            if (!error) {
                console.log(result);
                fillForms(result);
            } else {
                console.log(error);
            }
        });


    }
}
function fillForms(book){
    var fields = document.getElementsByClassName("fillField");
    fields[0].value = book[0]["title"];
    fields[1].value = book[0]["authors"][0];
    fields[2].value = book[0]["description"];
    fields[3].value = book[0]["publishedDate"];
    document.getElementById("thumbnail").setAttribute("src", book[0]["thumbnail"]);
}
