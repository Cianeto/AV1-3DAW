<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["opcao"])) {
        $opcao = $_POST["opcao"];

        if ($opcao === "opcao_mult_escolha") {
            // Redirecionar para a página de exclusão das perguntas de múltipla escolha
            header("Location: exclusao_mult_escolha.php");
            exit();
        } elseif ($opcao === "opcao_texto") {
            // Redirecionar para a página de exclusão das perguntas de texto
            header("Location: exclusao_texto.php");
            exit();
        }
    } else {
        echo "Nenhuma opção selecionada.";
    }
}
?>

<h2>Escolha a opção:</h2>
<form action="" method="post">
    <input type="radio" id="opcao_mult_escolha" name="opcao" value="opcao_mult_escolha">
    <label for="opcao_mult_escolha">Perguntas de Múltipla Escolha</label>
    <br>
    <input type="radio" id="opcao_texto" name="opcao" value="opcao_texto">
    <label for="opcao_texto">Perguntas de Texto</label>
    <br><br>
    <input type="submit" value="Selecionar">
</form>
