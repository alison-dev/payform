<html lang="pt-br">
<head>
    <title>Paytour | Currículo</title>
    <meta charset="utf-8">
    <link  rel="stylesheet" type="text/css"  media="all" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
    <meta name="viewport" content="width=device-width,minimum-scale=1">

</head>
  <!-- Header -->
  
<body>
    <header>
      <div class="go-menu">
        <a href="<?= url("/"); ?>" class="link-logo"><h2>PAYTOUR</h2></a>
      </div>  
    </header>  
    <!-- Header -->
      <!-- Main Content -->
      <main class="content">       

        <h1 class="title new-item">Cadastre seu currículo</h1>

        <form enctype="multipart/form-data" action="<?= url("/cadastrar"); ?>" method="post" name="register">    

          <?= csrf_input(); ?> 

          <div class="input-field">
            <label for="nome" class="label">Nome:</label>
            <input type="text" class="input-text" name="name" /> 
          </div>
          <div class="input-field">
            <label for="email" class="label">E-mail:</label>
            <input type="email" class="input-text" name="email" /> 
          </div>
          <div class="input-field">
            <label for="telephone" class="label">Telefone:</label>
            <input type="tel" class="input-text" name="telephone" /> 
          </div>
          <div class="input-field">
            <label for="cargo_desejado" class="label">Cargo Desejado:</label>
            <textarea class="input-text" name="desired_job_title"></textarea>> 
          </div>
          <div class="input-field">
            <label for="escolaridade" class="label">Escolaridade:</label>
            <select class="input-text" name="categories">
                <option disabled="disabled" selected="selected">Selecione sua escolaridade</option>
                <option>Fundamental - Incompleto</option>
                <option>Fundamental - Completo</option>
                <option>Fundamental - Incompleto</option>
                <option>Médio - Incompleto</option>
                <option>Médio - Completo</option>
                <option>Superior - Incompleto</option>
                <option>Superior - Completo</option>
                <option>Pós-graduação (Lato senso) - Incompleto</option>
                <option>Pós-graduação (Lato senso) - Completo</option>
                <option>Pós-graduação (Stricto sensu, nível mestrado) - Incompleto</option>
                <option>Pós-graduação (Stricto sensu, nível mestrado) - Completo</option>
                <option>Pós-graduação (Stricto sensu, nível doutor) - Incompleto</option>
                <option>Pós-graduação (Stricto sensu, nível doutor) - Completo</option>
            </select>
          </div>             
          <div class="input-field">
            <label for="arquivo" class="label">Selecione o currículo:</label>
            <input data-image=".j_profile_image" class="input-text" type="file" name="curriculum"/>
          </div>
          <div class="input-field">
            <label for="observações" class="label">Observações:</label>
            <textarea class="input-text" name="comments"></textarea> 
          </div> 
          <div class="actions-form">
            <input class="btn-submit btn-action" type="submit" value="Cadastrar Currículo" />
          </div>

        </form>    
      </main>
      <!-- Main Content -->

      <!-- Footer -->
    <footer>
            <div class="footer-image">
              PAYTOUR
            </div>
            <div class="email-content">
              <span>alisonfco@hotmail.com</span>
            </div>
    </footer><!-- Footer --> 
</body>
</html>
