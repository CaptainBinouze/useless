

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=useless;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$quote = " ";
$author = " ";

$reponse = $bdd->query('SELECT * FROM quote');

while ($donnees = $reponse->fetch())
{
    $quote = $donnees["value"];
    $author = $donnees["author"];
}

$reponse->closeCursor();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Useless project</title>
        <meta name="author" content="name">
        <meta name="description" content="description here">
        <meta name="keywords" content="keywords,here">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    </head>
    <body>
        <div class="content">

            <div class="text">
                <div class="image">
                    <img src="assets/images/quote.png"/>
                </div>
                <p><?php echo $quote; ?></p>
                <p class="author"><?php echo $author; ?></p>
            </div>

            <div class="project">
                <p>useless project 2019</p>
            </div>
        </div>
    </body>
</html>