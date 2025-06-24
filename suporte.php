<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial - Vacina+</title>
    <link rel="stylesheet" href="Css/suporte.css">
    <link rel="stylesheet" href="Css/Padrao.css">
</head>
<body>

    <?php
    include_once("header.php"); 
    ?>
    
    <div class="container">
      <?php  
      include_once("article.php");   
      ?>
  
      <div class="conteudo">
          
        <main>
             <div class="container-suporte">
              <h2>Módulo de Suporte</h2>

              <form id="suporteForm">
                <label for="tipo">Tipo de solicitação:</label>
                <select id="tipo" name="tipo" required>
                  <option value="">-- Selecione --</option>
                  <option value="suporte">Solicitar Suporte</option>
                  <option value="melhoria">Recomendar Melhoria</option>
                  <option value="outros">Outros</option>
                </select>

                <label for="descricao">Descrição detalhada:</label>
                <textarea id="descricao" name="descricao" rows="6" placeholder="Descreva sua solicitação..." required></textarea>

                <button type="submit">Enviar Solicitação</button>
              </form>

              <div id="mensagem" class="mensagem"></div>
            </div>
        </main>          
      </div>
    </div>

  
    <script src="JavaScript/suporte.js"></script>
</body>
</html>