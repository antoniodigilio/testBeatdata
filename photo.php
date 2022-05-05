<?php include 'header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<main class="flex-shrink-0 mt-4">
  <div class="container">
    <h1 class="mt-5">Foto</h1>

    <div class="row">
      <?php
      $linkApi="http://test.promomedia.online/testAnto/api.php";
      if(isset($_GET['albumId'])){
        $linkApi .="?albumId=".$_GET['albumId'];
      }elseif(isset($_GET['userId'])){
        $linkApi .="?userId=".$_GET['userId'];
      }
      $jsonPhotos= file_get_contents($linkApi);
      $rowPhotos = json_decode($jsonPhotos);
      foreach($rowPhotos as $photo){ ?>
      <div class="col-12 col-md-3 my-3">
      <div class="card  h-100 ">
        <img src="<?=$photo->thumbnailUrl?>" class="card-img-top" alt="...">
        <div class="card-body ">
          <h5 class="card-title"><?=$photo->titlePhoto?></h5>
          <p class="card-text"><?=$photo->album->title?></p>
          <p class="card-text"><small class="text-muted"><?=$photo->album->user->name?></small></p>
        </div>
      </div>
      </div>
      <?php } ?>
    </div>
  </div>
</main>
<?php include 'footer.php'; ?>
