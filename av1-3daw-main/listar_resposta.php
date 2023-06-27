<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o tipo de pergunta foi selecionado
    if (isset($_POST["tipo_pergunta"])) {
        $tipoPergunta = $_POST["tipo_pergunta"];

        if ($tipoPergunta == "mc") {
            // Listar perguntas de múltipla escolha
            listarPerguntasMultiplaEscolha();
        } elseif ($tipoPergunta == "texto") {
            // Listar perguntas com resposta em texto
            listarPerguntasTexto();
        } else {
            echo "Tipo de pergunta inválido.";
        }
    } else {
        echo "Nenhum tipo de pergunta selecionado.";
    }
}

function listarPerguntasMultiplaEscolha() {
    // Ler o conteúdo do arquivo "respostas.txt"
    $conteudo = file_get_contents("respostas.txt");
    // Dividir o conteúdo em cada pergunta/resposta
    $perguntas = explode("Pergunta: ", $conteudo);
    // Remover o primeiro elemento vazio do array
    array_shift($perguntas);

    echo "<h2>Perguntas de Múltipla Escolha</h2>";
    if (count($perguntas) > 0) {
        echo "<form action='listar_respostas.php' method='post'>";
        echo "<label for='pergunta_selecionada'>Selecione a pergunta:</label>";
        echo "<select name='pergunta_selecionada'>";
        foreach ($perguntas as $index => $pergunta) {
            $perguntaInfo = explode(";", $pergunta);
            $perguntaTexto = trim($perguntaInfo[0]);
            echo "<option value='$index'>$perguntaTexto</option>";
        }
        echo "</select>";
        echo "<br><br>";
        echo "<input type='submit' value='Listar Respostas'>";
        echo "</form>";
    } else {
        echo "Não há perguntas de múltipla escolha disponíveis.";
    }
}

function listarPerguntasTexto() {
    // Ler o conteúdo do arquivo "respostas_texto.txt"
    $conteudo = file_get_contents("respostas_texto.txt");
    // Dividir o conteúdo em cada pergunta/resposta
    $perguntas = explode("Pergunta: ", $conteudo);
    // Remover o primeiro elemento vazio do array
    array_shift($perguntas);

    echo "<h2>Perguntas com Resposta em Texto</h2>";
    if (count($perguntas) > 0) {
        echo "<form action='listar_respostas.php' method='post'>";
        echo "<label for='pergunta_selecionada'>Selecione a pergunta:</label>";
        echo "<select name='pergunta_selecionada'>";
        foreach ($perguntas as $index => $pergunta) {
            $perguntaTexto = trim($pergunta);
            echo "<option value='$index'>$perguntaTexto</option>";
        }
        echo "</select>";
        echo "<br><br>";
        echo "<input type='submit' value='Listar Resposta'>";
        echo "</form>";
    } else {
        echo "Não há perguntas com resposta em texto disponíveis.";
    }
}
?>
