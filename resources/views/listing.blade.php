{{-- @extends('layouts.prettyLayoutPage') --}}
<?php

//print_r($result);

foreach($result as $key=>$book){
    //echo $book->id . '<br>';
    echo $book->title . '<br>';
    echo $book->desc . '<br>';
    echo $book->price . '<br>';
    echo $book->created_at . '<br>';
}
?>