<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Perguntas</title>
</head>
<body>
    <header>
        <h2>Selecione o tipo de pergunta:</h2>
    </header>

    <form action="listar_respostas.php" method="post">
    <input type="radio" id="opcao_mc" name="tipo_pergunta" value="mc">
    <label for="opcao_mc">Múltipla escolha</label>
    <br>
    <input type="radio" id="opcao_texto" name="tipo_pergunta" value="texto">
    <label for="opcao_texto">Pergunta com resposta em texto</label>
    <br><br>
    <input type="submit" name="submit" value="Listar Perguntas">
</form>

</body>
</html>
