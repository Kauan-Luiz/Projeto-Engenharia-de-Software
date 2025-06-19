document.getElementById("suporteForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const tipo = document.getElementById("tipo").value;
  const descricao = document.getElementById("descricao").value.trim();
  const email = document.getElementById("email").value.trim();
  const mensagem = document.getElementById("mensagem");

  if (!tipo || !descricao || !email) {
    mensagem.textContent = "Por favor, preencha todos os campos.";
    mensagem.className = "mensagem erro";
    mensagem.style.display = "block";
    return;
  }

  // Simula envio (aqui você poderia integrar com uma API real)
  setTimeout(() => {
    mensagem.textContent = "Solicitação enviada com sucesso!";
    mensagem.className = "mensagem sucesso";
    mensagem.style.display = "block";

    // Resetar o formulário
    document.getElementById("suporteForm").reset();
  }, 500);
});
