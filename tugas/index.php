<?php
include ('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Covid Statistik (Asia)</title>
    <!--CSS-->
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #0B2Fa6">
      <div class="container">
        <a class="navbar-brand" href="index.php" style="color: white;">Covid Statistik (Asia)</a>
      </div>
    </nav>
    <!-- Akhir NavBar -->
    <!-- Menu Admin -->
    <section id="Menu Admin">
      <div class="container pt-5 pb-5">
        <div class="row text-center">
          <div class="col Proto">
            <h2>Menu Statistik</h2>
          </div>
        </div>
      </div>
      <div class="container pb-5">
        <div class="row justify-content-center text-center">
          <div class="col-md-5 mb-4">
            <a class="nav-link" href="totalCases.php">
              <div class="card p-2" style="background-color: #b6ccff">
                <h5 class="fw-bolder"><i class="bi bi-globe-asia-australia" style = "font-size : 3rem;"></i><br> Total Cases</h5>
              </div>
            </a>
          </div>
          <div class="col-md-5 mb-4">
            <a class="nav-link" href="totalDeath.php">
              <div class="card p-2" style="background-color: #b6ccff">
                <h5 class="fw-bolder"><i class="bi bi-heartbreak-fill" style = "font-size : 3rem;"></i><br>Total Deaths</h5>
              </div>
            </a>
          </div>
          <div class="col-md-5 mb-4">
            <a class="nav-link" href="totalRecovered.php">
              <div class="card p-2" style="background-color: #b6ccff">
                <h5 class="fw-bolder"><i class="bi bi-balloon-heart-fill" style = "font-size : 3rem;"></i><br>Total Recovered</h5>
              </div>
            </a>
          </div>
          <div class="col-md-5 mb-4">
            <a class="nav-link" href="activeCases.php">
              <div class="card p-2" style="background-color: #b6ccff">
                <h5 class="fw-bolder"><i class="bi bi-virus" style = "font-size : 3rem;"></i><br>Active Cases</h5>
              </div>
            </a>
          </div>
          <div class="col-md-5 mb-4">
            <a class="nav-link" href="totalTests.php">
              <div class="card p-2" style="background-color: #b6ccff">
                <h5 class="fw-bolder"><i class="bi bi-clipboard-heart-fill" style = "font-size : 3rem;"></i><br>Total Tests</h5>
              </div>
            </a>
          </div>
        </div>
    </section>
    <!-- Akhir Menu Admin -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>