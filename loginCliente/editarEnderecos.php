<?php
// Conectar ao banco de dados
$servername = "localhost";
$usuario = "root";
$senha = "";
$dbname = "clinicaestetica";

$conn = new mysqli($servername, $usuario, $senha, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verificar se o ID do endereço foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar o endereço com base no ID
    $sql = "SELECT * FROM enderecos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir os dados no formulário
        $row = $result->fetch_assoc();
        $rua = $row['rua'];
        $bairro = $row['bairro'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
        $pais = $row['pais'];
        $cep = $row['cep'];
    } else {
        echo "Endereço não encontrado.";
        exit();
    }
} else {
    echo "ID não fornecido.";
    exit();
}

// Atualizar os dados se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os valores do formulário
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $cep = $_POST['cep'];

    // Atualizar o endereço no banco de dados
    $sql = "UPDATE enderecos SET rua = '$rua', bairro = '$bairro', cidade = '$cidade', estado = '$estado', pais = '$pais', cep = '$cep' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar para a página de visualização de endereços
        header('Location: visualizarEndereço.php');
        exit();
    } else {
        echo "Erro ao atualizar o endereço: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica/estilos/styleEndereço.css" />
    <title>Editar Endereço</title>
  </head>
  <body>
    <header>
      <div id="barraSuperior">
        <div id="logo">
          <img id="iconlogo" src="../images/logo.png" alt="Logo da CariocaBeauty" />
          <p>CariocaBeauty</p>
        </div>
        <div id="busca">
          <label for="campo-busca" class="sr-only"></label>
          <input type="text" id="campo-busca" placeholder="FAÇA SUA BUSCA AQUI" aria-label="Busca" />
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
                    <a href="/clinicaestetica/loginCliente/dadosCliente.php" aria-label="Entrar">
            <img src="../images/entrar.png" alt="Ícone de entrar" />
          </a>
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
          <li><a href="/clinicaestetica/loginCliente/promoçoes.php">AGENDAR</a></li>
        </ul>
      </nav>
    </header>

    <main>
    <h1>Editar Endereço</h1>
    <form method="POST" action="">
      <label for="rua">Rua:</label>
      <input type="text" name="rua" id="rua" value="<?php echo $rua; ?>" required>

      <label for="bairro">Bairro:</label>
      <input type="text" name="bairro" id="bairro" value="<?php echo $bairro; ?>" required>

      <label for="cidade">Cidade:</label>
      <input type="text" name="cidade" id="cidade" value="<?php echo $cidade; ?>" required>

      <label for="estado">Estado:</label>
      <input type="text" name="estado" id="estado" value="<?php echo $estado; ?>" required>

      <label for="pais">País:</label>
      <input type="text" name="pais" id="pais" value="<?php echo $pais; ?>" required>

      <label for="cep">CEP:</label>
      <input type="text" name="cep" id="cep" value="<?php echo $cep; ?>" required>

      <button type="submit">Atualizar Endereço</button>
    </form>
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
          <img src="../images/mapaclinica.jpg" alt="Mapa para chegar na clínica" />
          <span>Rua Barão de Jaguaripe, 3454 – Ipanema</span>
        </div>
      </div>
    </footer>

    <?php
// Fechar conexão
$conn->close();
?>

    