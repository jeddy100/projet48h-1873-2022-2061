<?php 
    // echo count($regime);
    // echo $regime[0]['nom'];
?>
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tous les code</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Code</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr><php count($donner)?></tr> -->
                        <?php for ($i=0; $i < count($donner); $i++) { ?>
                          <tr>
                            <td><?php echo $donner[$i]['iduser']?></td>
                            <td><?php echo $donner[$i]['code']?></td>
                            <td><a href="<?php echo site_url('Regime/acceptercode')?>?id=<?php echo $donner[$i]['iduser']?>&&code=<?php echo $donner[$i]['code']?>">accepeter le code</a></td>
                          </tr>
                     <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
          <form action="<?php echo site_url('Acueil/validerleregime')?>" method="post">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Statistique d activite du site </h4>
                  <form class="form-sample">
                    <!-- <div class="row"> -->
                      <!-- appetraka eto ny cahrtjs  -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Area chart</h4>
                  <canvas id="areaChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          </div>
        </div>
          </form>
        </div>
        <!-- content-wrapper ends -->
        <?php $this->load->view('inc/footer_chart'); ?>
</body>

</html>
