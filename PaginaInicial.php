<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial - Vacina+</title>
    <link rel="stylesheet" href="Css/PaginaInicial.css">
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
              <section class="welcome-section">
                  <h1>Bem-vindo ao Vacina+</h1>
                  <p>Seu sistema de acompanhamento de vacinas local.</p>
              </section>

              <section class="dashboard">
                  <div class="dashboard-card">
                  <h2>Usuários Cadastrados</h2>
                  <p class="number">1.250</p>
                  </div>
                  <div class="dashboard-card">
                  <h2>Vacinas Aplicadas</h2>
                  <p class="number">3.482</p>
                  </div>
                  <div class="dashboard-card">
                  <h2>Próximas Campanhas</h2>
                  <p class="number">2</p>
                  </div>
              </section>
            </main>    
                    
        </div>
    </div>

  

</body>
</html>