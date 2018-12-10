<div style="margin: 25px">
  <div style="margin: 10px; position: relative;">
    <div>
      <h4 style="color: #218838">Liste des films</h4>
    </div>
    <div>
      <!-- <a class="btn btn-success" href="views/addFilmDialog.html">Ajouter</a> -->
      <button class="btn btn-success" data-toggle="modal" data-target="#modal">Ajouter</button>
    </div>
  </div>
  <table class="table table-striped" style="">
    <thead>
      <tr>
        <th scope="col">Pochette</th>
        <th scope="col">Titre</th>
        <th scope="col">Réalisateur</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Durée</th>
        <th scope="col">Prix</th>
        <th scope="col">Gestion</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($films as $film) : ?>
        <tr>
          <td scope="row"><img src="<?php echo 'img/'.$film->image; ?>" style="width:50px; height: 55px;" /></td>
          <td><?php echo $film->title; ?></td>
          <td><?php echo $film->director; ?></td>
          <td><?php echo $film->category; ?></td>
          <td><?php echo $film->duration; ?></td>
          <td><?php echo $film->price; ?></td>
          <td>
            <a class="btn btn-success btn-sm" href="viewsfilms/updateForm.php?id=<?php echo $film->id; ?>">Modifier</a>
            <button class="btn btn-danger btn-sm" onclick="deleteFilm(<?php echo $film->id ?>)">Supprimer</button>
            <!-- href="viewsfilms/deleteFilm.php?id=<?php echo $film->id; ?>" -->
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
<div>