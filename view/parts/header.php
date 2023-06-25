<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Concession de motos</title>
</head>

<body>
    <style>
        body {
            background-color: #fef6e4;
        }

        nav {
            background-color: #8bd3dd;
            margin: 30px;


        }

        footer {
            background-color: #8bd3dd;
            margin-top: 25px;
        }

        h1 , h2{
            color: #172c66;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?controller=default&action=homepage">
                <img src="public/img/logo.gif" width="100" class="d-inline-block align-top" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=moto&action=list">Toutes nos motos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=security&action=logout">Se déconnecter</a>
                    </li>
                </ul>
            </div>

            <?php
            if ($this->currentUser) {
                echo ('Bonjour ' . $this->currentUser->getLogin());
            }

            ?>
        </div>
    </nav>
</body>