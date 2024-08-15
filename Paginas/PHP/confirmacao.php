<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    // Se o usuário não estiver logado, redirecionar para a página de login
    header("Location: pagina_inicial.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newsletter</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style_confirm.css">
    
</head>
<body>
    <div class="container">
        <div class="blur-circle"></div>
        <div class="content">
            <img src="../../img/icone.svg" alt="Ícone de OK" class="icone-ok">
            <h1>Obrigado por se inscrever na nossa newsletter!</h1>
            <p>Agora você faz parte da comunidade Mindtech e está a um passo de ficar atualizado com as últimas inovações e tendências em Internet das Coisas (IoT).</p>
            <img src="../../img/logo-mindtech.svg" alt="Logotipo Mindtech" class="logotipo">
        </div>
        <div class="content">
            <!-- Exibir informações do usuário -->
            <p>Bem-vindo, <?php echo $_SESSION['email']; ?>!</p>

            <!-- Botão para descadastrar -->
            <form action="descadastrar.php" method="post">
                <button type="submit" class="descadastrar-btn">Descadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>
