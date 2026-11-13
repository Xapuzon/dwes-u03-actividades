<?php
require_once __DIR__ . '/Anime.inc.php';

$author = 'Xapuzon';

$naruto = new Anime('Naruto', 2002, 'Shonen');
$fruits = new Anime('Fruits Basket', 2001, 'Shojo');
$monster = new Anime('Monster', 1800, 'Thriller');

$naruto->addCharacter(new Character('Naruto Uzumaki', 12));
$naruto->addCharacter(new Character('Kurama', -5, 'zorro9colas'));
$naruto->addCharacter(new Character('Naruto Uzumaki'));
$fruits->addCharacter(new Character('Tohru Honda', 16));
$fruits->removeCharacter('Nadie');

$animes = [$naruto, $fruits, $monster];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Animes</title>
</head>
<body>
    <h1>Mis animes</h1>
    <?php foreach ($animes as $anime): ?>
        <h2><?= htmlspecialchars((string) $anime) ?></h2>
        <p>Personajes: <?= $anime->countCharacters() ?></p>
        <ul>
            <?php foreach ($anime->characters as $character): ?>
                <li><?= htmlspecialchars((string) $character) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
    <footer><hr>Hecho por <?= htmlspecialchars($author) ?></footer>
</body>
</html>
