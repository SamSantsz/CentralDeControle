<?php
    include '../conexao/bancodados.php';

    // Query SQL para contar os chamados por status
    $sql = "SELECT status, COUNT(*) AS total FROM tb_chamado GROUP BY status";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Status</th><th>Total</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["total"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum chamado encontrado.";
    }
    ?>