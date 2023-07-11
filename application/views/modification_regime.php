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
                                <h4 class="card-title">Insertion du régime</h4>
                                <form method="post" action="<?php echo base_url(); ?>Accueil/updateRepas">
                                    <div class="form-group row">
                                        <input type="hidden" name="idrepas" value=<?php echo $repas['IDREPAS'] ?>>
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nom du repas</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputMobile" name="nomrepas" value=<?php echo $repas['NOMREPAS'] ?> >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">calories donnees</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="exampleInputPassword2" name="caloriedonee" value=<?php echo $repas['CALORIEDONEE'] ?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">pourcentage viande</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="exampleInputPassword2" name="pourcentage_viande" value=<?php echo $repas['POURCENTAGE_VIANDE'] ?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">pourcentage poisson</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="exampleInputPassword2" name="pourcentage_poisson" value=<?php echo $repas['POURCENTAGE_POISSON'] ?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">type de repas</label>
                                        <div class="col-sm-9">
                                            <div class="form-group row">
                                                <select name="typerepas" id="typerepas" class="form-control">
                                                    <?php for($i=0;$i<count($typerepas);$i++){ ?>
                                                        <option value="<?php echo $typerepas [$i]['IDtyperepas'] ?>" ><?php echo $typerepas[$i]['nom'];?> </option>
                                                    <?php }?>
                                                </select>
                                            </div>
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
