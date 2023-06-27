<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o índice da pergunta selecionada
    $indicePergunta = $_POST["pergunta_selecionada"];

    // Verificar se o arquivo existe
    if (file_exists("respostas.txt")) {
        // Lê o conteúdo do arquivo
        $conteudo = file_get_contents("respostas.txt");
        // Divide o conteúdo em cada pergunta/resposta
        $perguntas = explode("Pergunta: ", $conteudo);
        // Remove o primeiro elemento vazio do array
        array_shift($perguntas);

        // Verificar se o índice da pergunta selecionada é válido
        if ($indicePergunta >= 0 && $indicePergunta < count($perguntas)) {
            // Obter a pergunta selecionada
            $perguntaSelecionada = $perguntas[$indicePergunta];

            // Exibir o formulário para editar a pergunta
            echo "<form action='salvar_alteracao_multi.php' method='post'>";
            echo "<input type='hidden' name='indice_pergunta' value='$indicePergunta'>";
            echo "<label for='pergunta_multi'>Pergunta:</label>";
            echo "<input type='text' name='pergunta_multi' id='idpergunta_multi' value='" . trim(explode(";", $perguntaSelecionada)[0]) . "' required>";
            echo "<br><br>";

            // Obter as respostas existentes
            $respostas = explode(";", $perguntaSelecionada);
            $respostaA = trim(substr($respostas[1], 3));
            $respostaB = trim(substr($respostas[2], 3));
            $respostaC = trim(substr($respostas[3], 3));
            $respostaD = trim(substr($respostas[4], 3));
            $respostaCorreta = trim(substr($respostas[5], 17));

            // Exibir as respostas para edição
            echo "<label for='resposta_a'>a.</label>";
            echo "<input type='text' name='resposta_a' id='idresposta_a' value='$respostaA'>";
            echo "<br>";

            echo "<label for='resposta_b'>b.</label>";
            echo "<input type='text' name='resposta_b' id='idresposta_b' value='$respostaB'>";
            echo "<br>";

            echo "<label for='resposta_c'>c.</label>";
            echo "<input type='text' name='resposta_c' id='idresposta_c' value='$respostaC'>";
            echo "<br>";

            echo "<label for='resposta_d'>d.</label>";
            echo "<input type='text' name='resposta_d' id='idresposta_d' value='$respostaD'>";
            echo "<br>";

            echo "<label for='resposta_correta'>Resposta correta:</label>";
            echo "<input type='text' name='resposta_correta' id='idresposta_correta' value='$respostaCorreta'>";
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
