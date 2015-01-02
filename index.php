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
    $exists = file_exists('valeur_utilisateurs.txt');
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
?>

</html>