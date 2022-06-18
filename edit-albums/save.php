<?php

require_once 'DBBlackbox.php';
require_once 'Album.php';
require_once 'Session.php';

// session_start();

$id = $_GET['id'] ?? null;

if ($id) {
    //editing existing record
    $album = find($id,  'Album');
} else {
    //creating a new record
    $album = new Album;
}



//$session = Session :: instsnce () ->set('Success message', 'Saved');

//validate

$valid = true; //everithing is ok
$errors = []; //error messages

if (empty($_POST['title'])) {
    $valid = false;
    $errors [] = 'The title is mandatory';
}

if (empty($_POST['author'])) {
    $valid = false;
    $errors [] = 'The author is mandatory';
}

if (!empty($_POST['year_of_release']) 
    && !is_numeric($_POST['year_of_release'])) {
    $valid = false;
    $errors [] = 'The year of release must be a number';
}

if(!$valid) {
// validation failed


//flash the error messages

Session::instance()->flash('errors', $errors);

//flash the bad request data

Session::instance()->flashRequest();

//redirect back
if($id) {
    header('Location: edit.php?id=' .$id);
} else {
    header('Location: edit.php');
}

exit(); // stop execution of script

}

//update data from the request

$album->title = $_POST['title'] ?? $album->title;
$album->cover_image = $_POST['cover_image'] ?? $album->cover_image;
$album->author = $_POST['author'] ?? $album->author;
$album->year_of_release = $_POST['year_of_release'] ?? $album->year_of_release;

if ($id) {
    update($id, $album);
} else {
    $id = insert($album);
}

Session::instance()->flash('success_message', 'Album successfully saved');

//redirect to the form
header('Location: edit.php?id=' .$id);