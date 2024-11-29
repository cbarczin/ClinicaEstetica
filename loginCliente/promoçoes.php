<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica/estilos/stylePromocoes.css" />
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
          <li><a href="/clinicaestetica/loginCliente/promoçoes.php">AGENDAR</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section class="services-header">
     
        <h2>PROMOÇÕES</h2>
        <p>
          Colocamos carinho e atenção em cada detalhe para oferecer não só o
          melhor atendimento para as nossas clientes, como uma experiência
          única, com uma crescente preocupação em cuidar também da natureza.
        </p>
      </section>
      <section class="services-list">
        <div class="service-item">
          <img src="../images/corte.jpg" alt="Pacote 1" />
          <p class="service-title">PACOTE 1</p>
          <p class="service-description">Inclui corte e hidratação capilar.</p>
        </div>
        <div class="service-item">
          <img src="../images/pintar.jpg" alt="Pacote 2" />
          <p class="service-title">PACOTE 2</p>
          <p class="service-description">
            Coloração e tratamento para cabelos.
          </p>
        </div>
        <div class="service-item">
          <img src="../images/escova.jpg" alt="Pacote 3" />
          <p class="service-title">PACOTE 3</p>
          <p class="service-description">
            Escova modeladora com brilho intenso.
          </p>
        </div>
        <div class="service-item">
          <img src="../images/unhas.jpg" alt="Pacote 4" />
          <p class="service-title">PACOTE 4</p>
          <p class="service-description">
            Tratamento capilar para cabelos crespos.
          </p>
        </div>
        <div class="service-item">
  <a href="/clinicaestetica/loginCliente/agendarConsulta.php" >
    <img src="../images/maquiagem.jpg" alt="Pacote 5" />
    <p class="service-title">PACOTE 5</p>
    <p class="service-description">
      Combo completo.
    </p>
  </a>
</div>
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
