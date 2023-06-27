<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o índice da pergunta selecionada
    $indicePerguntat = $_POST["pergunta_selecionadat"];

    // Verificar se o arquivo existe
    if (file_exists("respostas_texto.txt")) {
        // Lê o conteúdo do arquivo
        $conteudot = file_get_contents("respostas_texto.txt");
        // Divide o conteúdo em cada pergunta/resposta
        $perguntast = explode("Pergunta: ", $conteudot);
        // Remove o primeiro elemento vazio do array
        array_shift($perguntast);

        // Verificar se o índice da pergunta selecionada é válido
        if ($indicePerguntat >= 0 && $indicePerguntat < count($perguntast)) {
            // Obter a pergunta selecionada
            $perguntaSelecionadat = $perguntast[$indicePerguntat];

            // Exibir o formulário para editar a pergunta
            echo "<form action='salvar_alteracao_texto.php' method='post'>";
            echo "<input type='hidden' name='indice_perguntat' value='$indicePerguntat'>";
            echo "<label for='pergunta_texto'>Pergunta:</label>";
            echo "<input type='text' name='pergunta_texto' id='idpergunta_texto' value='" . trim(explode("Resposta correta: ", $perguntaSelecionadat)[0]) . "' required>";
            echo "<br><br>";

            // Obter a resposta correta existente
            $respostaCorretat = trim(explode("Resposta correta: ", $perguntaSelecionadat)[1]);

            // Exibir a resposta correta para edição
            echo "<label for='resposta_corretat'>Resposta correta:</label>";
            echo "<input type='text' name='resposta_corretat' id='idresposta_corretat' value='$respostaCorretat'>";
            echo "<br><br>";

            echo "<input type='submit' value='Salvar Alterações'>";
            echo "</form>";
        } else {
            echo "<p>Índice de pergunta inválido.</p>";
        }
    } else {
        echo "<p>O arquivo de respostas não existe.</p>";
    }
}
?>
