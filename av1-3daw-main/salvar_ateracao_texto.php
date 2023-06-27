<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o índice da pergunta selecionada
    $indicePerguntat = $_POST["indice_perguntat"];

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

            // Obter os valores enviados pelo formulário
            $perguntat = $_POST["pergunta_texto"];
            
            $respostaCorretat = $_POST["resposta_corretat"];

            // Atualizar a pergunta e respostas no array
            $perguntaInfot = explode(";", $perguntaSelecionadat);
            $perguntaInfot[0] = "Pergunta: " . $perguntat;
            
            $perguntaInfot[1] = "Resposta correta: " . $respostaCorretat;

            // Montar a pergunta atualizada
            $perguntaAtualizadat = implode(";", $perguntaInfot);

            // Substituir a pergunta no array de perguntas
            $perguntast[$indicePerguntat] = $perguntaAtualizadat;

            // Montar o conteúdo atualizado para o arquivo
            $conteudoAtualizadot = implode("Pergunta: ", $perguntast);

            // Salvar o conteúdo atualizado no arquivo
            file_put_contents("respostas_texto.txt", $conteudoAtualizadot);

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
