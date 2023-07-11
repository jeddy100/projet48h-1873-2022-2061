<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="http://localhost/ci306/assets/css/css/bootstrap.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="http://localhost/ci306/assets/welcomecss/style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="http://localhost/ci306/assets/css/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/ci306/vendor/chart/chart.min.js"></script>


  <title>Acceui</title>
</head>
<header>
  <!--- Navbar --->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand text-white" href="#"><i class="fa fa-graduation-cap fa-lg mr-2"></i>WELCOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="nvbCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item pl-1">
            <div class="dropdown">
              <button type="button" style="color: grey;" class="btn dropdown-toggle" data-toggle="dropdown">
                Exercices
              </button>
              <div class="dropdown-menu">
                <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=0">Achats<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=1">Ventes</a>
                <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=2">Verser en Banque</a>
                <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=3">Verser en Caisse</a>
                <a class="nav-link" href="<?php echo base_url('acueil/exo'); ?>?exo=4">Capitaux</a>
              </div>
            </div>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getcodejournaux'); ?>"><i class="fa fa-home fa-fw mr-1"></i>Code journal</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getplancompta'); ?>"><i class="fa fa-th-list fa-fw mr-1"></i>Comptes general</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getplancomptetiers'); ?>"><i class="fa fa-info-circle fa-fw mr-1"></i>Comptes tiers</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getjournal'); ?>"><i class="fa fa-info-circle fa-fw mr-1"></i>Journal</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getgrandlivre'); ?>"><i class="fa fa-info-circle fa-fw mr-1"></i>Grand Livre</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/getbalance'); ?>"><i class="fa fa-info-circle fa-fw mr-1"></i>Balance</a>
          </li>
          <li class="nav-item pl-1">
            <a class="nav-link" href="<?php echo base_url('acueil/deconnect'); ?>"><i class="fa fa-phone fa-fw fa-rotate-180 mr-1"></i>Deconnexion</a>
          </li>
        </ul>
      </div>
    </div>
    </nav>
  <!--# Navbar #-->
</header>

<content>
  <h1><a href="<?php echo base_url('acueil/etats_financiers_actifs'); ?>">Etats Financiers</a></h1>
  <h1>Ventes mensuels</h1>
<canvas id="myChart"></canvas>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
          datasets: [{
              label: 'Ventes Mensuels',
              data: [12, 19, 3, 5, 2, 3, 10],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 99, 132, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255, 99, 132, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
</script>
<h1>Salaires moyens par departements mensuel</h1>
<canvas id="pie-chart"></canvas>

	<script>
		var ctx = document.getElementById('pie-chart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ['Sales', 'Marketing', 'Development', 'Administration'],
				datasets: [{
					label: 'Department Expenses',
					data: [5000, 3000, 2000, 1000],
					backgroundColor: [
						'rgba(255, 99, 132, 0.5)',
						'rgba(54, 162, 235, 0.5)',
						'rgba(255, 206, 86, 0.5)',
						'rgba(75, 192, 192, 0.5)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Department Expenses'
				}
			}
		});
	</script>

</content>

<!--- Footer --->
<footer>
<div class="jumbotron jumbotron-fluid bg-secondary p-4 mt-5 mb-0">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 cizgi">
        <div class="card bg-secondary border-0">
          <div class="card-body text-light text-center">
            <h5 class="card-title text-white display-4" style="font-size:30px"><?php echo $_SESSION['entreprise']['nom']; ?></h5>
          <p class="d-inline lead"><?php echo $_SESSION['entreprise']['adresse']; ?><br>
          <a href="#" class="text-light d-block lead"></a>
          </p>

          </div>
        </div>
      </div>

      <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 cizgi">
        <div class="card bg-secondary border-0">
          <div class="card-body text-center">
            <h5 class="card-title text-white display-4" style="font-size:30px">Contact</h5>
            <a class="text-light d-block lead" style="margin-left: -20px" href="#"><i class="fa fa-phone mr-2"></i>tel: <?php echo $_SESSION['entreprise']['tel']; ?></a>
            <a class="text-light d-block lead" href="#"><i class="fa fa-envelope mr-2"></i>telecopie: <?php echo $_SESSION['entreprise']['telecopie']; ?></a>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card bg-secondary border-0">
          <div class="card-body text-center">
          <h5 class="card-title text-white display-4" style="font-size:30px">Date Exercice</h5>

              <a class="text-light" href="#"><i class="fa fa-facebook-square fa-fw fa-2x"></i>Debut: <?php echo $_SESSION['compta']['d_db_exo']; ?></a><br/>

              <a class="text-light" href="#"><i class="fa fa-twitter-square fa-fw fa-2x"></i>Fin: <?php echo $_SESSION['compta']['d_fin_exo']; ?></a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</footer>
<!--# Footer #-->
</html>
