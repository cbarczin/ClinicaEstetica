<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica../estilos/styleServicos.css" />
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
    <main class="servicos">
      <h1>SERVIÇOS</h1>
      <p>
        Colocamos carinho e atenção em cada detalhe para oferecer não só o
        melhor atendimento para as nossas clientes, como uma experiência única,
        com uma crescente preocupação em cuidar também da natureza.
      </p>
      <div class="servicos-list">
        <div class="servico">
          <button class="servico-header" data-target="#cabelos">
            Cabelos <span class="toggle-icon">+</span>
          </button>
          <div class="servico-content" id="cabelos">
            <p>
              Coloração | Balayage | Escovas modeladas | Terapias Capilares |
              Tratamentos capilares | Cortes | Penteados soltos e presos |
              Alisamento | Relaxamento | Alongamento dos fios | Extensões
            </p>
          </div>
        </div>
        <div class="servico">
          <button class="servico-header" data-target="#maquiagem">
            Maquiagem <span class="toggle-icon">+</span>
          </button>
          <div class="servico-content" id="maquiagem">
            <p>Maquiagem | Colocação de cílios</p>
          </div>
        </div>
        <div class="servico">
          <button class="servico-header" data-target="#cilios">
            Cílios e sobrancelhas <span class="toggle-icon">+</span>
          </button>
          <div class="servico-content" id="cilios">
            <p>
              Design de sobrancelhas | Tinta para sobrancelhas | Microblading |
              Micropigmentação | Tinta de cílios | Henna
            </p>
          </div>
        </div>
        <div class="servico">
          <button class="servico-header" data-target="#estetica">
            Estética <span class="toggle-icon">+</span>
          </button>
          <div class="servico-content" id="estetica">
            <p>
              Limpeza de pele | Peelings | Drenagem facial e corporal |
              Tratamento anti-idade | Massagens relaxantes | Banho de lua |
              Esfoliação corporal | Hidratação profunda | Microagulhamento
            </p>
          </div>
        </div>
        <div class="servico">
          <button class="servico-header" data-target="#depilacao">
            Depilação <span class="toggle-icon">+</span>
          </button>
          <div class="servico-content" id="depilacao">
            <p>
              Utilizamos as melhores ceras do mercado, incluindo cera
              australiana e egípcia, garantindo conforto e eficácia para você.
            </p>
          </div>
        </div>
        <div class="servico">
          <button class="servico-header" data-target="#pes-maos">
            Pés e Mãos <span class="toggle-icon">+</span>
          </button>
          <div class="servico-content" id="pes-maos">
            <p>
              Manicure | Pedicure | Esmaltação | Unhas artísticas | Esfoliação |
              Reflexologia | Podologia
            </p>
          </div>
        </div>
        <div class="servico">
          <button class="servico-header" data-target="#dia-noivos">
            Dia dos Noivos <span class="toggle-icon">+</span>
          </button>
          <div class="servico-content" id="dia-noivos">
            <p>
              Penteado | Maquiagem | Massagem relaxante | Reflexologia |
              Tratamentos estéticos e cuidados especiais para o grande dia.
            </p>
          </div>
        </div>
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
          <img
            src="../images/mapaclinica.jpg"
            alt="Mapa para chegar na clínica"
          />
          <span>Rua Barão de Jaguaripe, 3454 – Ipanema</span>
        </div>
      </div>
    </footer>
    <script src="/clinicaestetica/javascript/servicos.js"></script>
  </body>
</html>
