<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta com Resposta por Texto</title>
</head>
<body>
    <header>
        <h2>Alterar pergunta e resposta por texto</h2>
    </header>

    <?php
    // Verifica se o arquivo existe
    if (file_exists("respostas_texto.txt")) {
        // Lê o conteúdo do arquivo
        $conteudot = file_get_contents("respostas_texto.txt");
        // Divide o conteúdo em cada pergunta/resposta
        $perguntast = explode("Pergunta: ", $conteudot);
        // Remove o primeiro elemento vazio do array
        array_shift($perguntast);

        // Exibe as perguntas para seleção
        echo "<form action='atualizar_texto.php' method='post'>";
        echo "<label for='pergunta_selecionadat'>Selecione a pergunta:</label>";
        echo "<select name='pergunta_selecionadat' id='pergunta_selecionadat'>";
        foreach ($perguntast as $indext => $perguntat) {
            $perguntaInfot = explode("Resposta correta: ", $perguntat);
            $perguntaTextot = trim($perguntaInfot[0]);
            echo "<option value='$indext'>$perguntaTextot</option>";
        }
        echo "</select>";
        echo "<br><br>";

        // Botão para selecionar a pergunta e editar a resposta
        echo "<input type='submit' value='Selecionar Pergunta'>";
        echo "</form>";
    } else {
        echo "<p>Não há perguntas cadastradas.</p>";
    }
    ?>

</body>
</html>
