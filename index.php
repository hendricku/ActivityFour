<?php
require_once __DIR__.'/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient(array(
    'keyFilePath' => 'keys\infoact-b0cbe-firebase-adminsdk-rpiwx-70526df18a.json',
    'projectId' => 'infoact-b0cbe'
));

$collection = $db->collection("person");
$data = $collection->document('CVdbWnjacbvd5R7AQN8c')->snapshot()->data();
?>
<div>
<h1>Username: <?php echo $data['username']; ?> </h1>
<h1>Name: <?php echo $data['name']['firstname'].' '. $data['name']['lastname']; ?> </h1>
<h1>Role: <?php echo $data['role']; ?> </h1>
<h1>Social Media accounts:</h1>
<ul>
    <li><?php echo $data['social']['facebook']; ?></li>
    <li><?php echo $data['social']['instagram']; ?></li>
    <li><?php echo $data['social']['tiktok']; ?></li>
    <li><?php echo $data['social']['twitter']; ?></li>
</ul>
</div>
