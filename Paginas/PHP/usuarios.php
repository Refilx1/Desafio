

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once('connection.php');
    $id = $_GET['id'];  
    
    $sql = "SELECT id FROM usuario WHERE id = $id";

    $result = $conn->query($sql);
    ?>
    <div>
        <a href="pagina_inicial.php"><h3>Voltar a Pagina inicial</h3></a><br>
    </div>
    <?php

    if($result && $result->num_rows>0){
        echo "<table>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><th>ID</th><td>".$row['id']."</td></tr>";
            echo "<tr><th>Email</th><td>".$row['email']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado";
    }

    $conn->close();
    
?>

</body>
</html>