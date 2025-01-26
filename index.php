<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>
        <img src="php/images/telezap.png" alt="Ícone TeleZap" class="header-icon">
        TeleZap V1.0.0
      </header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Primeiro Nome</label>
            <input type="text" name="fname" placeholder="Inserir Nome" required>
          </div>
          <div class="field input">
            <label>Último Name</label>
            <input type="text" name="lname" placeholder="Inserir Sobrenome" required>
          </div>
        </div>
        <div class="field input">
          <label>Endereço Email</label>
          <input type="text" name="email" placeholder="Insira seu Email" required>
        </div>
        <div class="field input">
          <label>Senha</label>
          <input type="password" name="password" placeholder="Crie sua Senha" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Escolha sua imagem de perfil</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Entrar no TeleZap">
        </div>
      </form>
      <div class="link">Já possui login? <a href="login.php">Faça Login!</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>

</html>