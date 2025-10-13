<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Categorias e Produtos</title>
</head>
<body>
    <h1>Pagina Principal</h1>
    <h2>
        <?php
            //include_once("verificasessao.php");
           // echo("Usuario: " . $_SESSION["usuarioLogado"]);
        ?>
        <a href="sair.php">Sair</a>
    </h2>

    <h2><a href="categoriaCAD.php">Cadastrar Categoria</a></h2>
    <h2><a href="categoriaCON.php">Consultar Categoria</a></h2>
    <h2><a href="#">Cadastrar Produto</a></h2>
    <h2><a href="#">Consultar Produto</a></h2>

    <hr>
    
    <h2><a href="#">Cadastrar Cliente</a></h2>
    <h2><a href="#">Consultar Cliente</a></h2>
    <h2><a href="#">Cadastrar Endereco</a></h2>
    <h2><a href="#">Consultar Endereco</a></h2>
</body>
</html>