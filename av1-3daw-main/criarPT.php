<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pergunta = $_POST['pergunta'];
    $arquivo = 'perguntas.txt';
    $handle = fopen($arquivo, 'a');
    fwrite($handle, $pergunta . PHP_EOL);
    fclose($handle);

    echo "Pergunta criada com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar Pergunta</title>
</head>
<body>
    <h1>Criar Pergunta</h1>
    <form method="POST" action="criarPT.php">
        <label for="pergunta">Pergunta:</label>
        <input type="text" id="pergunta" name="pergunta" required>

        <input type="submit" value="Criar">
    </form>
</body>
</html>
