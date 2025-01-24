<!DOCTYPE html>
<html>
    
<?php 


//llamada API de la proxima pelicula de Marvel

const URL_API = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(URL_API);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$resultado = curl_exec($ch);
$data = json_decode($resultado, true);
curl_close($ch);





?>

<head>
    <title>Ejemplo</title>
</head>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ocupa toda la altura de la ventana */
            margin: 0; /* Elimina los márgenes predeterminados */
            
            font-family: Arial, sans-serif;
        }

        main {
            text-align: center; /* Centra el texto dentro del main */
            background-color: rgb(64, 64, 64);
            padding: 2rem; /* Espaciado interno */
            border-radius: 10px; /* Esquinas redondeadas */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra ligera */
            max-width: 400px; /* Limita el ancho */
            width: 100%; /* Asegura que se ajuste en pantallas pequeñas */
        }

        img {
            max-width: 100%; /* La imagen no debe desbordar su contenedor */
            height: auto; /* Mantiene la proporción de la imagen */
            border-radius: 5px; /* Esquinas redondeadas en la imagen */
        }
</style>



<body>
<main>
    <h1>Proxima pelicula de Marvel</h1>
<section>
    <img src=<?=$data["poster_url"]?> alt="Poster de la siguiente pelicula">
</section>

<hgroup>
    <h2><?=$data["title"]?></h2>
    <h3>Se estrena en <?=$data["days_until"]?> dias. (<?= $data["release_date"]?>)</h3>
    <p><?=$data["overview"]?></p>
    <p>Proxima pelicula: <?=$data["following_production"]["title"]?> en <?=$data["following_production"]["days_until"]?> dias.</p>
</hgroup>
</main>
</body>

</html>