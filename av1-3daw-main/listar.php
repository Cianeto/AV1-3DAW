<?php
function listarConteudo($arquivo) {
    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        $linhas = explode(";", $conteudo);
        
       // echo "Conteúdo do arquivo $arquivo: <br>";
        foreach ($linhas as $linha) {
            echo trim($linha) . "<br>";
        }
    } else {
        echo "O arquivo $arquivo não existe.";
    }
}

listarConteudo("respostas.txt");
echo "<br>";
listarConteudo("respostas_texto.txt");
?>
