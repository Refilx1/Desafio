<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inscrição</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="blur-circle"></div>
        <div class="formulario">
            <form action="cadastro_php.php" method="post">
                <h1>Inscreva-se agora!</h1>
                <p>Preencha o formulário abaixo para se inscrever e comece a receber nossas atualizações diretamente em sua caixa de entrada.</p>
                <ul>
                    <li>Guias e Tutoriais: Aprenda como implementar e otimizar soluções de IoT para sua empresa.</li>
                    <li>Notícias e Tendências: Fique por dentro das últimas novidades e avanços no mundo do IoT.</li>
                    <li>Ofertas e Promoções: Receba ofertas especiais e promoções exclusivas para assinantes da nossa newsletter.</li>
                </ul>
                <input id="email" name="email" type="email" placeholder="email@email.com" required>
                <button type="submit">Inscrever-se</button>
            </form>
        </div>
        <div class="imagem">
            <img src="../../img/Imagem.png" alt="Imagem IoT">
        </div>
    </div>
</body>
</html>
