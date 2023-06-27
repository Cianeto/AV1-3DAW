<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os valores enviados pelo formulário
    $perguntat = $_POST["pergunta_texto"];
    $respostaCorretat = $_POST["resposta_texto_correta"];

    // Montar os dados a serem salvos
    $dadost = "Pergunta: " . $perguntat . ";";
    $dadost .= "Resposta correta: " . $respostaCorretat . ";";

    // Abrir o arquivo em modo de adição
    $arquivot = fopen("respostas_texto.txt", "a");

    if ($arquivot) {
        // Escrever os dados no arquivo
        fwrite($arquivot, $dadost);

        // Fechar o arquivo
        fclose($arquivot);

        header("Location: index.html");
        exit;
    } else {
        echo "<p>Ocorreu um erro ao abrir o arquivo.</p>";
    }
}
?>
