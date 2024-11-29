// Selecionar os inputs de rádio e os formulários
const pixRadio = document.getElementById("pix");
const cartaoRadio = document.getElementById("cartao");
const pixForm = document.getElementById("pix-form");
const cardForm = document.getElementById("card-form");
const confirmationMessage = document.getElementById("confirmation-message");
const paymentForm = document.getElementById("payment-form");
const confirmButton = document.getElementById("confirm-btn");
const pixConfirmButton = document.getElementById("pix-confirm-btn");

// Função para alternar entre os formulários
function togglePaymentForm() {
  if (pixRadio.checked) {
    pixForm.style.display = "block";
    cardForm.style.display = "none";
  } else if (cartaoRadio.checked) {
    pixForm.style.display = "none";
    cardForm.style.display = "block";
  }
}

// Adicionar eventos para os inputs de rádio
pixRadio.addEventListener("change", togglePaymentForm);
cartaoRadio.addEventListener("change", togglePaymentForm);

// Inicializar o estado dos formulários
togglePaymentForm();

// Manipular o envio do formulário de pagamento com cartão
paymentForm.addEventListener("submit", function (e) {
  e.preventDefault(); // Impedir o envio do formulário
  pixForm.style.display = "none";
  cardForm.style.display = "none";
  confirmationMessage.style.display = "block"; // Exibir a mensagem de confirmação
});

// Manipular o clique no botão de confirmação do PIX
pixConfirmButton.addEventListener("click", function () {
  pixForm.style.display = "none";
  confirmationMessage.style.display = "block"; // Exibir a mensagem de confirmação
});

// Redirecionar para o index.html ao clicar no botão de confirmação
confirmButton.addEventListener("click", function () {
  window.location.href = "clienteLogado.html";
});
