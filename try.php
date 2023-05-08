<?php

require_once __DIR__.'/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient([
    'keyFilePath' => 'keys/infoact-b0cbe-firebase-adminsdk-rpiwx-70526df18a.json',
    'projectId' => 'infoact-b0cbe'
]);

$title = $_POST['title'];
$content = $_POST['content'];
$reactions = intval($_POST['reactions']);
$comments = intval($_POST['comments']);

$blogsRef = $db->collection('blogs');
$newBlogRef = $blogsRef->newDocument();

$newBlogRef->set([
    'title' => $title,
    'content' => $content,
    'reactions' => $reactions,
    'comments' => $comments
]);

header('Location: index.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <h2 class="mb-4">Add a New Post</h2>
                <form action="new_post.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="reactions" class="form-label">Reactions</label>
                        <input type="number" class="form-control" id="reactions" name="reactions" required>
                    </div>
                    <div class="mb-3">
                        <label for="comments" class="form-label">Comments</label>
                        <input type="number" class="form-control" id="comments" name="comments" required>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>





57
<div class="col-4">
    <a href="new_post.php" class="btn btn-primary">New Post</a>
</div>