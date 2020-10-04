<?php
require('conexao.php');

$query = "SELECT * FROM jogador;";

$conexao = conecta();
$aJogadores = mysqli_query($conexao, $query);

if (isset($_POST['jogador']) && $_POST['jogador'] > 0) {
    $jogador = $_POST['jogador'];

    $dadosPartidas = get_dados_partida($jogador);
}else if (isset($_GET['jogador']) && $_GET['jogador'] > 0) {
    $jogador = $_GET['jogador'];

    $dadosPartidas = get_dados_partida($jogador);
}

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
    <br>
    <main>
        <div id="container-table" class="container">
            <form action="partidas.php" method="POST">
                <div class="form-row">
                    <div class="col-8">
                        <select name="jogador" class="custom-select custom-select-lg mb-3" id="jogadores">
                            <option selected>Selecione Jogador(a)</option>
                            <?php
                            if ($aJogadores) {
                                while ($row = mysqli_fetch_array($aJogadores)) {
                                    $select = "";
                                    if (isset($jogador)) {
                                        if ($jogador == $row['id']) {
                                            $select = "selected";
                                        }
                                    }
                            ?>
                                    <option <?= $select ?> value="<?= $row['id'] ?>" value="1"><?= $row['nome'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-info">Ver
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="col-2">
                        <?php
                        if (isset($jogador)) {
                        ?>
                        <button type="button" class="btn btn-success" onclick="$('#formulario').show();">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Adicionar Partida
                        </button>
                        <?php } ?>
                    </div>
                </div>
            </form>

            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jogo</th>
                            <th scope="col">Placar</th>
                            <th scope="col">Mínimo Temporada</th>
                            <th scope="col">Máximo Temporada</th>
                            <th scope="col">Quebra record Min</th>
                            <th scope="col">Quebra record Max</th>
                        </tr>
                    </thead>
                    <tbody id="dados-jogador">
                        <?php
                        if (isset($dadosPartidas)) {
                            echo $dadosPartidas;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <br>
    <section class="container">
        <div id="form">
            <div class="rw">
                <div id="formulario" style="display: none;">
                    <form action="controlador.php?acao=insere_partida" method="POST">
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jogo">Jogo</label>
                                    <input type="number" name="id_jogo" class="form-control" id="jogo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="placar">Placar</label>
                                    <input type="number" name="placar" class="form-control" id="placar">
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($jogador)){
                        ?>
                        <input type="hidden" name="id" value="<?=$jogador?>">
                        <?php
                        }
                        ?>
                                <button type="submit" class="btn btn-primary">Inserir</button>
                                <button type="button" onclick="$('#formulario').hide();" class="btn btn-danger">cancelar</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>

<?php


function get_dados_partida($id)
{
    $conexao = conecta();
    $query = "SELECT * FROM partida WHERE id_jogador = {$id}";
    try {
        $result = mysqli_query($conexao, $query);
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        $htmlDados = "";
        while ($row = mysqli_fetch_array($result)) {
            $htmlDados .= "<tr>";
            $htmlDados .= "<td>{$row['id']}</td>";
            $htmlDados .= "<td>{$row['id_jogo']}</td>";
            $htmlDados .= "<td>{$row['placar']}</td>";
            $htmlDados .= "<td>{$row['min_temporada']}</td>";
            $htmlDados .= "<td>{$row['max_temporada']}</td>";
            $htmlDados .= "<td>{$row['qrecorde_min']}</td>";
            $htmlDados .= "<td>{$row['qrecorde_max']}</td>";
            $htmlDados .= "</tr>";
        }

        return $htmlDados;
    } catch (\Throwable $th) {
        echo "<html><script language='JavaScript'>alert('Ops! Ocorreu um erro.');history.go(-1)</script></html>";
    }
}
?>