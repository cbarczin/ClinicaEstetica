<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/clinicaestetica/estilos/styleVisualizarEndereco.css" />
  <title>Visualizar Endereços</title>
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
>
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
  <main class="dados-pessoais">
    <aside class="sidebar">
      <div class="profile">
        <img src="../images/alice.jpg" alt="Alana" class="profile-img" />
        <h2>Olá, Alana!</h2>
      </div>
      <nav class="menu">
        <ul>
          <li><a href="/clinicaestetica/loginCliente/dadosCliente.php">Dados pessoais</a></li>
          <li><a href="/clinicaestetica/loginCliente/visualizarEndereço.php">Endereço</a></li>
          <li><a href="/clinicaestetica/loginCliente/autenticacao.php">Autenticação</a></li>
            <li><a href="/clinicaestetica/loginCliente/meusAgendamentos.php">Pedidos</a></li>
          <li><a href="/clinicaestetica/nologin/index.php">Sair</a></li>
        </ul>
      </nav>
    </aside>
    <section class="content">
      <div class="header">
        <a class="add-address-button" href="/clinicaestetica/loginCliente/adicionarEndereço.php">Adicionar Endereço</a>
      </div>
      <h1>Endereços</h1>

      <!-- PHP para exibir os endereços dinamicamente -->
      <?php
      // Conectar ao banco de dados (substitua as configurações com as suas)
      $servername = "localhost";
      $usuario = "root";
      $senha = "";
      $dbname = "clinicaestetica";

      // Criar conexão
      $conn = new mysqli($servername, $usuario, $senha, $dbname);

      // Verificar conexão
      if ($conn->connect_error) {
          die("Erro na conexão: " . $conn->connect_error);
      }

      // Consulta SQL para buscar os endereços
      $sql = "SELECT id, rua, bairro, cidade, estado, pais, cep FROM enderecos";
      $result = $conn->query($sql);

      // Exibir endereços se houver resultados
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="address-card">';
              echo '<p>' . $row["rua"] . '</p>';
              echo '<p>' . $row["bairro"] . ' - ' . $row["cidade"] . ' - ' . $row["estado"] . '</p>';
              echo '<p>' . $row["cep"] . '</p>';
              echo '<p>' . $row["pais"] . '</p>';
              // Passando o ID do endereço para a página de edição
              echo '<a class="edit-button" href="/clinicaestetica/loginCliente/editarEnderecos.php?id=' . $row["id"] . '">Editar</a>';
              // Botão para excluir
              echo '<a class="delete-button" href="excluirEndereco.php?id=' . $row["id"] . '" onclick="return confirm(\'Tem certeza que deseja excluir este endereço?\');">Excluir</a>';
              echo '</div>';
          }
      } else {
          echo '<p>Nenhum endereço encontrado.</p>';
      }

      // Fechar conexão
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
        <img src="../images/mapaclinica.jpg" alt="Mapa para chegar na clínica" />
        <span>Rua Barão de Jaguaripe, 3454 – Ipanema</span>
      </div>
    </div>
  </footer>
</body>
</html>
