<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se foi selecionada uma pergunta para exclusão
    if (isset($_POST["pergunta_selecionada"])) {
        $indicePergunta = $_POST["pergunta_selecionada"];

        // Ler o conteúdo do arquivo "respostas.txt"
        $conteudo = file_get_contents("respostas.txt");
        // Dividir o conteúdo em cada pergunta/resposta
        $perguntas = explode("Pergunta: ", $conteudo);
        // Remover o primeiro elemento vazio do array
        array_shift($perguntas);

        // Verificar se o índice da pergunta selecionada é válido
        if ($indicePergunta >= 0 && $indicePergunta < count($perguntas)) {
            // Excluir a pergunta selecionada
            unset($perguntas[$indicePergunta]);

            // Reconstruir o conteúdo atualizado
            $novoConteudo = implode("Pergunta: ", $perguntas);

            // Escrever o conteúdo atualizado de volta no arquivo "respostas.txt"
            file_put_contents("respostas.txt", $novoConteudo);

            echo "Pergunta excluída com sucesso!";
        } else {
            echo "Índice de pergunta inválido.";
        }
    } else {
        echo "Nenhuma pergunta selecionada.";
    }

    header("Location: index.html");
    exit();
}

// Ler o conteúdo do arquivo "respostas.txt"
$conteudo = file_get_contents("respostas.txt");
// Dividir o conteúdo em cada pergunta/resposta
$perguntas = explode("Pergunta: ", $conteudo);
// Remover o primeiro elemento vazio do array
array_shift($perguntas);

// Exibir as perguntas disponíveis para seleção
echo "<h2>Perguntas de Múltipla Escolha</h2>";
echo "<form action='' method='post'>";
echo "<label for='pergunta_selecionada'>Selecione a pergunta:</label>";
echo "<select name='pergunta_selecionada'>";
foreach ($perguntas as $index => $pergunta) {
    $perguntaInfo = explode(";", $pergunta);
    $perguntaTexto = trim($perguntaInfo[0]);
    echo "<option value='$index'>$perguntaTexto</option>";
}
echo "</select>";
echo "<br><br>";
echo "<input type='submit' value='Excluir'>";
echo "</form>";
?>
