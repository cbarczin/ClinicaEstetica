<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/clinicaestetica/estilos/styleAgendarConsulta2.css" />
    <title>Agendar Consulta</title>
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
      <section class="profile">
        <img src="../images/marcela.jpg" alt="MarcelaM" class="profile-img" />
        <h2>MarcelaM</h2>
        <p>Corte<br />Coloração<br />Maquiagem<br />Design de sobrancelhas</p>
      </section>

      <section class="content">
        <div class="calendar">
          <h2>AGENDA</h2>
          <div class="calendar-navigation">
            <button id="prev-month">Anterior</button>
            <span id="selected-month"></span>
            <span id="selected-year"></span>
            <button id="next-month">Próximo</button>
          </div>
          <div id="calendar-grid"></div>
          <h3>Selecione um Horário</h3>
          <div id="time-slot-container"></div>
        </div>
        <form id="payment-form" action="/clinicaestetica/loginCliente/agendar.php" method="POST">
          <input type="hidden" name="usuario_id" value="1" />
          <input type="hidden" name="data" id="dataSelecionada" />
          <input type="hidden" name="hora" id="horaSelecionada" />
          <input type="hidden" name="servico" value="Corte + Coloração + Unhas + Maquiagem" />
          <input type="hidden" name="valor" value="490.50" />
          <button id="confirm-btn" class="botaoConfirmar" type="button">Confirmar Pagamento</button>
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

    <script>
      const calendarGrid = document.getElementById("calendar-grid");
      const selectedMonthElement = document.getElementById("selected-month");
      const selectedYearElement = document.getElementById("selected-year");
      const timeSlotContainer = document.getElementById("time-slot-container");

      let currentDate = new Date();
      let currentYear = currentDate.getFullYear();
      let currentMonth = currentDate.getMonth();

      const months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
      const timeSlots = ["9h", "10h", "14h", "15h", "16h"];

      function generateCalendar(year, month) {
        calendarGrid.innerHTML = "";

        selectedMonthElement.textContent = months[month];
        selectedYearElement.textContent = year;

        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 1; i <= daysInMonth; i++) {
          const dayBtn = document.createElement("button");
          dayBtn.textContent = i;
          dayBtn.classList.add("calendar-day");
          dayBtn.addEventListener("click", () => {
            document.querySelectorAll(".calendar-day").forEach((btn) => btn.classList.remove("active"));
            dayBtn.classList.add("active");

            const selectedDate = new Date(year, month, i).toISOString().split("T")[0];
            document.getElementById("dataSelecionada").value = selectedDate;
          });
          calendarGrid.appendChild(dayBtn);
        }
      }

      function generateTimeSlots() {
        timeSlotContainer.innerHTML = "";
        timeSlots.forEach((time) => {
          const timeBtn = document.createElement("button");
          timeBtn.textContent = time;
          timeBtn.classList.add("time-btn");
          timeBtn.addEventListener("click", () => {
            document.querySelectorAll(".time-btn").forEach((btn) => btn.classList.remove("active"));
            timeBtn.classList.add("active");

            document.getElementById("horaSelecionada").value = time;
          });
          timeSlotContainer.appendChild(timeBtn);
        });
      }

      document.getElementById("prev-month").addEventListener("click", () => {
        currentMonth--;
        if (currentMonth < 0) {
          currentMonth = 11;
          currentYear--;
        }
        generateCalendar(currentYear, currentMonth);
      });

      document.getElementById("next-month").addEventListener("click", () => {
        currentMonth++;
        if (currentMonth > 11) {
          currentMonth = 0;
          currentYear++;
        }
        generateCalendar(currentYear, currentMonth);
      });

      document.getElementById("confirm-btn").addEventListener("click", () => {
        const selectedDay = document.getElementById("dataSelecionada").value;
        const selectedTime = document.getElementById("horaSelecionada").value;

        if (selectedDay && selectedTime) {
          alert(`Horário confirmado: Dia ${selectedDay} às ${selectedTime}`);
          document.getElementById("payment-form").submit();
        } else {
          alert("Por favor, selecione uma data e um horário.");
        }
      });

      generateCalendar(currentYear, currentMonth);
      generateTimeSlots();
    </script>
  </body>
</html>
