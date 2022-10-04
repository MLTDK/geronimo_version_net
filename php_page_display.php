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

		<?php
		$db = mysqli_connect( "localhost", "recrutement", "rec05zg" ); 
		mysqli_select_db($db, 'test_dev'); 

		$result_tdm = mysqli_query($db, "SELECT * FROM versionnet WHERE Id='" . $_GET["id"] . "' ORDER BY Structure");
		$res = mysqli_fetch_array($result_tdm);
		?>
		<span class='texte_position'>
		<?php
		$pere = $res;
		$str = "";
		$i = 0;
		
		do
		{
			$result_pere = mysqli_query($db, "SELECT * FROM versionnet WHERE Id='" . $pere["Pere"] . "' ORDER BY Structure");
			$pere = mysqli_fetch_array($result_pere);
			
			if ($pere == null)
				break;
			
			$link = "<a href='/php_page_display.php?id=" . $pere["Id"] . "'>" . $pere["Titre"] . "</a>";
			
			$link .= " &gt; ";
			
			$str = $link . $str;
			
			$i += 1;
		} while ($pere["Pere"] != null);
		
		echo($str . $res["Titre"]); ?>
		</span>
		<?php
		echo("<div class='texte'><span class='texte_titre'>" . $res["Titre"] . "</span>");
		echo("<div class='texte_contenu'>" . $res["HTML"] . "</div></div>");
		mysqli_close($db);
		?>

		<div id="pied_de_page">
			<img src="img/pied_de_page.jpg" width="762" height="26" alt="Retour en haut de page" />
		</div>
	</body>
</html>
