<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .error{
            color: red;
            position: absolute;
            margin-top: 5px;
        }
        input[type=text]{
            width: 80px;
        }
        input[type=submit]{
            border-radius: 40px;
            color: white;
            background-color: red;
            border: 2px black solid;
        }
        input[type=submit]:hover{
            transform: scale(1.1);
        }
    </style>
    <title>Calculatrice</title>
</head>
<body>
    <div class="container-fluid text-center">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Exercice 1 - PHP</h1>
                <h2>Partie Bonus</h2>
                <p class="lead">Compléter le fichier fourni pour que la calculatrice fonctionne.</p>
                <p class="lead"><span class="font-weight-bold">Bonus</span> : Ajouter un bouton de remise à zéro.</p>
                <a href="../index.php" class="btn btn-primary">Retour</a>
            </div>
        </div>
        <h1 class="mb-5">Une calculatrice en PHP</h1>
        <form action="index.php" method="post">
            <div>
                <input type="text" name="chiffre1" value="0"/>
                <span class="error">* <?= !empty($_POST) && (is_numeric($_POST['chiffre1']) == false) ? 'Premier chiffre invalide !' : '' ;?></span>
            </div>
            <div>
                <input type="text" name="chiffre2" value="0"/>
                <span class="error">* <?= !empty($_POST) && (is_numeric($_POST['chiffre2']) == false) ? 'Deuxième chiffre invalide !' : '' ;?></span>
            </div>
            <div class="my-3">
                <input type="submit" name="addition" value="+"/>
                <input type="submit" name="soustraction" value="-"/>
                <input type="submit" name="multiplication" value="*"/>
                <input type="submit" name="division" value="/"/>
            </div>
            <span><?= $error ?></span>
        </form>
        <?php
            $number1 = $_POST['chiffre1'];
            $number2 = $_POST['chiffre2'];
            $numberPattern = '/^[0-9]+$/';
            if (!preg_match($numberPattern, $number1) || !preg_match($numberPattern, $number2)) {
                $error = 'Veuillez entrer des nombres valides !';
            } else {
                if ($_POST['addition'] != ''){
                    $result = $number1 + $number2;
                }
                if ($_POST['soustraction'] != ''){
                    $result = $number1 - $number2;
                }
                if ($_POST['multiplication'] != ''){
                    $result = $number1 * $number2;
                }
                if ($_POST['division'] != ''){
                    $result = round($number1 / $number2, 2);
                }
            }
        ?>
        <p>Résultat : <?= $result ?></p>
    </div>
</body>
</html>
