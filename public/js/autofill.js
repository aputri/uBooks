
window.onload = function () {
    // Get the modal
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
    var btn = document.getElementById("add");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    document.getElementById('auto').onclick = function () {
        var books = require('google-books-search');

        var isbn = document.getElementById('isbn').value;

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
function fillForms(book) {
    var fields = document.getElementsByClassName("fillField");
    fields[0].value = book[0]["title"];
    fields[1].value = book[0]["authors"][0];
    fields[2].value = book[0]["description"];
    fields[3].value = book[0]["publishedDate"];
    document.getElementById("thumbnail").setAttribute("src", book[0]["thumbnail"]);
}
function div_show() {
    document.getElementById("popup").style.display = "block";
}
