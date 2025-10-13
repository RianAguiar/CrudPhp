<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Categorias</title>
</head>
<body>
    <h1>Consultar Categorias</h1>
    <hr>
    <form action="categoriaCON.php" method="GET">
        <label for="txtFiltro">Filtrar:</label>
        <input type="text" name="txtFiltro" />
        <input type="submit" value="Filtrar" />
    </form>
    <hr>
    <table border="1">
        <tr><th>Codigo</th><th COLSPAN="3">Nome da Categoria</th></tr>
        <!-- Dados que estao armazenados no MySQL -->
        <?php
            include_once("verificasessao.php");

            require_once("conexao.php");

            $querySQL = "SELECT codcategoria, nomecategoria FROM  categoria";

            if( isset($_GET["txtFiltro"]) )
            {
                $filtro = $_GET["txtFiltro"];
                $querySQL = $querySQL . " WHERE nomecategoria like '%$filtro%'";
            }

            $resultado = mysqli_query($conn , $querySQL);
            while( $linha = mysqli_fetch_assoc($resultado) )
            {
                $cod  = $linha["codcategoria"];
                $nome = $linha["nomecategoria"];
                echo("<tr>");
                echo("<td>$cod</td>");
                echo("<td>$nome</td>");
                echo("<td>
                        <a href='categoriaEDT.php?cod=$cod'>
                            Editar
                        </a>
                      </td>");

                echo("<td><a href='categoriaEXC.php?cod=$cod' onClick=\"return confirm('Deseja realmente excluir ?')\" >Excluir</a></td>");

                echo("</tr>");
               
               
               
               
                // if($_SESSION["perfilAcesso"] == "A")
                {
                    
                }
                //else
                {
                    //echo("<td>RESTRITO</td>");
                }
               
            }
        ?>
    </table>
</body>
</html>