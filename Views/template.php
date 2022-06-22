<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/style.css">

    <title>PDO Introduction - <?= $title ?></title>
</head>
<body>
    <div class="container">
        <h1>PDO Gaulois</h1>

        <!-- NAVBAR -->
        <nav>
            <ul>
                <li><a href="index.php?action=listGaulois">Liste des personnages</a></li>
                <li><a href="index.php?action=listLieux">Liste des lieux</a></li>
                <li><a href="index.php?action=listSpecialites">Liste des spécialités</a></li>
                <li><a href="index.php?action=listPotions">Liste des potions</a></li>
                <li><a href="">Liste des batailles</a></li>
            </ul>
        </nav>

        <div class="content">
            <?= $content ?>
        </div>
    </div>
</body>
</html>