<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: pagina_inicial.php");
    exit();
}

include('connection.php'); 
$email = $_SESSION['email'];

$sql = "UPDATE usuario SET cadastrado = NULL WHERE email = '$email'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Você foi descadastrado da newsletter.');
        window.location.href = 'pagina_inicial.php'; // Redirecionar para a página inicial
    </script>";
} else {
    echo "<script>
        alert('Erro ao descadastrar: " . $conn->error . "');
        window.history.back(); // Volta para a página anterior
    </script>";
}

$conn->close();
?>
