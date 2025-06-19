document.addEventListener("DOMContentLoaded", () => {
    const cadastro = document.getElementById("Cadastro");
    const dropdown = document.querySelector("#Cadastro .dropdown");

    cadastro.addEventListener("mouseenter", () => {
        dropdown.style.display = "flex";
    });

    cadastro.addEventListener("mouseleave", () => {
        dropdown.style.display = "none";
    });
});