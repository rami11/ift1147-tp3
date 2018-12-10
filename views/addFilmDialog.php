<!-- Add film dialog -->
<div class="modal fade" id="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #218838;">Ajouter film</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-add-film" method="post">
        <div class="modal-body">

          <!-- Add film view -->
          <div class="row">
            <div class="col-md-12">
              <!-- Errors will show here -->
              <!-- title -->
              <div class="form-group row">

                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo $film->title; ?>">
                </div>

              </div>
              <!-- director -->
              <div class="form-group row">
                <label for="director" class="col-sm-2 col-form-label">Réalisateur</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="director" name="director">
                </div>
              </div>

              <!-- duration -->
              <div class="form-group row">
                <label for="duration" class="col-sm-2 col-form-label">Durée</label>
                <div class="col-sm-10">
                  <input type="number" min="0" max="300" class="form-control" id="duration" name="duration">
                </div>
              </div>
              <!-- price -->
              <div class="form-group row">
                <label for="duration" class="col-sm-2 col-form-label">Prix</label>
                <div class="col-sm-10">
                  <input type="number" step="0.01" min="0" max="50" class="form-control" id="price" name="price">
                </div>
              </div>

              <!-- category -->
              <div class="form-group">
                <select name="category" id="category" class="form-control">
                  <option disabled selected value placeholder="hello">Catégorie</option>
                  <?php foreach ($categories as $category) : ?>
                      <option><?php echo $category->name ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <!-- image -->
              <div class="form-group">
                <input type="file" name="image" id="image">
              </div>

              <!-- </form> -->
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal" onclick="$('#modal input').val('');">Annuler</button>
          <button class="btn btn-success" onclick="addFilmButtonClicked();">Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>