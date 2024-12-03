const calendarGrid = document.getElementById("calendar-grid");
const selectedMonthElement = document.getElementById("selected-month");
const selectedYearElement = document.getElementById("selected-year");

let currentDate = new Date();
let currentYear = currentDate.getFullYear();
let currentMonth = currentDate.getMonth();

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
      document
        .querySelectorAll(".calendar-day")
        .forEach((btn) => btn.classList.remove("active"));
      dayBtn.classList.add("active");

      const selectedDate = new Date(year, month, i).toISOString().split("T")[0];
      document.getElementById("dataSelecionada").value = selectedDate;
    });
    calendarGrid.appendChild(dayBtn);
  }
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

const timeButtons = document.querySelectorAll(".time-btn");
timeButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    timeButtons.forEach((b) => b.classList.remove("active"));
    btn.classList.add("active");

    const selectedTime = btn.textContent.trim();
    const formattedTime = selectedTime.replace("h", ":00:00");
    document.getElementById("horaSelecionada").value = formattedTime;
  });
});

document.getElementById("confirm-btn").addEventListener("click", () => {
  const selectedDay = document.getElementById("dataSelecionada").value;
  const selectedTime = document.getElementById("horaSelecionada").value;

  if (selectedDay && selectedTime) {
    alert(`Horário confirmado: Dia ${selectedDay} às ${selectedTime}`);
    document.getElementById("payment-form").submit();
  } else {
    alert("Por favor, selecione um dia e um horário.");
  }
});

generateCalendar(currentYear, currentMonth);
