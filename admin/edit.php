<?php
/**
 * Created by PhpStorm.
 * User: Timothée BINET
 * Date: 23/02/2019
 * Time: 14:13
 */

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=useless;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
if(isset($_GET['delete'])){
    $bdd->query('DELETE FROM quote WHERE date = "2019-02-23"');
}

if(isset($_POST['quote'])){
    $bdd->query('INSERT INTO quote (value,date,author) VALUES ("'.$_POST['quote'].'",now(),"'.$_POST['author'].'")');
}

$reponse = $bdd->query('SELECT * FROM quote WHERE date = "2019-02-23"', PDO::FETCH_ASSOC);

$data = $reponse->fetch();

if($data == true){

    $isDone = true;
} else {

    $isDone = false;
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
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
</head>
<body>
<div class="content">
    <?php if(!$isDone){ ?>

    <form method="post" action="edit.php">

        <input required type="text" name="quote" placeholder="Y'a match !"/>

        <input required type="text" name="author" placeholder="Nicolas Cuve"/>
        <input type="submit"/>
    </form>

    <?php } else { ?>
        <form method="post" action="edit.php?delete">
            <label>C'est bon !</label>
            <input type="submit" value="DELETE QUOTE"/>
        </form>
    <?php }?>
</div>
</body>
</html>
