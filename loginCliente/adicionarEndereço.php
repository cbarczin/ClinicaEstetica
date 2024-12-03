<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "clinicaestetica";

    $conn = new mysqli($servername, $usuario, $senha, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $cep = $_POST['cep'];

    $sql = "INSERT INTO enderecos (rua, bairro, cidade, estado, pais, cep) 
            VALUES ('$rua', '$bairro', '$cidade', '$estado', '$pais', '$cep')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /clinicaestetica/loginCliente/visualizarEndereço.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica../estilos/styleAdicionarEndereço.css" />
    <title>Adicionar Endereço</title>
  </head>
  <body>
    <header>
      <div id="barraSuperior">
        <div id="logo">
          <img
            id="iconlogo"
            src="../images/logo.png"
            alt="Logo da CariocaBeauty"
          />
          <p>CariocaBeauty</p>
        </div>
        <div id="busca">
          <label for="campo-busca" class="sr-only"></label>
          <input
            type="text"
            id="campo-busca"
            placeholder="FAÇA SUA BUSCA AQUI"
            aria-label="Busca"
          />
          <button aria-label="Pesquisar">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
        <div id="icones">
          <button aria-label="Localização">
            <img src="../images/local.png" alt="Ícone de localização" />
          </button>
          <button aria-label="Carrinho de compras">
            <img src="../images/compras.png" alt="Ícone de compras" />
          </button>
          <button aria-label="Instagram">
            <img src="../images/instagram.png" alt="Ícone do Instagram" />
          </button>
          <a href="/clinicaestetica/loginCliente/dadosCliente.php" aria-label="Entrar"
            ><img src="../images/entrar.png" alt="Ícone de entrar"
          /></a>
          <button aria-label="Contato">
            <img src="../images/contato.png" alt="Ícone de contato" />
          </button>
        </div>
      </div>
      <nav id="menuSuperior">
        <ul>
          <li><a href="/clinicaestetica/loginCliente/clienteLogado.php">INÍCIO</a></li>
          <li><a href="/clinicaestetica/loginCliente/sobreNos.php">SOBRE NÓS</a></li>
          <li><a href="/clinicaestetica/loginCliente/servicos.php">SERVIÇOS</a></li>
          <li><a href="/clinicaestetica/loginCliente/promoçoes.php">PROMOÇÕES</a></li>
          <li><a href="/clinicaestetica/loginCliente/equipe.php">EQUIPE</a></li>
          <li><a href="/clinicaestetica/loginCliente/centralAjuda.php">CENTRAL DE AJUDA</a></li>
          <li><a href="/clinicaestetica#agendar">AGENDAR</a></li>
        </ul>
      </nav>
    </header>
    <main class="dados-pessoais">
    <section class="content">
      <h1>Adicionar Novo Endereço</h1>
      
      <form method="POST" action="">
        <label for="rua">Rua:</label>
        <input type="text" id="rua" name="rua" required>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" required>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required>

        <button type="submit" name="submit">Adicionar Endereço</button>
      </form>

      <?php
      $servername = "localhost";
      $usuario = "root";
      $senha = "";
      $dbname = "clinicaestetica";

      $conn = new mysqli($servername, $usuario, $senha, $dbname);

      if ($conn->connect_error) {
          die("Erro na conexão: " . $conn->connect_error);
      }

      if (isset($_POST['submit'])) {
          $rua = $_POST['rua'];
          $bairro = $_POST['bairro'];
          $cidade = $_POST['cidade'];
          $estado = $_POST['estado'];
          $pais = $_POST['pais'];
          $cep = $_POST['cep'];

          $sql = "INSERT INTO enderecos (rua, bairro, cidade, estado, pais, cep) 
                  VALUES ('$rua', '$bairro', '$cidade', '$estado', '$pais', '$cep')";

          if ($conn->query($sql) === TRUE) {
              echo "<p>Endereço adicionado com sucesso!</p>";
          } else {
              echo "Erro: " . $sql . "<br>" . $conn->error;
          }
      }

      $conn->close();
      ?>

    </section>
  </main>
    <footer class="footer">
      <div class="footerConteudo">
        <div class="footer-logo">
          <img src="../images/logo.png" alt="Logo CariocaBeauty" />
          <span>CariocaBeauty</span>
        </div>
        <div class="contact-info">
          <p><i class="icon-phone"></i> (21) 1234-5678</p>
          <p><i class="icon-phone"></i> (21) 99999-9999</p>
          <p><i class="icon-email"></i> contato@cariocabeauty.com.br</p>
        </div>
        <div class="horario">
          <p><strong>HORÁRIO DE FUNCIONAMENTO:</strong></p>
          <p>Segunda-feira: 14h às 20h</p>
          <p>Terça a sábado: 9h às 21h</p>
        </div>
        <div class="mapa">
          <img
            src="../images/mapaclinica.jpg"
            alt="Mapa para chegar na clínica"
          />
          <span>Rua Barão de Jaguaripe, 3454 – Ipanema</span>
        </div>
      </div>
    </footer>
  </body>
</html>
