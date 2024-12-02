<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica../estilos/styleDadosCliente.css" />
    <title>Clínica Estética</title>
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
    <main class="dados-pessoais">
      <?php
        // Conexão com o banco de dados
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "clinicaestetica";

        $conexao = new mysqli($host, $usuario, $senha, $banco);

        if ($conexao->connect_error) {
          die("Erro de conexão: " . $conexao->connect_error);
        }

        // Consulta SQL para buscar os dados do cliente
        $sql = "SELECT * FROM cliente WHERE id = 1"; // Alterar ID conforme necessário
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
          $cliente = $resultado->fetch_assoc();
        } else {
          die("Nenhum cliente encontrado.");
        }
      ?>
      <aside class="sidebar">
        <div class="profile">
          <img src="../images/alice.jpg" alt="<?php echo $cliente['nome']; ?>" class="profile-img" />
          <h2>Olá, <?php echo $cliente['nome']; ?>!</h2>
        </div>
        <nav class="menu">
          <ul>
            <li>
              <a href="/clinicaestetica/loginCliente/dadosCliente.php">Dados pessoais</a>
            </li>
            <li>
              <a href="/clinicaestetica/loginCliente/visualizarEndereço.php">Endereço</a>
            </li>
            <li><a href="/clinicaestetica/loginCliente/autenticacao.php">Autenticação</a></li>
            <li><a href="/clinicaestetica/loginCliente/meusAgendamentos.php">Pedidos</a></li>
            <li><a href="/clinicaestetica/nologin/entrar.html">Sair</a></li>
          </ul>
        </nav>
      </aside>
      <section class="content">
        <h1>Dados pessoais</h1>
        <div class="details">
          <div class="info">
            <p><strong>Nome:</strong> <?php echo $cliente['nome']; ?></p>
            <p><strong>Sobrenome:</strong> <?php echo $cliente['sobrenome']; ?></p>
            <p><strong>E-mail:</strong> <?php echo $cliente['email']; ?></p>
            <p><strong>CPF:</strong> <?php echo $cliente['cpf']; ?></p>
            <p><strong>Data de nascimento:</strong> <?php echo $cliente['data_nascimento']; ?></p>
          </div>
          <div class="info">
            <p><strong>Gênero:</strong> <?php echo $cliente['genero']; ?></p>
            <p><strong>Telefone:</strong> <?php echo $cliente['telefone']; ?></p>
          </div>
          <div class="newsletter">
            <h2>Newsletter</h2>
            <label>
              <input type="checkbox" />
              Quero receber e-mails com promoções.
            </label>
          </div>
        </div>
        <a href="/clinicaestetica/loginCliente/editarDadosCliente.php" class="edit-button">Editar</a>
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
