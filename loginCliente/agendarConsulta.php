<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica/estilos/styleAgendarConsulta.css" />
    <title>Autenticação</title>
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
      <!-- Perfil ao lado esquerdo -->
      <section class="profile">
        <img src="../images/marcela.jpg" alt="MarcelaM" class="profile-img" />
        <h2>MarcelaM</h2>
        <p>Corte<br />Coloração<br />Maquiagem<br />Design de sobrancelhas</p>
      </section>

      <!-- Conteúdo ao lado direito -->
      <section class="content">
        <div class="calendar">
          <h2>AGENDA</h2>
          <div class="calendar-grid" id="calendar-grid">
            <!-- Dias serão gerados dinamicamente -->
          </div>
          <div class="time-slots">
            <button class="time-btn">9h</button>
            <button class="time-btn">10h</button>
            <button class="time-btn">12h</button>
            <button class="time-btn">14h</button>
            <button class="time-btn">16h</button>
            <button class="time-btn">17h</button>
          </div>
        </div>
        <div class="services">
          <div class="service">
            <img src="../images/corte.jpg" alt="Corte" />
            <img src="../images/pintar.jpg" alt="Corte" />
            <img src="../images/unhas.jpg" alt="Corte" />
            <img src="../images/maquiagem.jpg" alt="Corte" />
          </div>
          <div>
            <p>Corte + Coloração + Unhas + Maquiagem</p>
            <p>R$545,00</p>
            <p>Desconto de 10%: <b>R$490,50</b></p>
          </div>
        </div>
        <form id="payment-form">
          <input type="hidden" name="usuario_id" value="1" />
          <input type="hidden" name="data" id="dataSelecionada" />
          <input type="hidden" name="hora" id="horaSelecionada" />
          <input type="hidden" name="servico" value="Corte + Coloração + Unhas + Maquiagem" />
          <input type="hidden" name="valor" value="490.50" />
          <button id="confirm-btn" type="button">Confirmar Pagamento</button>
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
    <form action="confirmarpagamento.php" method="POST">
    <input type="hidden" name="usuario_id" value="1"> <!-- ID do usuário logado -->
    <input type="hidden" name="data" id="dataSelecionada">
    <input type="hidden" name="hora" id="horaSelecionada">
    <input type="hidden" name="servico" value="Corte + Coloração + Unhas + Maquiagem">
    <input type="hidden" name="valor" value="490.50">
    
</form>

<script>
  // Atualiza o campo de hora ao clicar em um botão de horário
  document.querySelectorAll(".time-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
      document.getElementById("horaSelecionada").value = btn.textContent.trim();
    });
  });

  // Define a data selecionada dinamicamente
  document.getElementById("dataSelecionada").value = "2024-11-26";

  // Redireciona ao clicar em Confirmar Pagamento
  document.getElementById("confirm-btn").addEventListener("click", async () => {
    const usuarioId = document.querySelector('[name="usuario_id"]').value;
    const dataSelecionada = document.getElementById("dataSelecionada").value;
    const horaSelecionada = document.getElementById("horaSelecionada").value;
    const servico = document.querySelector('[name="servico"]').value;
    const valor = document.querySelector('[name="valor"]').value;

    if (dataSelecionada && horaSelecionada) {
      try {
        const response = await fetch('/clinicaestetica/loginCliente/agendar.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            usuario_id: usuarioId,
            data: dataSelecionada,
            hora: horaSelecionada,
            servico: servico,
            valor: valor,
          }),
        });

        if (response.ok) {
          window.location.href = "/clinicaestetica/loginCliente/meusAgendamentos.php";
        } else {
          alert("Erro ao confirmar o pagamento. Tente novamente.");
        }
      } catch (error) {
        alert("Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente.");
        console.error(error);
      }
    } else {
      alert("Por favor, selecione uma data e hora.");
    }
  });
</script>



</script>
     <script src="../javascript/agendarConsulta.js"></script>
  </body>
</html>
