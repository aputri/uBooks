{{-- Layout to be added in later to make it look good --}}
{{-- @extends('layouts.prettyLayoutPage') --}}
<?php

//prints out the book info, can be changed later if needed
foreach($result as $key=>$book){
    echo $book->name . '<br>';
    echo $book->edition . '<br>';
    echo $book->description . '<br>';
    echo $book->price . '<br>';
    echo $book->condition . '<br>';
    echo $book->created_at . '<br>';
}
?>