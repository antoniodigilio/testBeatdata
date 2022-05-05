<?php
include 'header.php';
$linkAlbums="http://jsonplaceholder.typicode.com/albums";
$linkUsers="http://jsonplaceholder.typicode.com/users";
?>
<main class="flex-shrink-0 mt-4">
  <div class="container">
    <h1 class="mt-5">Album </h1>
    <?php if(isset($_GET['userId'])){
      $user=json_decode(file_get_contents($linkUsers.'?id='.$_GET['userId']));
    ?>
    <p class="lead">Album di <?=$user[0]->name?></p>
    <?php
    }
    ?>
    <div class="row">
      <div class="col-12">

        <div class="card ">
          <div class="card-body">
            <table id="album" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                          <th></th>
                          <th>Titolo</th>
                            <?php if(!isset($_GET['userId'])){ ?>
                              <th>Utente</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['userId'])){
                      $linkAlbums .="?userId=".$_GET['userId'];
                    }
                    $jsonAlbums= file_get_contents($linkAlbums);
                    $rowAlbums = json_decode($jsonAlbums);
                    foreach($rowAlbums as $album)
                    {
                    ?>
                    <tr>
                      <td><a class="btn btn-sm btn-primary" href="photo.php?albumId=<?=$album->id?>"><i class="bi bi-camera"></i></a></td>
                      <td><?=$album->title?></td>
                      <?php
                        if(!isset($_GET['userId'])){
                          $user=json_decode(file_get_contents($linkUsers.'?id='.$album->userId));
                      ?>
                        <td><?=$user[0]->name?></td>
                      <?php } ?>

                    </tr>
                    <?php
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Titolo</th>
                            <?php if(!isset($_GET['userId'])){ ?>
                              <th>Utente</th>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include 'footer.php'; ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#album').DataTable( {
    } );
  } );
</script>
