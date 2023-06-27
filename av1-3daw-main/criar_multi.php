<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando Múltipla Escolha</title>
</head>
<body>
    <header>
        <h2>Criar pergunta e resposta de múltipla escolha</h2>
    </header>

    <form action="salvar_multi.php" method="post">

    <label for="pergunta">Pergunta:</label>
    <input type="text" name="pergunta_multi" id="idpergunta_multi" required>

    <br><br>

    <label for="resposta_a">a.</label>
    <input type="text" name="resposta_a" id="idresposta_a">
    <br>

    <label for="resposta_b">b.</label>
    <input type="text" name="resposta_b" id="idresposta_b">
    <br>

    <label for="resposta_c">c.</label>
    <input type="text" name="resposta_c" id="idresposta_c">
    <br>

    <label for="resposta_d">d.</label>
    <input type="text" name="resposta_d" id="idresposta_d">
    <br>

    <label for="resposta_correta">Resposta correta: </label>
    <input type="text" name="resposta_correta" id="idresposta_correta">
    <br>

    <input type="submit" value="Enviar">
    
    </form>
</body>
  
</html>


