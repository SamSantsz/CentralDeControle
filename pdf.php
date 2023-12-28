<?php
// Incluir a biblioteca DomPDF
require_once 'dompdf/autoload.inc.php';

// Incluir o arquivo de conexão com o banco de dados
include 'CONEXAO/bancodados.php';

// Verificar se foi passado um ID válido na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obter os dados específicos com base no ID
    $sql = "SELECT * FROM tb_manutencao WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Criar um novo objeto DomPDF
        $pdf = new Dompdf\Dompdf();

        // Conteúdo do PDF
    $html = '<html>

        <head>
        </head>
            
        <body>

            <div>

                <div style="text-align: center;">';

                    // Embedding the image from the local "IMG" folder
                    $imagePath = 'IMG/PDF/toppdf.jpg';
                    if (file_exists($imagePath)) {
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $html .= '<img src="data:image/png;base64,' . $imageData . '" alt="..." width="425px" height="auto">';
                    } else {
                        $html .= '<p>Image not found</p>';
                    }

                    $html .= '<div style="float: left;">';

                        // Embedding the image from the local "IMG" folder
                        $imagePath = 'IMG/PDF/lateralpdf.png';
                        if (file_exists($imagePath)) {
                            $imageData = base64_encode(file_get_contents($imagePath));
                            $html .= '<img src="data:image/png;base64,' . $imageData . '" alt="..." width="112px" height="auto">';
                        } else {
                            $html .= '<p>Image not found</p>';
                        }

                    $html .= '</div>';

                $html .= '</div>
                
                <h2 style="text-align: center;">LAUDO DE IDENTIFICAÇÃO</h2>
                <p><strong>ID do Laudo : </strong> ' . $row['id'] . '</p>
                <p><strong>Descrição : </strong> ' . $row['descricaoM'] . '</p>
                <p><strong>N° Série : </strong> ' . $row['nserieM'] . '</p>
                <p><strong>Fornecedor : </strong> ' . $row['fornecedor'] . '</p>
                <p><strong>Status : </strong> ' . $row['statusM'] . '</p>
                <p><strong>Motivo : </strong> ' . $row['motivoM'] . '</p>
                <p><strong>Técnico : </strong> ' . $row['tecnicoM'] . '</p>
                <!-- Adicione aqui outros campos que deseja no PDF -->
        
                <br>
        
                <p>Favor enviar orçamento para <strong><u>junior@supermoranguinho.com.br</u></strong> e para
                    <strong><u>suporte@supermoranguinho.com.br</u></strong> não nos responsabilizamos por orçamentos enviados
                    para outros e-mails.
                </p>
                <div>
                    <p>
                    <h2>Contato:</h2>
                    </p>
            
                    <p>
                    <h3>Suporte TI</h3>
                    </p>
            
                    <p>Telefone: (85) 3348.8450</p>
                    <p>Ramal: 8475</p>
            
                    <p>
                    <h3>Coordenador de Suporte</h3>
                    </p>
            
                    <p>Alex Fushi</p>
                    <p>Telefone: (85) 9 9821.0158 / 3348.8450</p>
                    <p>Ramal: 8476</p>
            
                    <div style="float: right;">
                        <p>Pacajus - CE</p>
                        <p>' . $row['dataM'] . '</p>
                    </div>
                </div>

                <br>

                <div style="text-align: right;">';

                    // Embedding the image from the local "IMG" folder
                    $imagePath = 'IMG/PDF/downpfd.png';
                    if (file_exists($imagePath)) {
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $html .= '<img src="data:image/png;base64,' . $imageData . '" alt="..." width="88%" height="auto">';
                    } else {
                        $html .= '<p>Image not found</p>';
                    }

                $html .= '</div>       
            </div>
        </body>

    </html>';

        // Carregar o HTML no DomPDF
        $pdf->loadHtml($html);

        // Definir o tamanho da página e a orientação (opcional)
        //$pdf->setOptions(['isPhpEnabled' => true]);
        $pdf->set_option('defaultFont', 'sans');

        $pdf->setPaper('A4', 'portrait');

        // Renderizar o PDF
        $pdf->render();

        // Enviar o PDF para o navegador
        $pdf->stream('Laudo_' . $row['id'] . '.pdf' , ['Attachment' => 0]);
    } else {
        echo 'Registro não encontrado.';
    }
} else {
    echo 'ID inválido.';
}
