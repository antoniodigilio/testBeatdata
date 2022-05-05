<?php include 'header.php';?>
<main class="flex-shrink-0 mt-4">
  <div class="container">
    <h1 class="my-5">Utenti</h1>
    <p class="lead d-none">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code class="small">padding-top: 60px;</code> on the <code class="small">main &gt; .container</code>.</p>
    <div class="row">
      <div class="col-12">

        <div class="card ">
          <div class="card-body">
            <table id="user" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                          <th>Album</th>
                          <th>Foto</th>
                          <th>Nominativo</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $jsonUsers= file_get_contents("http://jsonplaceholder.typicode.com/users");
                    $rowUsers = json_decode($jsonUsers);
                    foreach($rowUsers as $user)
                    {
                    ?>
                    <tr>
                      <td><a class="btn btn-sm btn-primary" href="album.php?userId=<?=$user->id?>"><i class="bi bi-eye"></i></a></td>
                      <td><a class="btn btn-sm btn-primary" href="photo.php?userId=<?=$user->id?>"><i class="bi bi-camera"></i></a></td>
                      <td><?=$user->name?></td>
                      <td><?=$user->username?></td>
                      <td><?=$user->email?></td>
                      <td><?=$user->phone?></td>

                    </tr>
                    <?php
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Album</th>
                            <th>Foto</th>
                            <th>Nominativo</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telefono</th>
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
    $('#user').DataTable( {
    } );
  } );
</script>
