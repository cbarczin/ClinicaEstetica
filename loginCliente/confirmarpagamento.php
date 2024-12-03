<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica../estilos/styleConfirmarPagamento.css" />
    <title>Confirmação de Pagamento</title>
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
      <!-- Resumo do pedido -->
      <section class="payment-summary">
        <h2>Resumo do Pedido</h2>
        <p>1 corte + 1 unha + 1 Coloração + 1 Maquiagem</p>
        <a href="../loginCliente/agendarConsulta.php"><button class="back-to-cart">Voltar para o Carrinho</button></a>
        <p><strong>Subtotal:</strong> R$545,00</p>
        <p><strong>Descontos:</strong> R$54,50</p>
        <p><strong>Total:</strong> R$490,50</p>
      </section>

      <form action="confirmarpagamento.php" method="POST">
        <input type="hidden" name="usuario_id" value="1" />
        <input type="hidden" name="data" id="dataSelecionada" />
        <input type="hidden" name="hora" id="horaSelecionada" />
        <input type="hidden" name="servico" value="Corte + Coloração + Unhas + Maquiagem" />
        <input type="hidden" name="valor" value="490.50" />

        <section class="payment-method">
          <h2>Escolha a Forma de Pagamento</h2>
          <div class="payment-options">
            <label>
              <input type="radio" name="payment" value="pix" id="pix" checked />
              PIX
            </label>
          </div>

          <div id="pix-form" class="payment-form">
            <p>Use o QR Code abaixo para realizar o pagamento via PIX:</p>
            <img src="../images/qrCode.png" alt="QR Code para pagamento PIX" />
            <button id="pix-confirm-btn" class="confirm-payment-btn" type="submit">
              Confirmar Pagamento
            </button>
          </div>
        </section>
      </form>

      <div id="confirmation-message" style="display: none; text-align: center">
        <h2>Pagamento Confirmado!</h2>
        <p>Seu pagamento foi processado com sucesso. Obrigado!</p>
        <button id="confirm-btn">Ir para o Início</button>
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

    <script>
      document.getElementById('dataSelecionada').value = '2024-11-26';
      document.getElementById('horaSelecionada').value = '10h';
    </script>
  </body>
</html>
