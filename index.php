<?php
require('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-primary bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lista.php">Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="partidas.php">Partidas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <br>
    <div class="container">
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img src="_img/jogadora.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Lista de Jogadores</h5>
                    <p class="card-text">Confira a lista/adicione novo Jogador(a)</p>
                    <a href="lista.php" class="btn btn-primary">Ver</a>
                </div>
            </div>
            <div class="col-4">
                &nbsp;
            </div>
            <div class="card" style="width: 18rem;">
                <img src="_img/partida.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Partidas</h5>
                    <p class="card-text">Adicione uma nova partida.</p>
                    <a href="partidas.php" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>