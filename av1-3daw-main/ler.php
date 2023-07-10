<!DOCTYPE html>
<html>
<head>
    <title>Ler Perguntas</title>
</head>
<body>
    <h1>Ler Perguntas</h1>
    <ul>
        <?php
        $perguntas = file('perguntas.txt', FILE_IGNORE_NEW_LINES);

        foreach ($perguntas as $pergunta) {
            echo "<li>" . htmlspecialchars($pergunta) . "</li>";
        }
        ?>
    </ul>
</body>
</html>