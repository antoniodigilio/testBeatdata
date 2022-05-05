<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$linkUsers="http://jsonplaceholder.typicode.com/users";
$linkAlbums="http://jsonplaceholder.typicode.com/albums";
$linkPhotos="http://jsonplaceholder.typicode.com/photos";

if(isset($_GET['userId'])){
  if($_GET['userId']<>''){
    $linkUsers .="?id=".$_GET['userId'];
  }
}elseif(isset($_GET['albumId'])){
  $linkUsers .="?id=".json_decode(file_get_contents($linkAlbums."?id=".$_GET['albumId']))[0]->userId;
}

$arr=array();

$jsonUsers = file_get_contents($linkUsers);
$rowUsers = json_decode($jsonUsers);
foreach($rowUsers as $user){
  if(isset($_GET['albumId'])){
    $jsonAlbums = file_get_contents($linkAlbums."?id=".$_GET['albumId']."&userId=".$user->id);
  }else{
    $jsonAlbums = file_get_contents($linkAlbums."?userId=".$user->id);
  }

$rowAlbums = json_decode($jsonAlbums);
foreach($rowAlbums as $album){
    $jsonPhotos = file_get_contents($linkPhotos."?albumId=".$album->id);
    $rowPhotos = json_decode($jsonPhotos);
    foreach($rowPhotos as $photo){
      $arr[]=array(
        "idPhoto" => $photo->id,

        "titlePhoto" => $photo->title,
        "url" => $photo->url,
        "thumbnailUrl" => $photo->thumbnailUrl,
        "album" =>array(
                'id' => $album->id,
                'title' => $album->title,
                "user" =>array(
                        'id' => $user->id,
                        'name' => $user->name
                    ),
            ),
      );
    }
}
}

header('Content-type: text/javascript');
echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

//print_r(json_decode($api));
 ?>
