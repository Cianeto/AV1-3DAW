<?php

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores do formulário
    $novaPergunta = $_POST['pergunta'] ?? '';
    $novasOpcoes = $_POST['opcoes'] ?? [];
    $novaRespostaCorreta = $_POST['respostaCorreta'] ?? '';

    // Lê o conteúdo do arquivo JSON
    $jsonString = file_get_contents('perguntas.json');

    // Decodifica o JSON em um array associativo
    $data = json_decode($jsonString, true);

    // Atualiza a primeira pergunta (caso exista)
    if (isset($data[0])) {
        // Atualiza a pergunta se o campo não estiver vazio
        if (!empty($novaPergunta)) {
            $data[0]['pergunta'] = $novaPergunta;
        }

        // Atualiza as opções se houver exatamente 4 opções no formulário
        if (count($novasOpcoes) === 4) {
            $data[0]['opcoes'] = $novasOpcoes;
        }

        // Atualiza a resposta correta se o campo não estiver vazio
        if (!empty($novaRespostaCorreta)) {
            $data[0]['respostaCorreta'] = $novaRespostaCorreta;
        }
    }

    // Codifica o array de volta para JSON
    $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

    // Escreve o novo conteúdo no arquivo JSON
    file_put_contents('perguntas.json', $newJsonString);

    echo 'Arquivo JSON atualizado com sucesso!';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Criação de Perguntas de Múltipla Escolha</title>
</head>
<body>
	<form method="POST" action="">
		<label>Pergunta:</label>
		<input type="text" name="pergunta" value=""><br><br>

		<label>Opções:</label><br>
		<input type="text" name="opcoes[]" value=""><br>
		<input type="text" name="opcoes[]" value=""><br>
		<input type="text" name="opcoes[]" value=""><br>
		<input type="text" name="opcoes[]" value=""><br><br>

		<label>Resposta Correta:</label>
		<input type="text" name="respostaCorreta" value=""><br><br>

		<input type="submit" value="Atualizar JSON">
	</form>
	<button onclick="window.location.href = 'index.html';">Voltar</button>
</body>
</html>