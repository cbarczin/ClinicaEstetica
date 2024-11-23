document.querySelectorAll(".servico-header").forEach((header) => {
  header.addEventListener("click", () => {
    const target = document.querySelector(header.dataset.target);
    const parent = header.parentElement;

    if (parent.classList.contains("open")) {
      parent.classList.remove("open");
      header.querySelector(".toggle-icon").textContent = "+";
    } else {
      document
        .querySelectorAll(".servico.open")
        .forEach((openItem) => openItem.classList.remove("open"));
      parent.classList.add("open");
      header.querySelector(".toggle-icon").textContent = "x";
    }
  });
});
