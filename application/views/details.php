<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('inc/header_index'); ?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <img src=<?php echo base_url("assets/images/logo.svg"); ?> alt="logo">
              </div>
              <form class="pt-3" action="<?php echo site_url('regime/inscriptionun')?>" method="post">
              <input type="hidden" value="<?php echo $nom ;?>" name="nom">
              <input type="hidden" value="<?php echo $genre ;?>" name="genre">
              <input type="hidden" value="<?php echo $mdp ;?>" name="mdp">
              <input type="hidden" value="<?php echo $mail ;?>" name="mail">
                <div class="form-group">
                  <input type="number" class="form-control form-control-lg" min="0" id="exampleInputUsername1" placeholder="Height" name="height">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-lg" min="0" id="exampleInputUsername1" placeholder="Weight" name="Weight">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Increase your weight
                    </label>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Reduce your weight
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="<?php echo site_url('regime/login'); ?>" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <?php $this->load->view('inc/footer_index'); ?> 
</body>

</html>
