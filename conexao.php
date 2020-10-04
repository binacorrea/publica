<?php
function conecta() {
    
$hostname="localhost";
$username="root";
$password="";
$dbname="publica";
$yourfield = "your_field";
$conexao;

mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Não foi possível conectar ao Banco!');history.go(-1)</script></html>");

$conexao = mysqli_connect($hostname,$username, $password);
mysqli_select_db($conexao,$dbname);
return $conexao;

# Check If Record Exists

// $query = "SELECT * FROM $usertable";

// $result = mysqli_query($query);

if($result){
    while($row = mysqli_fetch_array($result)){
        $name = $row["$yourfield"];
        echo "Name: ".$name."br/>";
    }
}

}
?>