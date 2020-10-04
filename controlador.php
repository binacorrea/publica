<?php
require('conexao.php');
$conexao = conecta();

$acao = $_GET['acao'];

if($acao == "insere_jogador") {
    $nome = $_POST['nome'];
    $time = $_POST['time'];
    insere_jogador($nome, $time, $conexao);
} else if($acao == "insere_partida") {
    $id_jogador = $_POST['id'];
    $id_jogo = $_POST['id_jogo'];
    $placar = $_POST['placar'];
    insere_partida($id_jogador, $id_jogo, $placar, $conexao);
}


function insere_jogador($nome, $time, $conexao){
    $query = "INSERT INTO jogador(nome, time) values ('{$nome}',{$time});";

    try {
        $result = mysqli_query($conexao, $query);
        echo "<html><script language='JavaScript'>alert('Jogador(a) Cadastrado(a) com Sucesso!');window.location.replace('lista.php')</script></html>";
    } catch (\Throwable $th) {
        echo "<html><script language='JavaScript'>alert('Ops! Ocorreu um erro.');history.go(-1)</script></html>";
    }
}

function insere_partida($id_jogador, $id_jogo, $placar, $conexao) {
    $query = "INSERT INTO partida(id_jogador, id_jogo, placar, min_temporada, max_temporada, qrecorde_min, qrecorde_max) values (";
    $query .= "{$id_jogador}, {$id_jogo}, {$placar}, ";
    $query .= ((verificaPrimeiroJogo($id_jogador)) ? $placar  : calculoMinimoMaximo($id_jogador, $placar, "minimo")) . ", ";
    $query .= ((verificaPrimeiroJogo($id_jogador)) ? $placar  : calculoMinimoMaximo($id_jogador, $placar, "maximo")) . ", ";
    $query .= ((verificaPrimeiroJogo($id_jogador)) ? 0  : quebraRecordMinimoMaximo($id_jogador, $placar, "minimo") ). ", ";
    $query .= ((verificaPrimeiroJogo($id_jogador)) ? 0  : quebraRecordMinimoMaximo($id_jogador, $placar, "maximo") ). "); ";
    // echo "<pre>";
    // print_r($query);
    // echo "</pre>";
    try {
        $result = mysqli_query($conexao, $query);
        echo "<html><script language='JavaScript'>alert('Partida Cadastrada com Sucesso!');window.location.replace('partidas.php?jogador={$id_jogador}')</script></html>";        
    } catch (\Throwable $th) {
        // echo $th;
        echo "<html><script language='JavaScript'>alert('Ops! Ocorreu um erro.');history.go(-1)</script></html>";
    }
}


function calculoMinimoMaximo($id, $placar, $tipo) {
    $conexao = conecta();
    $resultado = 0;
    $query_max = "SELECT MAX(max_temporada) as mtemporada FROM partida WHERE id_jogador = {$id}";
    $query_min = "SELECT MIN(min_temporada) as mtemporada FROM partida WHERE id_jogador = {$id}";

    if($tipo == "minimo") {
        $resultQuery = mysqli_query($conexao, $query_min);

        while($row = mysqli_fetch_array($resultQuery)){
            $resultado = $row['mtemporada'];
        }
        if($resultado > $placar) {
            $resultado = $placar;
        }
    } else {
        $resultQuery = mysqli_query($conexao, $query_max);

        while($row = mysqli_fetch_array($resultQuery)){
            $resultado = $row['mtemporada'];
        }
        if($resultado < $placar) {
            $resultado = $placar;
        }
    }


    return $resultado;
}


function quebraRecordMinimoMaximo($id, $placar, $tipo) {
    $conexao = conecta();
    $resultado = 0;
    $qtd_record=0;
    $query_max = "SELECT MAX(max_temporada) as mtemporada FROM partida WHERE id_jogador = {$id}";
    $query_min = "SELECT MIN(min_temporada) as mtemporada FROM partida WHERE id_jogador = {$id}";

    if($tipo == "minimo") {
        $resultQuery = mysqli_query($conexao, $query_min);
        $qtd_record = get_qtd_record($id, "minimo");
        
        while($row = mysqli_fetch_array($resultQuery)){
            $resultado = $row['mtemporada'];
        }
        if($resultado > $placar) {
            $qtd_record += 1;
        }
    } else {
        $resultQuery = mysqli_query($conexao, $query_max);
        $qtd_record = get_qtd_record($id, "maximo");

        while($row = mysqli_fetch_array($resultQuery)){
            $resultado = $row['mtemporada'];
        }
        if($resultado < $placar) {
            $qtd_record += 1;
        }
    }

    return $qtd_record;
}

function get_qtd_record($id, $tipo){
    $conexao = conecta();
    $resultado = 0;
    $query_max = "SELECT MAX(qrecorde_max) as mtemporada FROM partida WHERE id_jogador = {$id}";
    $query_min = "SELECT MAX(qrecorde_min) as mtemporada FROM partida WHERE id_jogador = {$id}";

    
    if($tipo == "minimo") {
        $resultQuery = mysqli_query($conexao, $query_min);

        while($row = mysqli_fetch_array($resultQuery)){
            $resultado = $row['mtemporada'];
        }
    } else {
        $resultQuery = mysqli_query($conexao, $query_max);

        while($row = mysqli_fetch_array($resultQuery)){
            $resultado = $row['mtemporada'];
        }
    }

    return $resultado;
}

function verificaPrimeiroJogo($id_jogador){
    $conexao = conecta();
    $count = 0;
    $query = "SELECT * FROM partida WHERE id_jogador = {$id_jogador}";
    try {
        $result = mysqli_query($conexao, $query);
        $count = mysqli_num_rows($result);
    } catch (\Throwable $th) {
        echo "<html><script language='JavaScript'>alert('Ops! Ocorreu um erro.');history.go(-1)</script></html>";
        // echo $th;
    }
    return $count == 0 ? true : false;
}
?>