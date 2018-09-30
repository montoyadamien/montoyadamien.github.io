<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="style/style.css" type="text/css" />
		<link rel="stylesheet" href="style/navStyle.css" type="text/css" /> <!-- css du menu -->
		<link rel="stylesheet" media="all and (max-width:600px)" href="style/NavSmall.css" type="text/css" /> <!-- Quand il y a un petit ecran, le menu -->
		<link rel="stylesheet" media="all and (max-width:600px)" href="style/styleSmall.css" type="text/css" /> <!-- Quand il y a un petit ecran, le contenu -->
        <meta charset="utf-8" />
        <title>Carnet de bord - 2017</title>
    </head>
    <body>
		<input type="checkbox" id="hamburger"/> <!-- Faire le menu au clic -->
		<label id="gridNav" for="hamburger"></label> <!-- utilisé pour cocher la checkbox -->
		<nav>
			<div id="dansNav">
				<a href="index.html">Accueil</a>
				<a href="introduction_et_rappels.php">Introduction et rappels</a>
				<a href="grasp.php">GRASP</a>
				<a href="solid.php">SOLID</a>
				<a href="adapter_observer.php">Patterns Adapter et Observer</a>
				<a href="state_composite.php">Patterns State et Composite</a>
			</div>
		</nav>
		
		<div id="page">
			<div id="inTdBandeau" class="inTdBandeauMod">
				<h1 class="h1White">Adapter et Observer</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div class="inTdTitle"><h2>Les design patterns</h2></div>
			<div class="inTdBloc">
				<p>
					Un design pattern ou patron de conception est un format de réponse considérée comme étant un standard. Il s’agit de réflexe que l’on devrait adopter pour pouvoir résoudre un problème de la manière la plus simple et efficace. Le TD porte le nom de réutilisation car on nous propose une solution standard que l’on doit réutiliser afin de parvenir à créer de nouvelles fonctionnalités.
					<br /><br />
					Design pattern adaptateur : Il s’agit d’un pattern qui permet d’adapter une interface aux envies/besoins du client.
					<br /><br />
					Design pattern observateur : Il s’agit d’une relation entre plusieurs objets de n’importe quel type. 
					<br />
					Pourquoi ? car si on change l’état d’un objet tout ceux qui sont liées changeront aussi d’état.
					<br />
					Exemple : Un téléphone est dans un état, on change son état en « allumé » toutes les applications de démarrage seront forcément allumées elles aussi.
				</p>
			</div>

			<div class="inTdTitle"><h2>Mise en oeuvre des designs patterns</h2></div>
			<div class="inTdBloc">
				<p>
					Pour ce td ci nous devions mettre en place un réseau social qui ressemble beaucoup à Facebook. Une personne ayant un compte sur un autre réseau social pouvait lier les deux afin de mettre à jours tous les éléments du profil Facebook. Les liaisons entre les membres étaient liées à un numéro par exemple le numéro 1 signifierait que ces deux profils ont un lien familial, 2 amis etc. Afin d’arriver à la fin du td tout nous était donner on avait les diagrammes de classe ainsi que le code qui va avec. 
					<br /><br />
					Pour modéliser les profiles Facebook nous utilisions des classes représentants des graphes qui fonctionnent entre autres avec le théorème de Djistra.
					<br />
					Un profil est composé d’un âge, un nom et une description. Notre problème était le fait que dans un autre réseau la description n’est pas la même que dans notre réseau. Nous avons donc dû chercher comment faire : on est donc arrivé à créer un faux utilisateurs afin de pouvoir lui affecter un Age et un nom correspondant au profil facebook puis on a récupéré la description d’un utilisateur grâce à la ligne de commande situer ci-dessous :
					<img src="img/adapter_observer/1.jpg" alt="img">
					<br /><br />
					On souhaite donc adapter notre réseau de sorte à ce qu’il ne devienne pas obsolète. Donc lorsqu’un autre réseau ici « FacebookGhost » met à jour un profile celui-ci crée un évènement chez notre réseau à nous qui change le profil d’un de nos utilisateurs.  Pour cela on à créer une interface événement et une classe utilisateur événement. 
					<img src="img/adapter_observer/2.jpg" alt="img">
					Et voici comment nous l'avons testée  :
					<img src="img/adapter_observer/3.jpg" alt="img">
				</p>
			</div>
			<div class="inTdTitle"><h2>Évaluation</h2></div>
			<div class="inTdBloc">
				<form method="post" action="#eval">
					<?php
						if(!isset($rep)){ $rep = 0;}
					?>
					<p><strong>Question 1 : Les designs pattern sont en français :</strong><br />
					<input type="radio" name="q1" value="1" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Des patrons de programmation <?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="2" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 2){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q1'])){echo '<span class="true">';} ?>Des patrons de conception <?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="3" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Des employés <?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="4" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Des patrons d’abstraction <?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 2 : Le design pattern adaptateur est : </strong><br />
					<input type="radio" name="q2" value="1" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 1){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q2'])){echo '<span class="true">';} ?>Un pattern qui permet d’adapter une interface aux clients <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="2" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Un pattern qui permet d’adapter une interface aux programmeurs <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Un pattern qui permet d’adapter une interface aux class <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="4" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>[Insérez une réponse] <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 3 : Le design pattern observateur est :</strong><br /> 
					<input type="radio" name="q3" value="1" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Une relation entre deux personnes consentantes <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="2" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Une relation entre une interface et une classe <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="3" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 3){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q3'])){echo '<span class="true">';} ?>Une relation entre plusieurs objets<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="4" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Une relation entre deux méthodes <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 4 : La relation entre objet dans un design pattern observateur dépend des objets mais leurs types peuvent être :</strong> <br />
					<input type="radio" name="q4" value="1" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Tous de même types <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="2" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Tous de type différent <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="3" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 3){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q4'])){echo '<span class="true">';} ?>Le type n’a aucune importance <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="4" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Stéréotypés <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					</p>
					<div>
						<input name="formu" type="submit" value="Valider" />
					</div> 
				</form>
				<?php 
					$questions=4; 
					if(isset($_POST['formu'])){
						echo '<p id="eval">';	
						switch($rep){
							case 0 : echo $rep."/".$questions."<br />..." ; break;
							case 1 : echo $rep."/".$questions."<br />Il faudrait envisager une réorientation..." ; break;
							case 2 : echo $rep."/".$questions."<br />Pense a relire la leçon pour bien cerner les fondamentaux." ; break;
							case 3 : echo $rep."/".$questions."<br />Bon travail !" ; break;
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