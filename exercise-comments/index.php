<?php

require_once 'lib/DBBlackbox.php';
require_once 'Comment.php';


$id = $_GET['id'] ?? null;

if ($id) {
    //editing existing record
    $comment = find($id,  'Comment');
} else {
    //creating a new record
    $comment  = new Comment;
    //var_dump($comment);
}

$previous_comments = select(null, null, 'Comment');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disney buys Star Wars maker Lucasfilm from George Lucas | BBC News</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <article>

        <div class="img">
            <img src="img/article.jpg" alt="Disney buys Star Wars maker Lucasfilm from George Lucas">
        </div>

        <h1>Disney buys Star Wars maker Lucasfilm from George Lucas</h1>

        <p class="story">Disney is buying Lucasfilm, the company behind the Star Wars films, from its chairman and founder George Lucas for $4.05bn (£2.5bn).</p>

        <p>Mr Lucas said: "It's now time for me to pass Star Wars on to a new generation of film-makers."</p>

        <p>In a statement announcing the purchase, Disney said it planned to release a new Star Wars film, episode seven, in 2015.</p>

        <p>That will be followed by episodes eight and nine and then one new movie every two or three years, the company said.</p>

    </article>

    <div class="comments">
        <h2>Comment below:</h2>

        <?php if ($id) : ?>
        <form action="handle-form.php?id=<?= $id ?>" method="post">
        <?php else : ?>
            <form action="handle-form.php" method="post">
        <?php endif; ?>
            Author: <br>
            <input type="text" name="author" value="<?= $comment->author ?>">
            <br>
            Comment: <br>
            <textarea name="text" cols="30" rows="6"><?= $comment->text ?></textarea>
            <br>

            
            <button type="submit">Add</button>
            <?php foreach ($previous_comments as $comment) : ?>
                    <div class="previous_comment">
                        <div class="previous_comment_heading">
                        <a href="#" class="previous_comment_author"><?=$comment->author?></a>
                        <p class="previous_comment_datetime"><?=$comment->dateTime?></p>
                        </div>
                        <div class="comment-body">
                            <p><?= $comment->text ?></p>
                        </div>
                    </div>
            <?php endforeach; ?>
        </form>

    </div>
</body>
</html>