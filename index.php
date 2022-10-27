<?php
$validador = 0;
if (isset($_GET['cedula'])) {
  $validador = 1;;
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>MultiSeguros | Gane Dinero Vendiendo Seguros</title>
  <meta name="description" content="Gane Dinero Vendiendo Seguros" />
  <link rel="icon" href="../content/img/Escudo-MultiSeguros-Fav-Icon.png" sizes="32x32" type="image/png" />
  <!-- custom.css -->
  <link rel="stylesheet" href="../content/css/custom.css" />
  <!-- bootstrap.min.css -->
  <link rel="stylesheet" href="../content/css/bootstrap.min.css" />
  <!-- font-awesome -->
  <script src="https://kit.fontawesome.com/d79d3dc75c.js"></script>

  <!-- AOS -->
  <link rel="stylesheet" href="../content/css/aos.css" />
  <title>Mi P&oacute;liza</title>
  <link href="index.css" rel="stylesheet">

  <!-- tailwindcss -->
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <div class="contenedor-principal flex flex-col w-auto h-screen justify-center items-center p-2 ">

    <div class="flex justify-center align-center mb-8" id="banner">
      <div class="">
        <header>
          <div class="">
            <div class="">
              <img src="image/sc_ic.png" alt="logo" class="logo bg-center bg-contain"  />
            </div>
        </header>
      </div>
    </div>

    <div class="flex flex-row w-auto justify-center items-center">
      <div class="formulario">
        <form action="mostrarPolizas.php" method="get">
          <div class="flex justify-center items-center flex-wrap">
            <p class="text-sky-600 font-bold text-xl mb-1 mr-1">Introducir cédula: </p>
            <input type="text" name="cedula" id="cedula" class="border-2 border-cyan-700 ml-1 p-1">
          </div>
          <div class="text-center mt-6">
            <button type="submit" class="boton bg-sky-600 text-slate-50 font-bold w-60 h-9 hover:bg-black mb-12"> Ver mi póliza</button>
          </div>
        </form>
      </div>
      <div style="display: <?php if ($validador == 0) {
                              echo 'none';
                            } ?>;" class="p-3 mb-2 bg-danger text-white text-center rounded">
        La Cedula no se encuentra registrada
      </div>
    </div>

  </div>
</body>

</html>