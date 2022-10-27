<?php
  $validador = 0;
  if(isset($_GET['cedula'])){
    $validador = 1;;
  }
?>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>MultiSeguros | Gane Dinero Vendiendo Seguros</title>
    <meta name="description" content="Gane Dinero Vendiendo Seguros" />
    <link
      rel="icon"
      href="../content/img/Escudo-MultiSeguros-Fav-Icon.png"
      sizes="32x32"
      type="image/png"
    />
    <!-- custom.css -->
    <link rel="stylesheet" href="../content/css/custom.css" />
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="../content/css/bootstrap.min.css" />
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/d79d3dc75c.js"></script>

    <!-- AOS -->
    <link rel="stylesheet" href="../content/css/aos.css" />
    <title>Mi P&oacute;liza</title>
</head>
<body>
  <div class="jumbotron jumbotron-fluid" id="banner" style="background-color:whitesmoke" >
     <div class="container text-center text-md-left">
        <header>
          <div class="row justify-content-between">
            <div class="col-4">
              <img src="image/sc_ic.png" alt="logo" class="logo" />
            </div>
          </header>

    </div>
</div>
    <div class="container">
      <div class="input-ced d-flex justify-content-center">
        <form action="mostrarPolizas.php" method="get">
          <input type="text" name="cedula" id="cedula" class="form-control justify-content-center">
          <button type="submit"  class="btn my-4 font-weight-bold atlas-cta cta-red"
        style="margin-left: 35px;"> Ver mi póliza</button>
        </form>
      </div>
      <div style="display: <?php if($validador == 0){ echo 'none'; } ?>;" class="p-3 mb-2 bg-danger text-white text-center rounded">
          La Cedula no se encuentra registrada
      </div>
    </div>
    
</body>
</html>

