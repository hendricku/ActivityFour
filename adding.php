<?php
 require_once __DIR__.'/vendor/autoload.php';
 use Google\Cloud\Firestore\FirestoreClient;

 $db=new FirestoreClient([
    'keyFilePath' => 'keys/infoact-b0cbe-firebase-adminsdk-rpiwx-70526df18a.json',
    'projectId' => 'infoact-b0cbe'
 ]);
 $blogsRef=$db->collection('blogs');
 $id=$_GET['id'];
 $snap=$blogsRef->document($id)->snapshot();
 $inc=$snap['reactions'];
 
 $blogsRef->document($id)->set([
    'reactions'=>++$inc
 ],['merge'=>true]);


header('location:index.php');

?>
