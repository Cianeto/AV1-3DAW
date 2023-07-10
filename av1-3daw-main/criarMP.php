<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$pergunta = $_POST['pergunta'];
$respostas = array($_POST['resposta1'], $_POST['resposta2'], $_POST['resposta3'], $_POST['resposta4']);
$respostaCorreta = $_POST['resposta_correta'];

$linhaPergunta = $pergunta . "|" . implode("|", $respostas) . "|" . $respostaCorreta . PHP_EOL;
$arquivo = fopen('perguntas.txt', 'a');
 
if ($arquivo) {

       
fwrite($arquivo, $linhaPergunta);
        
       
fclose($arquivo);
        
       
echo "Pergunta salva com sucesso!";
    } 
   
else {
        
       
echo "Erro ao salvar a pergunta.";
    }
}

   
?>

<!DOCTYPE html>
<html>
<head>

   
<title>Criar Pergunta de Múltipla Escolha</title>

</head

</
</head>
<body>
    
   
<h1>Criar Pergunta de Múltipla Escolha</h1>
<form method="POST" action="criarMP.php">
<label for="pergunta">Pergunta:</label>
     
<input type="text" id="pergunta" name="pergunta" required><br><br>
<label for="resposta1">Resposta 1:</label>   
<input type="text" id="resposta1" name="resposta1" required><br>
<label for="resposta2">Resposta 2:</label>   
<input type="text" id="resposta2" name="resposta2" required><br>
<label for="resposta3">Resposta 3:</label>
<input type="text" id="resposta3" name="resposta3" required><br>
<label for="resposta4">Resposta 4:</label>
<input type="text" id="resposta4" name="resposta4" required><br><br>
<label for="resposta_correta">Resposta Correta (Digite o número da resposta correta):</label>     
<input type="number" id="resposta_correta" name="resposta_correta" required min="1" max="4"><br><br>
<input type="submit" value="Salvar">