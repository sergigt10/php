<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <?php flash('post_message'); ?>
              <br>
              <h2>Menú del dia</h2>
              <br>
              <input class="form-control" id="myInput" type="text" placeholder="Buscar menú.." aria-label="Search">
              <br>
              <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                  <thead>
                    <tr style="background: black; color: white;">
                      <th scope="col">Dia menú</th>
                      <th scope="col">Editar</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <?php foreach($data['menus'] as $menu) : ?>
                      <tr>
                        <td><a href="<?php echo URLROOT; ?>/menus/edit/<?php echo $menu->id_menu; ?>" style="color: black;"><b>&nbsp;<?php echo $menu->dia; ?></b></a></td>
                        <td><a href="<?php echo URLROOT; ?>/menus/edit/<?php echo $menu->id_menu; ?>" style="color: black;"><i class="mdi mdi-pencil menu-icon"></i></a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>