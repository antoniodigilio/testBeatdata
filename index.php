<?php include 'header.php';?>

<main class="flex-shrink-0 mt-4">
  <div class="container">
    <h1 class="mt-5">FrontEnd</h1>
    <p>Con l'utilizzo di HTML, CSS, Javascript, jQuery e librerie come Bootstrap e DataTables</p>
    <div class="row mb-5">

      <div class="col-md-4">
        <a href="user.php">
        <div class="card">
          <div class="card-body">
            <center><h1>Utenti</h1></center>
          </div>
        </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="album.php">
        <div class="card">
          <div class="card-body">
            <center><h1>Album</h1></center>
          </div>
        </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="photo.php">
        <div class="card">
          <div class="card-body">
            <center><h1>Foto</h1></center>
          </div>
        </div>
        </a>
      </div>

    </div>
    <hr/>


    <div class="row mt-3">
      <div class="col-md-12">
        <h1 >Backend - Api</h1>
        <p>Con l'utilizzo di PHP</p>
        <ul>
          <li>Recupero di tutti gli Album con le proprie foto : <code><a href="api.php"  target="_blank">http://test.promomedia.online/testAnto/api.php</a></code></li>
          <li>Recupero di tutti gli Album con le proprie foto filtrato per utente : <code><a href="api.php?userId=1" target="_blank">http://test.promomedia.online/testAnto/api.php?userId=1</a></code></li>

      </div>



    </div>
  </div>
</main>
<?php include 'footer.php'; ?>
