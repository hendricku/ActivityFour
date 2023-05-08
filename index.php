<?php
require_once __DIR__.'/vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;

if (isset($_POST['submit'])) {
    $db = new FirestoreClient([
        'keyFilePath' => 'keys/infoact-b0cbe-firebase-adminsdk-rpiwx-70526df18a.json',
        'projectId' => 'infoact-b0cbe'
    ]);
    $blogsRef = $db->collection('blogs');
    
    $newBlog = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'reactions' => 0,
        'comments' => 0
    ];
    $blogsRef->add($newBlog);
}

$db = new FirestoreClient([
    'keyFilePath' => 'keys/infoact-b0cbe-firebase-adminsdk-rpiwx-70526df18a.json',
    'projectId' => 'infoact-b0cbe'
]);
$blogsRef = $db->collection('blogs');
$blogs = $blogsRef->documents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Pos Collection Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .card {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
       

            </div>
        </div>

        <?php
        foreach ($blogs as $blog) {
            echo '<div class="card">
                <div class="card-header">
                    <h5 class="card-title">' . $blog['title'] . '</h5>
              
                <div class="card-body">
                    <p class="card-text">' . $blog['content'] . '</p>
                    <div class="row">
                        <div class="col-4">
                            <p>Reactions: ' . $blog['reactions'] . '</p>
                        </div>
                        <div class="col-4">
                            <p>Comments: ' . $blog['comments'] . '</p>
                        </div>
                        <div class="col-4">
                            <a href="adding.php?id=' . $blog->id() . '"><i class="bi-heart-fill"></i></a>
                        </div>
                    </div>
                </div>

            </div>';
        } 
        ?>
    </div>
</body>
</html>
