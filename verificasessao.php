<?php
    session_start();

    if( !isset( $_SESSION["usuarioLogado"] ) )
    {
        //echo("<script>alert('Necessario estar logado !');</script>");
        header("Location:autenticar.php");
    }
?>