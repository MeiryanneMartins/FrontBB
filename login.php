<?php
session_start();
include('config.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">SENHA OU USUÁRIO INCORRETO!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            header('Location: Painel.html');
            echo '<p class="success">Você está logado!</p>';
        } else {
            echo '<p class="error">A combinação de nome de usuário e senha está errada!</p>';
        }
    }
}
?>
<head>
  <link rel="stylesheet" type="text/css" href="login.CSS">
</head>
<body>

    <form class="box" action="" method="post" name="signin-form">
        
        <h1>BEM BRASIL</h1>
        <input type="text" name="username" placeholder="NOME">
        <input type="password" name="password" placeholder="SENHA">
        <input type="submit" name="login" value= "ENTRAR">
    </form>

</body>

