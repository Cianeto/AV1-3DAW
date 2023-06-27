<!DOCTYPE html>
<html>
<head>
    <title>Criar Perguntas e Respostas de Texto</title>
</head>
<body>
  <h1>Criar Perguntas e Respostas de Texto</h1>

  <form action="salvar_texto.php" method="POST">

    <label for="pergunta">
      Pergunta: <input type="text" name="pergunta" id="pergunta" required>
    </label>
    
    <br><br>

    <label for="resposta_texto_correta">
     Resposta correta: <input type="text" name="resposta_texto_correta" id="resposta_texto_correta" required>
  </label> <br>

    <input type="submit" value="Enviar">
</body>
