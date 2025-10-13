<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categorias</title>
</head>
<body>
    <h1>Cadastro de Categorias</h1>
    <hr>
    <form action="categoriaCAD.php" method="POST">
        <label for="txtCodCategoria">Código da Categoria:</label>
        <br>
        <input type="text" name="txtCodCategoria" value="(Automatico)" readonly />
        <br>
        <label for="txtNomeCategoria">Nome da Categoria:</label>
        <br>
        <input type="text" name="txtNomeCategoria" max-lenght="50" />
        <br><br>
        <input type="submit" value="Cadastrar"  />
        &nbsp;
        <input type="reset" value="Limpar" />
    </form>
    <?php
        //include_once("verificasessao.php");
        if( isset( $_POST["txtNomeCategoria"] ) )
        {
            //Receber os dados vindos da interface do usuario
            $nome = $_POST["txtNomeCategoria"];

            //Incluir a conexao com o serv. bd
            require_once("conexao.php");

            //Comando SQL (dml) Cadastro --> insert
            $query = "INSERT INTO categoria(nomecategoria) values('$nome')";

            //Processa o cadastro no BD
            $resultado = mysqli_query($conn, $query);

            echo("<script>alert('Categoria Cadastrada !')</script>");
        }
    ?>
</body>
</html>