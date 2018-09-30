<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="style.css" type="text/css" />
		<link rel="stylesheet" href="navStyle.css" type="text/css" /> <!-- css du menu -->
		<link rel="stylesheet" media="all and (max-width:600px)" href="NavSmall.css" type="text/css" /> <!-- Quand il y a un petit ecran, le menu -->
		<link rel="stylesheet" media="all and (max-width:600px)" href="styleSmall.css" type="text/css" /> <!-- Quand il y a un petit ecran, le contenu -->
        <meta charset="utf-8" />
        <title>Carnet de bord - 2017</title>
    </head>
    <body>
		<input type="checkbox" id="hamburger"/> <!-- Faire le menu au clic -->
		<label id="gridNav" for="hamburger"></label> <!-- utilisé pour cocher la checkbox -->
		<nav>
			<div id="dansNav">
				<a href="index.html">Accueil</a>
				<a href="cas_d_utilisation.php">Cas d'utilisation</a>
				<a href="modelisation_du_domaine.php">Modélisation du domaine</a>
				<a href="diagramme_de_sequence.php">Diagramme de séquence</a>
				<a href="modelisation_et_codage.php">Modélisation et codage</a>
				<a href="code_avance.php">Code avancé</a>
				<a href="vocabulaire.html">Vocabulaire</a>
			</div>
		</nav>
		
		<div id="page">
			<div id="inTdBandeau" class="inTdBandeauMod">
				<h1 class="h1White">Modélisation du domaine</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div id="inTdBandTime">
				<div><img src="img/tds/tdsTime.png" alt="time" />3 Heures</div>
				<div><img src="img/tds/tdsSoft.png" alt="logiciel" />Modélio</div>
			</div>
			
			<div class="inTdTitle"><h2>Interêt</h2></div>
			<div class="inTdBloc">
					<p>Les diagrammes de classes sont réalisé grâce à la détermination des concepts. On effectue une simple analyse grammaticale de la description textuelle des cas d’utilisation.<br /> 
					En général, les noms représentent des concepts ou des attributs alors que les verbes représentent des comportements (opérations, méthodes).</p>
			</div>
			
			<div class="inTdTitle"><h2>Mise en pratique</h2></div>
			<div class="inTdBloc">
				<h3>Je comprends</h3><div class="enonce">
				<p>Les questions nous permettant de découvrir les diagrammes de classes étaient les suivantes :<br /> 

				<strong>1 -</strong> Visualiser sous la forme d'une liste toutes les voitures d'un parc.<br />
				<strong>2 -</strong> Déterminer la consommation moyenne du parc.<br />
				<strong>3 -</strong> Déterminer la vitesse moyenne des voitures à l'instant courant.<br />
				<strong>4 -</strong> Déterminer la puissance moyenne des voitures du parc (l'information de puissance est associée au modèle de voiture).<br />
				<strong>5 -</strong> Lister toutes les voitures d'un modèle donné dans plusieurs parcs.<br />
				<strong>6 -</strong> Connaitre toutes les voitures d'une marque donnée.<br />
				<strong>7 -</strong> La consommation d'une voiture peut s'exprimer en km/litre, en Miles/Gallon, kwh/km, … en fonction de la voiture.<br />
				<strong>8 -</strong> Un parc de voitures est créé sans voiture, on les ajoute après.<br />
				<strong>9 -</strong> Une fonction associée à un modèle de voiture nous permet de déterminer la consommation courante d'une voiture d'un modèle donné. Calculer la consommation courante des voitures du parc.<br /><br />
				</p></div>
				
				<p><span>Réponses :</span><br /> 
				<strong>1 -</strong> Afin de pouvoir visualiser sous forme d’une liste les voitures d’un parc, il fallait créer la classe "voiture".<br /> 
				<span>Classe : </span>structure composée de plusieurs attributs et méthode permettant de créer un objet.<br /><br /> 
				<strong>2 -</strong> Afin de déterminer la consommation moyenne du parc, il fallait créer une méthode "consoMoyenne" dans la classe "parc de voiture".<br />
				<span>Méthode : </span>fonction qui permet d'intéragir avec des objets. <br /><br /> 
				<strong>3 -</strong> Afin de déterminer la vitesse moyenne des voitures à l'instant courant, il a fallu créer une méthode "vitesseMoyenne" dans la classe "voiture".<br />
				<strong>4 -</strong> Il a fallu crée une méthode "puissanceMoyenne" dans le parc.<br />
				<strong>5 -</strong> Il a fallu pour cela créer une classe "Modèle".<br />
				<strong>6 -</strong> Afin de connaitre toute les voiture d’une marque donnée, il a fallu crée une classe "Marque".<br />
				<strong>7 -</strong> Pour palier au problème des différentes unités, nous créons une classe "consommation Moyenne" afin d’y placer les attributs "valeur" et "unité".<br />
				<span>Attribut(s) : </span>variable(s) servant à définir un objet.<br /><br /> 
				<strong>8 -</strong> On indique via la cardinalité qu’un parc peut contenir 0 voiture.<br />
				<span>Cardinalité : </span>multiplicité permettant de définir le nombre d'objet en association. <br /><br /> 
				<strong>9 -</strong> Il faut pour cela ajouter une fonction "ConsoModele" dans la classe "Modèle", ainsi qu’un fonction "ConsoCourante" dans le parc.<br /><br />
				Il faut bien évidement ajouter les association entre les classes.<br />
				<span>Association : </span>relation, moyen de communication entre deux objets.<br /><br />
				Le digramme de classe est le suivant:<br />
				<img src="img/tds/diagModDo/Capture.png" alt="img"/><br /></p>
				<div class="aSavoir">
					A retenir : <br />
					<img src="img/tds/diagModDo/tabl.png" alt="img"/>
					
					<br />Attention, il faut toujours faire attention à l'encapsulation et à ajouter les accesseurs.
				</div><p>
				Le code correspondant est le suivant:<br />
				<span>Objet : </span>instance d'une classe.<br /><br />			
				<div class="code">
					package parc;<br />	<br />	

					public class Parc_Voiture {<br />	
					&emsp;	private Voiture[] voitures;<br />	<br />	
						
					&emsp;	public Parc_Voiture(){}<br />	
					}<br />	

					public class Voiture {<br />	
					&emsp;	private String couleur;<br />	
					&emsp;	private int vitesse;<br />	
					&emsp;	private Parc_Voiture parc;<br />	
					&emsp;	private Conso_Moyenne consommation;<br />	
					&emsp;	private Modele modele;<br />	<br />	
						
					&emsp;	public Voiture(String couleur, int vitesse, Parc_Voiture parc, Conso_Moyenne consommation, Modele modele){}<br />	
					}<br />	

					public class Conso_Moyenne {<br />	
					&emsp;	private String unite;<br />	
					&emsp;	private float Valeur;<br />	<br />	
						
					&emsp;	public Conso_Moyenne(String s, float f){}<br />	
					}<br />	<br />	

					public class Modele {<br />	
					&emsp;	private String puissance;<br />	<br />	
						
					&emsp;	public Modele(String s){<br />	
					&emsp;		puissance = s;<br />	
						}<br />	<br />	

					&emsp;	public String ConsoModele(){}<br />	
					}<br />	

					public class Marque {<br />	
					&emsp;	private String marque;<br />	<br />	
						
					&emsp;	public Marque(String s){<br />	
					&emsp;	marque = s;<br />	
						}<br />	
					}<br />	


				</div>
				</p>
				
				<h3>Je m'implique, j'apprends</h3>
				
					<h4> Galerie d'art (1h)</h4>
					<div class="enonce"><p>Dans un premier temps, nous devions modéliser le domaine de la galerie d’art en reprenant le premier énoncé, et vocabulaire ainsi que les descriptions des cas d’utilisation. Nous devions ensuite également prendre en compte des informations du TD.<br />
					<br /><span>Décomposition du problème :</span><br />
					<strong>1 -</strong> Sur un artiste nous disposons actuellement des informations suivantes :<br />
					<strong>-</strong> Date de naissance de l’artiste<br />
					<strong>-</strong> Nom, prénom, email<br />
					<strong>-</strong> Son âge<br />
					<strong>-</strong> Une photo de l’artiste<br />
					<strong>-</strong> La liste de ses œuvres en précisant les œuvres à la vente ou non.<br /><br />
					
					<strong>2 -</strong> Pour chaque "œuvre" nous avons les informations suivantes :<br />
					<strong>-</strong> L’artiste auquel appartient l’œuvre<br />
					<strong>-</strong> Type de l’œuvre (peinture ou sculpture)<br />
					<strong>-</strong> Texte de description<br />
					<strong>-</strong> 1 à 3 photos en petit format (150×150 max) par œuvre et leur titre <br />
					</p></div>
					
					<p><span>Réponses :</span><br />
					Nous avons donc commencé par modéliser les classes qui apparaissait dans le premier énoncé, telle que la galerie, les clients et les œuvres. Nous avons ensuite adapté le diagramme 
					en ajoutant les informations fournies. Ainsi, les méthodes et les attributs des différentes classes sont apparus et ont compléter le diagramme.<br /><br />
					<img src="img/tds/diagModDo/galerie.png" alt="img"/><br /></p>
					
					
					<h4> Jeu d'echec (1h)</h4>
					<div class="inTdBloc">
						<div class="enonce">
							<p>Nous devions ensuite réaliser un jeu d'echec.<br /><br />
							<strong>1 -</strong>Un jeu d'échec se joue à deux joueurs sur un échiquier carré composé de 64 cases, alternativement noires et blanches.<br />
							<strong>2 -</strong>Chaque joueur possède initialement 8 pions, un roi, une dame, deux tours, deux fous et deux cavaliers. Un pion peut devenir une dame, une tour, un fou ou un cavalier, on dit qu'il est promu.<br />
							<strong>3 -</strong>Il y a au maximum une pièce par case.<br />
							<strong>4 -</strong>On peut déplacer toutes les pièces, mais en fonction de la pièce le déplacement autorisé est différent.<br />
							<strong>5 -</strong>Une tour peut roquer.<br />
							<strong>6 -</strong>Une partie est une suite ordonnée de coups : les joueurs jouent alternativement chacun leur tour.<br />
							</p>
						</div>
						<p>Nous avons donc réaliser le diagramme de classe suivant:</p>
						<img src="img/tds/diagModDo/echec.jpg" alt="img"/>
					</div>
			</div>
			
			
			<div class="inTdTitle"><h2>Évaluation</h2></div>
				<div class="inTdBloc">
					<form method="post" action="#eval">
							<?php
								if(!isset($rep)){ $rep = 0;}
							?>
							<p><strong>Question 1 :</strong> Le diagramme de classe sert à :<br />							
							<input type="radio" name="q1" value="1" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Définir les limite précises du système<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="2" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 2){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q1'])){echo '<span class="true">';} ?>Définir les classes et leurs relations<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="3" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Comprendre le diagramme de cas d’utilisation<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="4" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Définir les niveaux des attributs et des méthodes<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 2 :</strong> Dans ce diagramme, que représente cette flèche :
							<img src="img/tds/diagModDo/quizz2.jpg" alt="quizz" />
							<input type="radio" name="q2" value="1" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Class3 est une généralisation de Class4<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							<input type="radio" name="q2" value="3" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 3){echo 'checked'; }} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Class4 est une généralisation de Class3 <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							<input type="radio" name="q2" value="2" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 2){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q2'])){echo '<span class="true">';} ?>Class4 et Class3 sont en association<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 3 :</strong> D'après ce diagramme : 
							<img src="img/tds/diagModDo/quizz3.jpg" alt="quizz" />	
							<input type="radio" name="q3" value="1" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Class3 est une généralisation de Class4<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							<input type="radio" name="q3" value="2" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 2){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q3'])){echo '<span class="true">';} ?>Class4 est une généralisation de Class3<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							<input type="radio" name="q3" value="3" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 3){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Class4 est associée à Class3 <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 4 : Dans ce diagramme, l’attribut A1 est : </strong>
							<img src="img/tds/diagModDo/quizz4.jpg" alt="quizz" />						
							<input type="radio" name="q4" value="1" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Protected<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="2" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Private<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="3" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 3){echo 'checked'; }} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Static<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="4" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 4){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q4'])){echo '<span class="true">';} ?>Public<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />

						
							</p>
						<div>
							<input name="formu" type="submit" value="Valider" />
						</div> 
					</form>
				
		
					<?php $questions=4; 
							if(isset($_POST['formu'])){
								echo '<p id="eval">';
								
			
								switch($rep){
									case 0 : echo $rep."/".$questions."<br />..." ; break;
									case 1 : echo $rep."/".$questions."<br />Refait des exercices et revoit la leçon pour t'entrainer." ; break;
									case 2 : echo $rep."/".$questions."<br />Il te reste encore quelques points à revoir." ; break;
									case 3 : echo $rep."/".$questions."<br />Des petites erreurs, mais bien joué !" ; break;
									case 4 : echo $rep."/".$questions."<br />Excellent !" ; break;
								}
								
								echo '</p>';
								
							}
					?>
				</div>
			
			
			
			<footer>
				<div>
					Le site web sert de compte rendu pour la matière Conception Orientée Objet du DUT Informatique sur Nice.
				</div>
				<div>
					2016 - 2017<br />
					Da Silva André, Monnier Stanislas & Montoya Damien
				</div>
			</footer>
		</div>

	
    </body>
</html>