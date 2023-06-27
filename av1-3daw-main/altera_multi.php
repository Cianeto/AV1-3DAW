<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Múltipla Escolha</title>
</head>
<body>
    <header>
        <h2>Alterar pergunta e resposta de múltipla escolha</h2>
    </header>

    <?php
    // Verifica se o arquivo existe
    if (file_exists("respostas.txt")) {
        // Lê o conteúdo do arquivo
        $conteudo = file_get_contents("respostas.txt");
        // Divide o conteúdo em cada pergunta/resposta
        $perguntas = explode("Pergunta: ", $conteudo);
        // Remove o primeiro elemento vazio do array
        array_shift($perguntas);

        // Exibe as perguntas para seleção
        echo "<form action='atualizar_multi.php' method='post'>";
        echo "<label for='pergunta_selecionada'>Selecione a pergunta:</label>";
        echo "<select name='pergunta_selecionada' id='idpergunta_selecionada'>";
        foreach ($perguntas as $index => $pergunta) {
            $perguntaInfo = explode(";", $pergunta);
            $perguntaTexto = trim($perguntaInfo[0]);
            echo "<option value='$index'>$perguntaTexto</option>";
        }
        echo "</select>";
        echo "<br><br>";

        // Botão para selecionar a pergunta e editar suas respostas
        echo "<input type='submit' value='Selecionar Pergunta'>";
        echo "</form>";
    } else {
        echo "<p>Não há perguntas cadastradas.</p>";
    }
    ?>

</body>
</html>
