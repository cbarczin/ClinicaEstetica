

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica../estilos/styleSobreNos.css" />
    <title>Clínica Estética</title>
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
      <main class="sobre-nos">
        <h1>Sobre nós</h1>
        <div class="content">
          <div class="text">
            <p>
              Em 2003, em uma rua do bairro carioca mais famoso do mundo, nasceu
              o CariocaBeauty. Em pouco tempo, com um mix de modernidade,
              tecnologia e conforto, ficou conhecido como “o oásis da beleza de
              Ipanema”.
            </p>
            <p>
              A fama cresceu e muitas marcas de projeção internacional se uniram
              em nosso espaço. Começamos a perceber que a nossa missão era
              “cuidar” da beleza no sentido mais amplo da palavra. E essa missão
              foi ficando tão forte que agora estamos “cuidando” também do nosso
              planeta, e assim, nos tornamos o único salão sustentável do Rio de
              Janeiro.
            </p>
          </div>
          <div class="image">
            <img
              src="../images/clinicaEstetica.jpg"
              alt="Imagem do salão CariocaBeauty"
            />
          </div>
          <div class="curiosidades">
            <h2>Curiosidades</h2>
            <ul>
              <li>
                Fazemos parte do “Beleza Verde”, que nos integra ao sistema
                upcycling onde reciclamos tudo: do cabelo ao vidro do esmalte;
              </li>
              <li>
                Fomos premiados duas vezes pela @revistacabelos como o melhor
                salão do Rio de Janeiro;
              </li>
              <li>
                Top 10 todos os anos na lista de indicações de beleza da
                @marielacirebr;
              </li>
              <li>
                Classificado pelo New York Times como impecável no segmento da
                beleza e até agraciado por @oprah em seu programa;
              </li>
              <li>
                Único salão do Brasil que recebeu a visita do presidente da
                Loreal – Jean Paul Agon;
              </li>
              <li>Primeiro salão pet friendly do Rio de Janeiro.</li>
            </ul>
          </div>
        </div>
        <div class="button-container">
          <a href="./equipe.php" class="button">CONHEÇA NOSSO TIME</a>
        </div>
      </main>
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
