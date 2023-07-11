<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('inc/header'); ?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php $this->load->view('inc/navbar'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php $this->load->view('inc/panel'); ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      
      <?php $this->load->view('inc/sidebar'); ?>
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Insertion d'une activité sportive</h4>
                    <form method="post" action="<?php echo base_url(); ?>Accueil/insertExercice">
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nom</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" name="nom" placeholder="Nom de l'activité sportive">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">calories depense</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputPassword2" name="calories" placeholder="calories de l'activité sportive">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Insérer</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tous les activités sportives</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nom de l'activite</th>
                                <th>calories depensees</th>

                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i<count($exercice);$i++){?>
                                <tr>
                                    <th scope="row"><?php echo $exercice[$i]['nom']?></th>
                                    <td><?php echo $exercice[$i]['calories_par_rep']?></td>
                                    <td><a href="<?php echo site_url('Accueil/ModifyExercice/'.$exercice[$i]['id']);?>"type="button" class="btn btn-dark btn-icon-text"  >Modifier<i class="typcn typcn-edit btn-icon-append"></i></a></td>
                                    <td><a href="<?php echo site_url('Accueil/deleteExercice/'.$exercice[$i]['id']);?>" type="button" class="btn btn-dark btn-icon-text"  >Supprimer<i class="typcn typcn-edit btn-icon-append"></i></a></td>

                                    </td>
                                </tr>

                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php $this->load->view('inc/footer'); ?>
</body>

</html>
