<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os valores enviados pelo formulário
    $pergunta = $_POST["pergunta_multi"];
    $respostaA = $_POST["resposta_a"];
    $respostaB = $_POST["resposta_b"];
    $respostaC = $_POST["resposta_c"];
    $respostaD = $_POST["resposta_d"];
    $respostaCorreta = $_POST["resposta_correta"];

    // Aqui você pode realizar as operações de salvamento dos dados, como inserção em um banco de dados ou gravação em um arquivo.

    // Exemplo de salvamento em arquivo
    $dados = "Pergunta: " . $pergunta . ";";
    $dados .= "a) " . $respostaA . ";";
    $dados .= "b) " . $respostaB . ";";
    $dados .= "c) " . $respostaC . ";";
    $dados .= "d) " . $respostaD . ";";
    $dados .= "Resposta correta: " . $respostaCorreta . ";";

    $arquivo = fopen("respostas.txt", "a"); // Abre o arquivo em modo de adição
    fwrite($arquivo, $dados); // Escreve os dados no arquivo
    fclose($arquivo); // Fecha o arquivo

    header("Location: index.html");
    exit;
}
?>
