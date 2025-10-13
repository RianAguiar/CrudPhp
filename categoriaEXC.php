<?php
    //include_once("verificasessao.php");
    require_once("conexao.php");
    if( ( isset($_GET["cod"]) ) )
    {
        $codRecebido = $_GET["cod"];
        $querySQL = "DELETE FROM categoria WHERE codcategoria = $codRecebido";
        $resultado = mysqli_query($conn , $querySQL);
    }
    header("Location:categoriaCON.php");
?>