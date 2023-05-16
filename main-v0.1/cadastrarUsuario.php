<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeUsuario = $_POST['nomeUsuario'];

    // Lê o conteúdo do arquivo JSON existente
    $arquivo = 'usuarios.json';
    $usuariosExistente = [];
    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $usuariosExistente = json_decode($conteudo, true);
    }

    // Adiciona o novo nome de usuário ao array existente
    $usuariosExistente[] = $nomeUsuario;

    // Converte o array para formato JSON
    $json = json_encode($usuariosExistente, JSON_PRETTY_PRINT);

    // Salva o JSON no arquivo
    file_put_contents($arquivo, $json);

    echo "<p>Nome de usuário cadastrado com sucesso.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>

    <form method="POST">
        <label>Nome de Usuário:</label><br>
        <input type="text" name="nomeUsuario" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
	<button onclick="window.location.href = 'index.html';">Voltar</button>
</body>
</html>