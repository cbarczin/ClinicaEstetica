<?php
include('conexao.php');
$erro = '';

if(isset($_POST['usuario']) || isset($_POST['senha'])) {

    if(strlen($_POST['usuario']) == 0) {
        $erro = "Preencha seu email!";
    } else if(strlen($_POST['senha']) == 0) {
        $erro = "Preencha sua senha";
    } else {
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['usuario'] = $usuario['usuario'];

            header("Location: painel.php");

        } else {
            $erro = "Falha ao logar! Email ou senha incorretos";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/stylelogin.css">
    <title>Clinica Estetica</title>
</head>
<body>
    <header>
        <div id="logo">
        <img id="iconlogo" src="../images/logo.png" alt="logo">
        <p>CariocaBeauty</p>
        </div>
        <input type="text" placeholder="FAÇA SUA BUSCA AQUI"/>
        <div>
            <button><img src="../images/local.png" alt="local"></button>            
            <button><img src="../images/compras.png" alt="compras"></button>               
            <button><img src="../images/instagram.png" alt="instagram">
            </button><a href="../arquivoshtml/entrar.html"><button><img src="../images/entrar.png" alt="entrar"></button>
            </a>
            <button><img src="../images/contato.png" alt="contato"></button>
        </header>
        <nav>
            <ul>
            <a href="../arquivoshtml/index.html"><li>INICIO</li></a>    
            <li>SOBRE NÓS</li>
            <li>SERVIÇOS</li>
            <li>PROMOÇÕES</li>
            <li>EQUIPE</li>
            <li>CENTRAL DE AJUDA</li>
            <li>AGENDAR</li>
            </ul>
        </nav>
    <main>
    <section>
            <h1>Área do Administrador</h1>
            <h2>Realize seu login para ter acesso ao sistema</h2>
            <form action="" method="post">
            <label for="usuario">Informe seu usuário</label>      
            <input type="text" name="usuario" required>
            <label for="senha">Informe sua senha</label>
            <input type="password" name="senha" required>
            <input type="submit" value="Entrar" id="enviar">
            </form> 
            <?php if(!empty($erro)):?>
                    <p style="color: red; font-weight: 700; font-size: 18px; text-align: center;"><?php echo $erro; ?></p>
            <?php endif; ?> 
    </section>
    </main>
</body>
</html>