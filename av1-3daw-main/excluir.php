<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pergunta = $_POST['pergunta'];
    $arquivo = 'perguntas.txt';
    $conteudo = file_get_contents($arquivo);
    $novoConteudo = str_replace($pergunta, '', $conteudo);
    file_put_contents($arquivo, $novoConteudo);

    echo "Pergunta excluída com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir pergunta</title>
</head>
<body>
    <h1>Excluir Pergunta</h1>
    <form action="excluir.php" method="POST">
        <label for="pergunta">Digite a pergunta a ser excluída:</label><br>
        <input type="text" name="pergunta" id="pergunta"><br><br>
        <input type="submit" value="Excluir">
    </form>
</body>
</html>