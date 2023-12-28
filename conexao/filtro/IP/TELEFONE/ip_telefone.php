<style>
        #rolagemCX {
            max-height: 290px;
            /* Defina a altura máxima desejada */
            overflow-y: scroll;
            /* Adicione uma barra de rolagem vertical quando necessário */
        }
    </style>

<div class="container-fluid">
    <!-- Filtro -->
    <div class="d-block position-static shadow gap-12 col-12 col-md-3" style=" float: left;">
        <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
            <div class="bg-body-tertiary border rounded-3">
                <h5 style="text-align: center;">Lojas</h5>
            </div>
            <?php include 'CONEXAO/FILTRO/LOJA/filtro_loja.php' ?>
        </div>
    </div>
    <!-- Fim Dos Filtro -->

    <!-- Lista de Chamado -->
    <div class="dropdown-menu d-block position-static shadow d-grid gap-12 col-12 col-md-9">
        <h5 style="text-align: center;">Lista de IP's do Caixa</h5>
        <div id="rolagemCX" class="table-responsive small">
            <?php
            // Verifique se um filtro de status foi especificado na URL
            $filtro_status = isset($_GET["status"]) ? $_GET["status"] : null;

            // Construa a consulta SQL com base no filtro de status
            $sql = "SELECT * FROM tb_relatorio WHERE equipR = 'Telefone'";

            if ($filtro_status) {
                $sql .= " WHERE status = '$filtro_status'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table table-striped table-sm table-bordered'>";
                echo "<thead>";
                echo "<tr>
                      <th>ID</th>
                      <th>IP's</th>
                      <th>N° Serie</th>
                      <th>N° MAC</th>
                      <th>Loja</th>
                      <th>Ramal</th>
                    </tr>";
                echo "</thead>";
                echo  "<tbody id='tabela-chamado'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["ipR"] . "</td>";
                    echo "<td>" . $row["nserieR"] . "</td>";
                    echo "<td>" . $row["nmacR"] . "</td>";
                    echo "<td>" . $row["lojaR"] . "</td>";
                    echo "<td>" . $row["ramalR"] . "</td>";
                    echo "<td><a class='btn btn-sm btn-outline-primary dropdown-toggle' href='CRUD/ALTERA/altera_formulario?id=" . $row["id"] . "'>Editar</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "Nenhum chamado cadastrado.";
            }

            // Feche a conexão com o banco de dados
            ?>
        </div>
    </div>
    <!-- Fim da Lista de Chamado -->
</div>