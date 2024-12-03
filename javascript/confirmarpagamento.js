const pixRadio = document.getElementById("pix");
const cartaoRadio = document.getElementById("cartao");
const pixForm = document.getElementById("pix-form");
const cardForm = document.getElementById("card-form");
const confirmationMessage = document.getElementById("confirmation-message");
const paymentForm = document.getElementById("payment-form");
const confirmButton = document.getElementById("confirm-btn");
const pixConfirmButton = document.getElementById("pix-confirm-btn");

function togglePaymentForm() {
  if (pixRadio.checked) {
    pixForm.style.display = "block";
    cardForm.style.display = "none";
  } else if (cartaoRadio.checked) {
    pixForm.style.display = "none";
    cardForm.style.display = "block";
  }
}

pixRadio.addEventListener("change", togglePaymentForm);
cartaoRadio.addEventListener("change", togglePaymentForm);

togglePaymentForm();

paymentForm.addEventListener("submit", function (e) {
  e.preventDefault();
  pixForm.style.display = "none";
  cardForm.style.display = "none";
  confirmationMessage.style.display = "block";
});

pixConfirmButton.addEventListener("click", function () {
  pixForm.style.display = "none";
  confirmationMessage.style.display = "block"; 
});

confirmButton.addEventListener("click", function () {
  window.location.href = "clienteLogado.html";
});
