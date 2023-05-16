<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pergunta = $_POST['pergunta'];
    $opcoes = [
        $_POST['opcao1'],
        $_POST['opcao2'],
        $_POST['opcao3'],
        $_POST['opcao4']
    ];
    $respostaCorreta = $_POST['respostaCorreta'];

    // Lê o conteúdo do arquivo JSON existente
    $perguntasExistente = [];
    $arquivo = 'perguntas.json';
    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $perguntasExistente = json_decode($conteudo, true);
    }

    // Gera o ID para a nova pergunta
	if ($perguntasExistente != null) {
		$novoId = count($perguntasExistente) + 1;
	} else {
		$novoId = 1;
	}
    // Monta o array com os dados da pergunta
    $perguntaData = [
        'id' => $novoId,
        'pergunta' => $pergunta,
        'opcoes' => $opcoes,
        'respostaCorreta' => $respostaCorreta
    ];

    // Adiciona a nova pergunta ao array existente
    $perguntasExistente[] = $perguntaData;

    // Converte o array para formato JSON
    $json = json_encode($perguntasExistente, JSON_PRETTY_PRINT);

    // Salva o JSON no arquivo
    file_put_contents($arquivo, $json);

    echo "<p>Pergunta e respostas cadastradas com sucesso.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Criação de Perguntas de Múltipla Escolha</title>
</head>
<body>
    <h1>Criação de Perguntas de Múltipla Escolha</h1>

    <form method="POST">
        <label>Pergunta:</label><br>
        <input type="text" name="pergunta" required><br><br>

        <label>Opção 1:</label><br>
        <input type="text" name="opcao1" required><br><br>

        <label>Opção 2:</label><br>
        <input type="text" name="opcao2" required><br><br>

        <label>Opção 3:</label><br>
        <input type="text" name="opcao3" required><br><br>

        <label>Opção 4:</label><br>
        <input type="text" name="opcao4" required><br><br>

        <label>Resposta Correta:</label><br>
        <input type="text" name="respostaCorreta" required><br><br>

        <input type="submit" value="Cadastrar Pergunta">
    </form>
	<button onclick="window.location.href = 'index.html';">Voltar</button>
</body>
</html>
