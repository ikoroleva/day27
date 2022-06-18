<?php

require_once 'lib/DBBlackbox.php';
require_once 'Comment.php';

// your code here

$id = $_GET['id'] ?? null;

if ($id) {
    //editing existing record
    $comment = find($id,  'Comment');
} else {
    //creating a new record
    $comment = new Comment;
}


date_default_timezone_set('Europe/Prague');

$date = date('Y-m-d H:i:s');
var_dump($date);

$comment->author = $_POST['author'] ?? $comment->author;
$comment->dateTime = $date;
$comment->text = $_POST['text'] ?? $comment->text;
var_dump($_POST);

//var_dump ($comment);

if ($id) {
    update($id, $comment);
} else {
    $id = insert($comment);
}

header('Location: index.php');