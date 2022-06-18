<?php


require_once 'DBBlackbox.php';
require_once 'Album.php';
require_once 'Session.php';
require_once 'helpers.php';

//session_start();

$success_message = Session::instance()->get('success_message');
$errors          = Session::instance()->get('errors', []);

//$messages = [];

// $success_message = null;
// if (isset($_SESSION['success_message'])){
//     $success_message = Session::instance()->get['success_message'];
//     unset($_SESSION['success_message']);
// }


$id = $_GET['id'] ?? null;

if ($id) {
    //editing existing record
    $album = find($id,  'Album');
} else {
    //creating a new record
    $album = new Album;
}

?>

<?php if ($success_message) : ?>
    <div class="message message_success">
        <?= $success_message ?>
    </div>
<?php endif; ?>

<?php foreach ($errors as $error) : ?>
    <div class="message message_error">
        <?= $error ?>
    </div>
<?php endforeach; ?>

<?php if ($id) : ?>
    <form action="save.php?id=<?= $id ?>" method="post">
    <?php else : ?>
        <form action="save.php" method="post">
        <?php endif; ?>

        <!-- display the form prefilled with the current data -->
        Title: <br>
        <input type="text" name="title" value="<?= old('title', $album->title) ?>">
        <br>
        <br>
        Cover image: <br>
        <input type="text" name="cover_image" value="<?= old('cover_image', $album->cover_image) ?>">
        <br>
        <br>
        Author: <br>
        <input type="text" name="author" value="<?= old('author', $album->author) ?>">
        <br>
        <br>
        Year of release: <br>
        <input type="text" name="year_of_release" value="<?= old('year_of_release', $album->year_of_release) ?>">
        <br>
        <br>
        <button>Save</button>
    </form>