// Elementos do DOM
const calendarGrid = document.getElementById("calendar-grid");
const selectedMonthElement = document.getElementById("selected-month");
const selectedYearElement = document.getElementById("selected-year");

// Data atual
let currentDate = new Date();
let currentYear = currentDate.getFullYear();
let currentMonth = currentDate.getMonth();

// Meses do ano
const months = [
  "Janeiro",
  "Fevereiro",
  "Março",
  "Abril",
  "Maio",
  "Junho",
  "Julho",
  "Agosto",
  "Setembro",
  "Outubro",
  "Novembro",
  "Dezembro",
];

// Função para gerar o calendário
function generateCalendar(year, month) {
  // Limpa o calendário atual
  calendarGrid.innerHTML = "";

  // Atualiza o mês e ano exibidos
  selectedMonthElement.textContent = months[month];
  selectedYearElement.textContent = year;

  // Determina o número de dias no mês
  const daysInMonth = new Date(year, month + 1, 0).getDate();

  // Gera os botões dos dias
  for (let i = 1; i <= daysInMonth; i++) {
    const dayBtn = document.createElement("button");
    dayBtn.textContent = i;
    dayBtn.classList.add("calendar-day");
    dayBtn.addEventListener("click", () => {
      document
        .querySelectorAll(".calendar-day")
        .forEach((btn) => btn.classList.remove("active"));
      dayBtn.classList.add("active");

      // Atualiza o campo oculto de data com o dia selecionado
      const selectedDate = new Date(year, month, i).toISOString().split("T")[0];
      document.getElementById("dataSelecionada").value = selectedDate;
    });
    calendarGrid.appendChild(dayBtn);
  }
}

// Botões de navegação
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

// Seleção de horários
const timeButtons = document.querySelectorAll(".time-btn");
timeButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    timeButtons.forEach((b) => b.classList.remove("active"));
    btn.classList.add("active");

    // Atualizar o campo oculto de horário com o formato correto (HH:MM:SS)
    const selectedTime = btn.textContent.trim();
    const formattedTime = selectedTime.replace("h", ":00:00");
    document.getElementById("horaSelecionada").value = formattedTime;
  });
});

// Botão de confirmar
document.getElementById("confirm-btn").addEventListener("click", () => {
  const selectedDay = document.getElementById("dataSelecionada").value;
  const selectedTime = document.getElementById("horaSelecionada").value;

  if (selectedDay && selectedTime) {
    alert(`Horário confirmado: Dia ${selectedDay} às ${selectedTime}`);
    // Enviar o formulário
    document.getElementById("payment-form").submit();
  } else {
    alert("Por favor, selecione um dia e um horário.");
  }
});

// Inicializar o calendário com o mês e ano atuais
generateCalendar(currentYear, currentMonth);
