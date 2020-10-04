<?php
require('conexao.php');

$query = "SELECT * FROM jogador;";

$conexao = conecta();
$aJogadores = mysqli_query($conexao,$query);

// echo "<pre>";
// print_r($aJogadores);
// echo"</pre>";
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
            <a class="navbar-brand" href="index.php">Publica</a>
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
    <div class="container">
        <div class="row">
        <button type="button" class="btn btn-success" onclick="$('#formulario').show();">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        Novo Jogador(a)
        </button>
        </div>
        <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($aJogadores){
                    while($row = mysqli_fetch_array($aJogadores)){
                ?>
                <tr>
                    <th scope="row"><?=$row['id']?></th>
                    <td><?=$row['nome']?></td>
                    <td><?=$row['time']?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            </table>
        </div>

        <div class="row">
            <div id="formulario" style="display: none;">
            <form action="controlador.php?acao=insere_jogador" method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Time</label>
                    <input type="number" name="time" class="form-control" id="time">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="button" onclick="$('#formulario').hide();" class="btn btn-danger">cancelar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>