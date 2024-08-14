<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<?php
    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        // Verifica se o email já está cadastrado
        $sql_check = "SELECT COUNT(*) as count FROM usuario WHERE email = '$email'";
        $result_check = $conn->query($sql_check);
        $count = $result_check->fetch_assoc()['count'];
        // Adicionei um sweet alert para melhorar a experiência do usuário
        if ($count > 0) {
            echo "<script>
                Swal.fire({
                    icon: 'erro',
                    title: 'erro',
                    text: 'Email já cadastrado!'
                }).then(function() {
                    window.history.back(); // Volta para a página anterior
                });
            </script>";
        } else {
            // Nessa parte ele está inserindo um novo cadastro de usuario caso o email não esteja cadastrado
            $sql = "INSERT INTO usuario (email) VALUES ('$email')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        window.location.href = 'confirmacao.php'; // Redireciona para a página de confirmação
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: 'Erro ao cadastrar: " . $conn->error . "'
                    }).then(function() {
                        window.history.back(); // Volta para a página anterior
                    });
                </script>";
            }
        }
    }
?>

</body>
</html>