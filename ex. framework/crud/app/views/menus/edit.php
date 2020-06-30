<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2>Formulari - Modificar menú del dia - <?php echo $data['dia']; ?></h2>
              <br>
              <form class="forms-sample" method="post" action="<?php echo URLROOT; ?>/menus/edit/<?php echo $data['id_menu']; ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail3">Primers:</label>
                  <textarea id="tinyMceExample" class="editor" name="primers"><?php echo $data['primers']; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail3">Segons:</label>
                  <textarea id="tinyMceExample2" class="editor" name="segons"><?php echo $data['segons']; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail3">Postres:</label>
                  <textarea id="tinyMceExample3" class="editor" name="postres"><?php echo $data['postres']; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail3">Preu:</label>
                  <textarea id="tinyMceExample3" class="editor" name="preu"><?php echo $data['preu']; ?></textarea>
                </div>

                <input type="hidden" name="dia" value='<?php echo $data['dia']; ?>'>

                <button type="submit" name="funcioBoto" class="btn btn-primary mr-2" value="Guardar menú">Guardar menú</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require APPROOT . '/views/inc/footer_edit_add.php'; ?>