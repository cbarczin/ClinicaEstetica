<?php
include('conexao.php');

$consulta = "SELECT * FROM admin WHERE id = '1';";
$con = $mysqli->query($consulta) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administradores</title>
    <link rel="stylesheet" href="styleAdminFrancisco.css" />
  </head>
  <body>
    <header>
      <h1 class="admin-title">Área do Administrador</h1>
      <section class="user-info">
        <p>ADMINISTRADOR LOGADO:</p>
        <p class="user-name">FRANCISCO</p>
      </section>
    </header>

    <main class="content">
      <section class="admin-cards">
        <div class="admin-card">
          <img
            src="images/francisco.jpg"
            alt="Foto de Sandro"
            class="admin-photo"
          />
          <div id="informacoes">
              <?php while($dado = $con->fetch_array()) { ?>
              <div class="org">
              <p>Nome:   <?php echo $dado["nome"]?></p>
              </div>

              <div class="org">
              <p>Ano de inscrição:   <?php echo $dado["inscricao"]?></p>
              </div>

              <div class="org">
              <p>Relatórios:  <?php echo $dado["rel"]?></p>
              </div>

              <div class="org">
              <p>Sálario: R$<?php echo $dado["salario"]?></p>
              </div>
              <?php } ?>
          </div>
      </section>
      <div>
      <a href="./administradores.html"><button class="add-admin-btn" id="vbotao">Voltar</button></a>
      <a href="./editarDadosAdmin.php"><button class="add-admin-btn">Editar Dados</button></a> 
      </div>
    </main>
    <footer>
      <p class="warning">
        TOME CUIDADO AO SE CONECTAR A REDES SEM FIO PÚBLICAS<br />
        DESCONECTE SUA CONTA INSTITUCIONAL AO TERMINAR SEUS AFAZERES
      </p>
    </footer>