<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica/estilos/styleEditarDadosCliente.css" />
    <title>Editar Dados Pessoais</title>
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
          <a href="/clinicaestetica/loginCliente/dadosCliente.php" aria-label="Entrar"
>            <img src="../images/entrar.png" alt="Ícone de entrar" />
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
            <li><a href="/clinicaestetica/loginCliente/dadosCliente.php">Dados pessoais</a></li>
            <li><a href="/clinicaestetica/loginCliente/visualizarEndereço.php">Endereço</a></li>
            <li><a href="/clinicaestetica/loginCliente/autenticacao.php">Autenticação</a></li>
            <li><a href="clinicaestetica/loginCliente/meusAgendamentos.php">Pedidos</a></li>
            <li><a href="/clinicaestetica/nologin/index.html">Sair</a></li>
          </ul>
        </nav>
      </aside>

      <section class="content">
        <h1>Editar Dados Pessoais</h1>
        <form method="POST" action="atualizarDadosCliente.php">
          <div class="details">
            <div class="info">
              <label for="nome"><strong>Nome:</strong></label>
              <input type="text" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" required />
            </div>
            <div class="info">
              <label for="sobrenome"><strong>Sobrenome:</strong></label>
              <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $cliente['sobrenome']; ?>" required />
            </div>
            <div class="info">
              <label for="email"><strong>E-mail:</strong></label>
              <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required />
            </div>
            <div class="info">
              <label for="cpf"><strong>CPF:</strong></label>
              <input type="text" id="cpf" name="cpf" value="<?php echo $cliente['cpf']; ?>" required />
            </div>
            <div class="info">
              <label for="data_nascimento"><strong>Data de Nascimento:</strong></label>
              <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $cliente['data_nascimento']; ?>" required />
            </div>
            <div class="info">
              <label for="genero"><strong>Gênero:</strong></label>
              <input type="text" id="genero" name="genero" value="<?php echo $cliente['genero']; ?>" required />
            </div>
            <div class="info">
              <label for="telefone"><strong>Telefone:</strong></label>
              <input type="text" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" required />
            </div>
          </div>
          
          <button type="submit" class="submit-button">Atualizar</button>
        </form>
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
