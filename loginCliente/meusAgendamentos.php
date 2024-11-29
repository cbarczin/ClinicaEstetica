<?php
// Configurações do banco de dados
$servername = "localhost";
$usuario = "root";
$senha = "";
$dbname = "clinicaestetica";

// Criar conexão
$conn = new mysqli($servername, $usuario, $senha, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// ID do usuário (Substituir por um método seguro para obter o ID do usuário logado)
$usuario_id = 1; // Exemplo: ID fixo, pode ser ajustado conforme sua lógica de login

// Consulta SQL para buscar os agendamentos do usuário
$sql = "SELECT data, hora, servico, valor, status_pagamento 
        FROM agendamentos 
        WHERE usuario_id = $usuario_id 
        ORDER BY data, hora";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/clinicaestetica../estilos/styleConfirmarPagamento.css">
    <title>Meus Agendamentos</title>
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
          <li><a href="/clinicaestetica#promocoes">PROMOÇÕES</a></li>
          <li><a href="/clinicaestetica/loginCliente/equipe.php">EQUIPE</a></li>
          <li><a href="/clinicaestetica/loginCliente/centralAjuda.php">CENTRAL DE AJUDA</a></li>
          <li><a href="/clinicaestetica#agendar">AGENDAR</a></li>
        </ul>
      </nav>
      </nav>
    </header>
    <main class="main">
        <h1>Meus Agendamentos</h1>
        <div class="appointment-list">
            <?php
            if ($result->num_rows > 0) {
                // Exibir cada agendamento
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='appointment-item'>";
                    echo "<p><strong>Data:</strong> " . date("d/m/Y", strtotime($row['data'])) . "</p>";
                    echo "<p><strong>Hora:</strong> " . date("H:i", strtotime($row['hora'])) . "</p>";
                    echo "<p><strong>Serviço:</strong> " . $row['servico'] . "</p>";
                    echo "<p><strong>Valor:</strong> R$ " . number_format($row['valor'], 2, ',', '.') . "</p>";
                  
                    echo "</div>";
                }
            } else {
                echo "<p>Você não possui agendamentos.</p>";
            }
            ?>
        </div>
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
</body>
</html>

<?php
// Fechar conexão
$conn->close();
?>
