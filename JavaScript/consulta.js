document.getElementById("search").addEventListener("keyup", function() {
  let termoBusca = this.value.toLowerCase();
  let linhas = document.querySelectorAll("#tabela tbody tr");

  linhas.forEach(linha => {
    let nome = linha.cells[0].textContent.toLowerCase();
    if (nome.indexOf(termoBusca) > -1) {
      linha.style.display = "";
    } else {
      linha.style.display = "none";
    }
  });
});