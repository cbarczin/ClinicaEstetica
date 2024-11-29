// Gerar calendário dinamicamente
const calendarGrid = document.getElementById("calendar-grid");
for (let i = 1; i <= 30; i++) {
  const dayBtn = document.createElement("button");
  dayBtn.textContent = i;
  dayBtn.classList.add("calendar-day");
  dayBtn.addEventListener("click", () => {
    document
      .querySelectorAll(".calendar-day")
      .forEach((btn) => btn.classList.remove("active"));
    dayBtn.classList.add("active");
  });
  calendarGrid.appendChild(dayBtn);
}

// Selecionar horários
const timeButtons = document.querySelectorAll(".time-btn");
timeButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    timeButtons.forEach((b) => b.classList.remove("active"));
    btn.classList.add("active");
  });
});

// Botão de confirmar
document.getElementById("confirm-btn").addEventListener("click", () => {
  const selectedDay = document.querySelector(
    ".calendar-day.active"
  )?.textContent;
  const selectedTime = document.querySelector(".time-btn.active")?.textContent;
  if (selectedDay && selectedTime) {
    alert(`Horário confirmado: Dia ${selectedDay} às ${selectedTime}`);
  } else {
    alert("Por favor, selecione um dia e um horário.");
  }
});
