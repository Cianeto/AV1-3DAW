<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $perguntaAntiga = $_POST['pergunta_antiga'];
    $perguntaNova = $_POST['pergunta_nova'];

    $arquivo = 'perguntas.txt';

    $conteudo = file_get_contents($arquivo);

    $novoConteudo = str_replace($perguntaAntiga, $perguntaNova, $conteudo);

    file_put_contents($arquivo, $novoConteudo);

    echo "Pergunta alterada com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alterar Pergunta</title>
</head>
<body>
    <h1>Alterar Pergunta</h1>
    <form action="alterar.php" method="POST">
        <label for="pergunta_antiga">Digite a pergunta a ser alterada:</label><br>
        <input type="text" name="pergunta_antiga" id="pergunta_antiga"><br><br>
        <label for="pergunta_nova">Digite a nova versão da pergunta:</label><br>
        <input type="text" name="pergunta_nova" id="pergunta_nova"><br><br>
        <input type="submit" value="Alterar">
    </form>
</body>
</html>

