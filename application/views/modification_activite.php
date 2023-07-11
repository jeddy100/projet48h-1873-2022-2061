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
                                <form method="post" action="<?php echo base_url(); ?>Accueil/updateExercice">
                                    <input type="hidden" name="id" value=<?php echo $exercice['id'] ?>>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputMobile" name="nom" value=<?php echo $exercice['nom'] ?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">calories depense</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="exampleInputPassword2" name="calories" value=<?php echo $exercice['calories_par_rep'] ?>>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
            <?php $this->load->view('inc/footer'); ?>
</body>

</html>
