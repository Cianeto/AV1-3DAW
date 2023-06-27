<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o índice da pergunta selecionada
    $indicePergunta = $_POST["indice_pergunta"];

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

            // Obter os valores enviados pelo formulário
            $pergunta = $_POST["pergunta_multi"];
            $respostaA = $_POST["resposta_a"];
            $respostaB = $_POST["resposta_b"];
            $respostaC = $_POST["resposta_c"];
            $respostaD = $_POST["resposta_d"];
            $respostaCorreta = $_POST["resposta_correta"];

            // Atualizar a pergunta e respostas no array
            $perguntaInfo = explode(";", $perguntaSelecionada);
            $perguntaInfo[0] = "Pergunta: " . $pergunta;
            $perguntaInfo[1] = "a) " . $respostaA;
            $perguntaInfo[2] = "b) " . $respostaB;
            $perguntaInfo[3] = "c) " . $respostaC;
            $perguntaInfo[4] = "d) " . $respostaD;
            $perguntaInfo[5] = "Resposta correta: " . $respostaCorreta;

            // Montar a pergunta atualizada
            $perguntaAtualizada = implode(";", $perguntaInfo);

            // Substituir a pergunta no array de perguntas
            $perguntas[$indicePergunta] = $perguntaAtualizada;

            // Montar o conteúdo atualizado para o arquivo
            $conteudoAtualizado = implode("Pergunta: ", $perguntas);

            // Salvar o conteúdo atualizado no arquivo
            file_put_contents("respostas.txt", $conteudoAtualizado);

            echo "<p>Alterações salvas com sucesso!</p>";

            header("Location: index.html");
            exit;
        } else {
            echo "<p>Índice de pergunta inválido.</p>";
        }
    } else {
        echo "<p>O arquivo de respostas não existe.</p>";
    }
}
?>
