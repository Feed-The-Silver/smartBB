<!DOCTYPE html>
<html>
	<header>
		<meta charset="utf8">
		<title>smartBB - Powerful Forum Software</title>
		<link rel="stylesheet" href="style.css">
	</header>
	<head>
		<?php include "header.php" ?> 
	</head>
	<body>
		<?php include "body.php" ?>
	</body>
	<footer>
		<?php include "footer.php" ?>
	</footer>


<?php
    $exists = file_exists('valeur_utilisateurs.txt'); //test de l'existence de la base de données
    if ($exists == true)
    {
        $fichierverif = fopen('valeur_utilisateurs.txt','r');
        $valeur = fgets($fichierverif);
        fclose($fichierverif);
            if($valeur != 'true ')
            {
               include "base-de-donnee-utilisateurs.php"; 
            }
    }
 else {
        $fichiercreate = fopen('valeur_utilisateurs.txt','a');
        fseek($fichiercreate,0);
        fputs($fichiercreate,'false');
        include "base-de-donnee-utilisateurs.php";  
    }
    
$dns = 'mysql:host=localhost;dbname=utilisateurs';
$user = 'root';
$pass = '';

$db = new PDO($dns, $user, $pass);


$sql = "CREATE TABLE IF NOT EXISTS user_registered (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(20) NOT NULL,
	first_name VARCHAR(20) NOT NULL,
	last_name VARCHAR(20) NOT NULL,
        password VARCHAR(20) NOT NULL
)";

$sq = $db->query($sql);

$sujets = "CREATE TABLE IF NOT EXISTS thread_created (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(100) NOT NULL,
        auteur VARCHAR(20) NOT NULL,
        contenu TEXT NOT NULL
)";

$sr = $db->query($sujets);
?>

</html>       