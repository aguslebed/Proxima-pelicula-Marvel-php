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
    <title>Proximas peliculas de marvel 🦸‍♀️</title>
</head>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    main {
        text-align: center;
        background-color: rgb(64, 64, 64);
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;

    }

    img {
        max-width: 100%;
        border-radius: 5px;

    }
</style>



<body>
    <main>
        <h1>Proximas peliculas de Marvel</h1>
        <section>
            <img src=<?= $data["poster_url"] ?> alt="Poster de la siguiente pelicula">
        </section>

        <hgroup>
            <h2><?= $data["title"] ?></h2>
            <h3>Se estrena en <?= $data["days_until"] ?> dias. (<?= $data["release_date"] ?>)</h3>
            <p><?= $data["overview"] ?></p>
        </hgroup>
<hr>
<br>
        <section>
            <img src=<?= $data["following_production"]["poster_url"] ?> alt="Poster de la siguiente pelicula">
        </section>

        <hgroup>
            <h2><?= $data["following_production"]["title"] ?></h2>
            <h3>Se estrena en <?= $data["following_production"]["days_until"] ?> dias. (<?= $data["following_production"]["release_date"] ?>)</h3>
            <p><?= $data["following_production"]["overview"] ?></p>
        </hgroup>

    </main>
</body>

</html>