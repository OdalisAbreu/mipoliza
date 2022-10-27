<?php
require "conex/dbconex.php";
$cedula = $_GET['cedula'];
$clientes = select("seguro_clientes", "asegurado_cedula = '" . $cedula . "'");
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

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="bg-neutral-700">

    <div class="flex justify-center bg-white">
        <header>
            <div>
                <div>
                    <img src="image/sc_ic.png" alt="logo" class="logo" />
                </div>
            </div>
        </header>
    </div>

    <div class="flex flex-col">
        <div class="text-white p-2 font-bold text-lg mb-8 w-full bg-sky-600 text-center">
            Hola <?php echo $nombre . ' ' . $apellido ?>, te dejo un desglose de tus listados de pólizas activas:
        </div>
        <ul class="flex flex-wrap justify-center align-center pb-2">
            <?php while ($poliza = $polizas->fetch_object()) { ?>
                <li class="text-sky-600 font-bold text-center m-2 bg-neutral-200 p-2 rounded-md">
                    <?php $noPoliza = str_pad($poliza->noPoliza, 6, "0", STR_PAD_LEFT);
                    echo $poliza->marca . ' - ' . $poliza->modelo . '-' . $poliza->aseguradoraPrefijo . '-' . $noPoliza; ?>
                    <br>
                    <div class="flex justify-center align-center">
                        <iframe src="https://multiseguros.com.do/ws_dev/TareasProg/GenerarReporteAseguradoraPdfUnico.php?sms=0&id_trans=<?php echo $poliza->noTransaction ?>" frameborder="0" width="300px" height="60px"></iframe>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <a href="" class="flex self-center justify-center items-center w-fit p-4 h-6 bg-sky-600 rounded-md text-lg text-white m-4 hover:bg-sky-800">Volver a WhatsApp</a>
    </div>

</body>

</html>