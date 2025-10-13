<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Categoria</title>
</head>
<body>
    <h1>Atualizar Categoria</h1>
    <hr>
    <?php
        //include_once("verificasessao.php");
        
        $codCategoria = 0;
        $nomeCategoria = "Categoria nao encontrada !";
        
        require_once("conexao.php");

        if( isset($_GET["cod"]) )
        {
            $codRecebido = $_GET["cod"];
            $querySQL = "SELECT codcategoria, nomecategoria FROM categoria WHERE codcategoria = $codRecebido";
            $resultado = mysqli_query($conn , $querySQL);
            if( mysqli_num_rows($resultado) > 0 )
            {
                $linha = mysqli_fetch_assoc($resultado);
                $codCategoria  = $linha["codcategoria"];
                $nomeCategoria = $linha["nomecategoria"];
            }
        }

        if( isset($_POST["txtCodCategoria"]) && isset($_POST["txtNomeCategoria"]) )
        {
            $codCategoria  = $_POST["txtCodCategoria"];
            $nomeCategoria = $_POST["txtNomeCategoria"];
            $querySQL = "UPDATE categoria SET nomecategoria = '$nomeCategoria' WHERE codcategoria = $codCategoria";
            $resultado = mysqli_query($conn , $querySQL);
            header("Location:categoriaCON.php");
        }
    ?>
    <form action="categoriaEDT.php" method="POST">
        <label for="txtCodCategoria">Código da Categoria:</label>
        <br>
        <input type="text" name="txtCodCategoria" value="<?php echo($codCategoria); ?>" readonly />
        <br>
        <label for="txtNomeCategoria">Nome da Categoria:</label>
        <br>
        <input type="text" name="txtNomeCategoria" max-lenght="50" 
             value="<?php echo($nomeCategoria); ?>" />
        <br><br>
        <input type="submit" value="Atualizar" />
    </form>
</body>
</html>