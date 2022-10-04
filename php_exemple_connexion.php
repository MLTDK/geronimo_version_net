<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Version Net - Exercice de programmation</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div id="entete">
			<img src="img/entete_droite.jpg" width="139" height="96" alt="" id="en_tete_menu_droite" />
			<img src="img/entete_gauche.jpg" width="623" height="74" alt="Guide utilisateurs" />
		</div>

		<div class="sommaire">
		<?php
		$db = mysqli_connect( "localhost", "recrutement", "rec05zg" ); 
		mysqli_select_db($db, 'test_dev'); 

		$result_tdm = mysqli_query($db, "SELECT * FROM versionnet ORDER BY Structure");
		for ($i=0; $i<mysqli_num_rows($result_tdm); $i++) {
			$row = mysqli_fetch_array($result_tdm);
			$summ_level = count(explode('.', $row["Structure"])) < 3 ? 'sommaire_niveau' . count(explode('.', $row["Structure"])) : 'sommaire_niveau3_et_sup';
			
			echo("<span class='" . $summ_level . "'><a href='/php_page_display.php?id=" . $row["Id"] . "'>" . $row["Titre"] . "</a></span><br/>");
		}
		mysqli_close($db);
		?>
		</div>

		<div id="pied_de_page">
			<img src="img/pied_de_page.jpg" width="762" height="26" alt="Retour en haut de page" />
		</div>
	</body>
</html>
