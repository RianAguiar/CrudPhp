<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticar Usuario</title>
</head>
<body>
    <h1>Autenticacao do Sistema:</h1>
    <hr>
    <form action="autenticar.php" method="post">
        <label for="txtUsuario">Usuario:</label>
        <input type="text" name="txtUsuario" />
        <br>
        <label for="txtSenha">Senha:</label>
        <input type="password" name="txtSenha" />
        <br><br>
        <input type="submit" value="Autenticar" />
    </form>
    <?php
        if( isset($_POST["txtUsuario"]) )
        {
            $usuario = $_POST["txtUsuario"];
            $senha   = $_POST["txtSenha"];
            require_once("conexao.php");
            $querySQL = "SELECT usuario, senha, perfilacesso 
                         FROM usuario
                         WHERE usuario='$usuario' AND senha=sha1('$senha')";
            $resultado = mysqli_query($conn, $querySQL);
            if( mysqli_num_rows($resultado) > 0 )
            {
                session_start();
                $linha = mysqli_fetch_assoc($resultado);
                $_SESSION["usuarioLogado"]  = $linha["usuario"];
                $_SESSION["perfilAcesso"]   = $linha["perfilacesso"];
                header("Location:index.php");
            }
            else
            {
                echo("<script>alert('Usuario ou Senha Invalidos !');</script>");
            }
        }
    ?>
</body>
</html>