<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica../estilos/styleEquipe.css" />
    <title>Clínica Estética</title>
  </head>
  <body>
    <header>
      <div id="top-bar">
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
    <main class="equipe">
      <h2>
        Valorizamos a beleza individual com tecnologias de ponta e atendimento
        personalizado. Nossa equipe de profissionais está pronta para oferecer a
        você uma experiência em harmonia com seu desejo. Pesquise o talento de
        cada profissional no seu Instagram.
      </h2>
      <div class="team">
        <div class="team-member">
          <img src="../images/marcela.jpg" alt="Marcela" />
          <h3>Marcela</h3>
          <p>@MarcelaM</p>
          <ul>
            <li>Corte</li>
            <li>Coloração</li>
            <li>Maquiagem</li>
            <li>Design de sobrancelhas</li>
          </ul>
        </div>
        <div class="team-member">
          <img src="../images/rogerio.jpg" alt="Rogério" />
          <h3>Rogério</h3>
          <p>@RogerR</p>
          <ul>
            <li>Mega Hair</li>
            <li>Corte</li>
            <li>Penteado</li>
          </ul>
        </div>
        <div class="team-member">
          <img src="../images/marcos.jpg" alt="Marcos" />
          <h3>Marcos</h3>
          <p>@MarcosM</p>
          <ul>
            <li>Cortes masculino</li>
            <li>Coloração</li>
            <li>Tratamentos</li>
            <li>Alisamentos</li>
          </ul>
        </div>
        <div class="team-member">
          <img src="../images/marcia.jpg" alt="Márcia" />
          <h3>Márcia</h3>
          <p>@MarciaP</p>
          <ul>
            <li>Limpeza de pele</li>
            <li>Microagulhamento</li>
            <li>Massagem</li>
            <li>Modeladora</li>
          </ul>
        </div>
        <div class="team-member">
          <img src="../images/alice.jpg" alt="Alice" />
          <h3>Alice</h3>
          <p>@Alicee</p>
          <ul>
            <li>Unhas de fibra</li>
            <li>Estética em geral</li>
            <li>Maquiagem</li>
          </ul>
        </div>
        <div class="team-member">
          <img src="../images/guilherme.jpg" alt="Guilherme" />
          <h3>Guilherme</h3>
          <p>@GuilhermeG</p>
          <ul>
            <li>Podologia</li>
          </ul>
        </div>
      </div>
    </main>

    <footer class="footer">
      <div class="footer-column">
        <div class="footer-logo">
          <img src="../images/logo.png" alt="Logo CariocaBeauty" />
          <span>CariocaBeauty</span>
        </div>
      </div>
      <div class="footer-column">
        <div class="contact-info">
          <p><i class="icon-phone"></i> (21) 1234-5678</p>
          <p><i class="icon-phone"></i> (21) 99999-9999</p>
          <p><i class="icon-email"></i> contato@cariocabeauty.com.br</p>
        </div>
      </div>
      <div class="footer-column">
        <div class="hours-location">
          <p><strong>HORÁRIO DE FUNCIONAMENTO:</strong></p>
          <p>Segunda-feira: 14h às 20h</p>
          <p>Terça a sábado: 9h às 21h</p>
        </div>
      </div>
      <div class="footer-column">
        <div class="map">
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
