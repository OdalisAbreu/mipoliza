<?php
require "conex/dbconex.php";
$cedula = $_GET['cedula'];
$clientes = select("seguro_clientes","asegurado_cedula = '".$cedula."'");
$polizas = getSeguroByCedula($cedula);
$cantidad = $polizas->num_rows;

if ($cantidad > 0) {
    $nombre = $clientes->fetch_object()->asegurado_nombres;
    $apellido = $clientes->fetch_object()->asegurado_apellidos;
    $cedulaDb =  $clientes->fetch_object()->asegurado_cedula;
    
    /*while ($poliza = $polizas->fetch_object()){     
            echo $poliza->nombre.'-';
        }*/
} else {
    header("Location: http://localhost/poliza/mipoliza/index.php?cedula=1");
    die();
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
</head>

<body>
    <div class="jumbotron jumbotron-fluid" id="banner" style="background-color:whitesmoke">
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
        <div>
            Hola <?php echo $nombre.' '.$apellido ?> Te dejo un desglose de tus listados de pólizas activas
        </div>
        <ul>
            <?php while ($poliza = $polizas->fetch_object()){ ?>
            <li>
                <?php $noPoliza = str_pad($poliza->noPoliza, 6, "0", STR_PAD_LEFT);
                 echo $poliza->marca. ' - '.$poliza->modelo.'-'.$poliza->aseguradoraPrefijo.'-'.$noPoliza ;?>
                 <br>
                 <iframe src="https://multiseguros.com.do/ws_dev/TareasProg/GenerarReporteAseguradoraPdfUnico.php?sms=0&id_trans=<?php echo $poliza->noTransaction ?>" frameborder="0" width="300px" height="60px"></iframe>
            </li>
             <?php } ?>
        </ul>
    </div>

</body>

</html>