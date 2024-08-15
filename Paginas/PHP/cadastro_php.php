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
    // Iniciar a sessão
    session_start();
    
    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        // Verifica se o email já está cadastrado
        $sql_check = "SELECT cadastrado FROM usuario WHERE email = '$email'";
        $result_check = $conn->query($sql_check);
        $row = $result_check->fetch_assoc();

        if ($row) {
            // Verifica se o cadastro está NULL
            if (is_null($row['cadastrado'])) {
                // Atualiza o cadastro para "sim"
                $sql_update = "UPDATE usuario SET cadastrado = 'sim' WHERE email = '$email'";
                if ($conn->query($sql_update) === TRUE) {
                    $_SESSION['email'] = $email; // Armazenar o email na sessão

                    // Redirecionar para a página de confirmação
                    echo "<script>
                            window.location.href = 'confirmacao.php';
                    </script>";
                } else {
                    // Mostrar erro de atualização
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: 'Erro ao atualizar o cadastro: " . $conn->error . "'
                        }).then(function() {
                            window.history.back(); // Volta para a página anterior
                        });
                    </script>";
                }
            } else {
                // Se o cadastro já existe e está ativo, redirecionar para a página de confirmação
                $_SESSION['email'] = $email; // Armazenar o email na sessão

                echo "<script>
                        window.location.href = 'confirmacao.php';
                </script>";
            }
        } else {
            // Inserir um novo cadastro de usuário
            $sql_insert = "INSERT INTO usuario (email, cadastrado) VALUES ('$email', 'sim')";
            if ($conn->query($sql_insert) === TRUE) {
                $_SESSION['email'] = $email; // Armazenar o email na sessão

                // Redirecionar para a página de confirmação
                echo "<script>
                        window.location.href = 'confirmacao.php';
                </script>";
            } else {
                // Mostrar erro de cadastro
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
