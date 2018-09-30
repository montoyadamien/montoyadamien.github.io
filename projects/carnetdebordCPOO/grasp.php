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
			<div id="inTdBandeau" class="inTdBandeauSeq">
				<h1 class="h1White">GRASP</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div class="inTdTitle"><h2>Définitions</h2></div>
			<div class="inTdBloc">
			<p>GRASP est un design pattern se basant sur le principe de la responsabilité qui se divise en 2 parties.<br />
			-	La responsabilité de faire qui peut être le déclenchement ou la réalisation d’une action ou bien de contrôler et de gérer les activités d’un autre objet.<br /> 
			-	La responsabilité de savoir notamment connaître les valeurs de ses attributs via des accesseurs ou de connaitre les objets qui lui sont rattachés.
			<br /><br />
			Ce pattern se base notamment sur 7 principes de développement orienté objet.
			</p>
			<h3>Information Expert : Qui est responsable des actions sur les objets ?</h3>
				<p>
					On affecte cette responsabilité à la classe qui possède les informations de cet objet pour s’acquitter de cette tâche. Il faut donc définir dans un premier temps les informations attribuées à l’objet ainsi que savoir quels objets en sont responsables.
				</p>
			<h3>Creator : Qui doit se charger de créer une instance d’un objet ?</h3>
				<p>
					On affecte à la classe B la responsabilité de créer une instance de la classe A si au moins :<br />
					- B contient ou agrège des objets A<br />
					- B enregistre des objets A<br />
					- B utilise étroitement des objets A<br />
					- B a les données d’initialisation qui seront transmises aux objets A lors de leur création
				</p>
			<h3>Low Coupling : Comment minimiser les dépendances et réduire l’impact des changements ?</h3>
				<p>
					Le couplage peut être défini par les liens dont dépends un objet envers un autre. Plus un objet sera dépendant d’un autre, plus le couplage sera fort. La seule solution pour minimiser ce couplage et ces dépendances est d’étudier au mieux les objets utilisés pour réduire le couplage.
				</p>
			<h3>Controller : Quel est le premier objet au-delà de l’IHM qui reçoit et coordonne une opération système ?</h3>
				<p>
					Le contrôleur est un objet se situant entre l’application et l’IHM. Cet objet aura pour finalité de recevoir et traiter les évènements systèmes entrainés par une interaction. Pour modéliser le contrôleur il suffit de créer un objet dans la couche application qui aura ce rôle de traitement d’évènements.
				</p>
			<h3>High Cohesion : Comment parvenir à maintenir la complexité gérable ? /h3>
				<p>
					Une classe de forte cohésion sera une classe facile à comprendre à réutiliser à maintenir et dont les dépendances sont réduites. Une classe de forte cohésion devra être étudiée de sorte à contenir un nombre réduit de méthodes liées entre elles.
				</p>
			<h3>Polymorphisme : Comment gérer des alternatives dépendantes des types ?</h3>
				<p>
					Le polymorphisme est le fait d’avoir un objet parent composé de plusieurs méthodes et attributs qui étends des objets fils. Ces objets fils permettront alors de disposer des méthodes définies dans la classe parente telles quelles ou modifiées mais encore de disposer d’autres méthodes et attributs.
				</p>
			<h3>Fabrication Pure : Que faire quand les concepts du monde réel ne sont pas utilisables en respectant le faible couplage et la forte cohésion ?</h3>
				<p>
					Quand les concepts du monde réel ne peuvent s’appliquer au faible couplage et à la forte cohésion une solution est de créer une classe artificielle ne représentant pas un concept du domaine.
				</p>
			</div>
				
			<div class="inTdTitle"><h2>Mise en oeuvre de GRASP</h2></div>
			<div class="inTdBloc">
				<p>
				Durant nos séances en TP le principe du pattern GRAPS a été utilisé lors de la création d’un bus à message et de flux d’informations. Le principe est de permettre à des utilisateurs de la même manière que sur un forum ou un réseau social, de créer des bus de message identifiable via un nom, eux-mêmes composés de boites de messages contenant enfin des messages.
				<br />
				Les principes GRASP seront alors mis en place durant cet exercice indiquant les solutions à utiliser pour respecter ce pattern. 
				<br />
				En étudiant l’énoncé nous pouvons alors nous poser plusieurs questions quant à l’utilisation de GRASP. Qui est responsable de connaitre les boites de messages ? Cette question soulève alors le principe Information Expert. En effet nous avons 2 classes, Bus ainsi que BoiteMessage. D’après l’énoncé le bus est composé de boites. Dans ce cas, c’est la classe Bus qui contiendra les méthodes permettant d’accéder aux boites. Ce principe s’applique de nouveau concernant la classe BoiteMessage, en effet celle-ci contiendra des messages c’est donc à elle de savoir quels messages lui sont associés. 
				<br /><br />
				<span>Par convention nous ne mettons pas les accesseurs dans les diagrammes de classe mais pour les besoins de ce rapport ceux-ci seront tout de même disposés.</span>
				</p>
				<img src="img/grasp/1.png" alt="IMG">
			</div>
			<div class="inTdBloc">
				<p>
				Le problème restant est maintenant de savoir qui va créer la classe Bus ? Heureusement pour nous un des principes de GRASP est là pour répondre à la question, et ce principe est le Creator. En effet pour gérer alors les différents bus nous pouvons créer une classe qui se chargera de traiter les actions sur les bus tel un gestionnaire de bus. Ce gestionnaire contiendra dans un premier temps les méthodes de gestion des bus et sera ainsi composé de bus. C’est également ce gestionnaire qui sera en charge de la création des boites de message et de leur association au bus ainsi que de la création des messages.  
				</p>
				<img src="img/grasp/2.png" alt="IMG">
			</div>
			<div class="inTdBloc">
				<p>
				Mais si notre système de bus évolue et nous donne la possibilité de poster nos messages dans des boites différentes chacune avec une certaine spécialité, comment modéliser un tel principe ? Il faut bien évidement utiliser le principe du polymorphisme. En effet le principe du polymorphisme nous permettra de créer des classes filles qui hériterons des méthodes et attributs de leur classe mère. Pour illustrer ce principe nous allons ajouter 3 types de boites. Les boites « brèves » qui pour chaque message créé ne pourra contenir que 140 caractères. Les boites « suppressives », dès lors que nous lisons un message ceux-ci sont supprimés ainsi que le type boite message normal.
				</p>
				<img src="img/grasp/3.png" alt="IMG">
			</div>
			<div class="inTdBloc">
				<p>
				Dans le diagramme de classe nous avons ajouté un attribut tailleMessage pour les boites brèves qui permettra de valider et modifier plus aisément la taille maximale des messages par la suite.
				<br /><br />
				Nous devons maintenant permettre aux utilisateurs de pouvoir créer des boites de messages et ainsi que des messages. C’est donc notre gestionnaire de bus qui va se charger de ceci.
				</p>
				<img src="img/grasp/4.png" alt="IMG">
			</div>
			<div class="inTdBloc">
				<p>
				Les méthodes isABus et isABoite permettront de vérifier que lorsque l’utilisateur voudra ajouter des messages ou des boites que les objets dont ils dépendent existent bien.
				<br />
				Maintenant que nous avons notre diagramme de classes sur le fonctionnement métier de l’application nous nous intéressons à l’interface. D’après le td grâce à celle-ci nous devrons être en mesure de pouvoir créer des bus, des boites ainsi que des messages et lister ceux-ci. Il faut savoir que l’interface n’interagit jamais directement avec la partie métier, c’est un contrôleur qui prend ce rôle et donc qui nous permet d’établir un lien avec le principe de GRASP et du contrôleur. Nous aurons donc une classe qui se chargera d’interagir avec l’interface et d’utiliser la partie métier de l’application. Pour l’application de ce td notre interface sera utilisée en ligne de commandes. Les modifications précédentes nous permettent alors d’obtenir le diagramme de classe suivant :
				</p>
				<img src="img/grasp/5.png" alt="IMG">
			</div>
			<div class="inTdBloc">
				<p>
				Grâce à ce diagramme nous pouvons dès à présent commencer la création du code. Dans notre cas nous nous attarderons sur la classe Controleur ainsi que UI qui sont les éléments les plus compliqués de ce principe à prendre en main.
				</p>
				<img src="img/grasp/6.png" alt="IMG">
			</div>
			<div class="inTdBloc">
				<p>
				Les méthodes creerBoire, lireMessage, creerMessage fonctionneront de la même amnière que creerBus, via des vérifications.
				</p>
			</div>
			<div class="inTdTitle"><h2>Évaluation</h2></div>
			<div class="inTdBloc">
				<form method="post" action="#eval">
					<?php
						if(!isset($rep)){ $rep = 0;}
					?>
					<p><strong>Question 1 :</strong> GRASP c'est : <br />
					<input type="radio" name="q1" value="1" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 1){echo 'checked'; $rep++; }} ?>><?php if(isset($_POST['q1'])){echo '<span class="true">';} ?>Un design pattern<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="2" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 2){echo 'checked'; }} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Un Grand Rat Affamé Par Soi<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="3" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Une méthode de classe abstraite<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="4" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Une méthode ne se basant pas sur le principe de la responsabilité<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 2 :</strong> Le pattern de GRASP ce base sur combien de principes de développement orientée objets : <br />
					<input type="radio" name="q2" value="1" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Un seul et unique principe<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="2" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 2){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q2'])){echo '<span class="true">';} ?>Sept principes<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Treinta y siete<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="4" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Aucun<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 3 :</strong> Celui qui est responsable des objets sur les actions est : <br /> 
					<input type="radio" name="q3" value="1" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Eclipse version responsable<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="2" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Le package responsable<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="3" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Le professeur responsable<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="4" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 4){echo 'checked'; $rep++; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="true">';} ?>La classe responsable<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 4 :</strong> Le Low Coupling permet de  : <br />
					<input type="radio" name="q4" value="1" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 1){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q4'])){echo '<span class="true">';} ?>Minimiser les dépendances et réduire l’impact des changements<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="2" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Maximaliser les dépendances et augmenter l’impact des changements<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="3" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Maximaliser les dépendances et réduire l’impact des changements<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="4" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Minimiser les dépendances et augmenter l’impact des changements<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 5 :</strong> Le GRASP se base sur le principe de la responsabilité qui se divise en 2 parties l’une d’entre elle est : <br />
					<input type="radio" name="q5" value="1" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 1){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q5'])){echo '<span class="true">';} ?>Connaitre les valeur de ses attributs via des accesseurs <?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
					<input type="radio" name="q5" value="2" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>Permettre à une interface de devenir une classe abstraite <?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
					<input type="radio" name="q5" value="3" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>Permettre de transmettre la responsabilité à une extension<?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
					<input type="radio" name="q5" value="4" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>D La respuesta D<?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
					
					</p>
					<div>
						<input name="formu" type="submit" value="Valider" />
					</div> 
				</form>
				<?php 
					$questions=5; 
					if(isset($_POST['formu'])){
						echo '<p id="eval">';	
						switch($rep){
							case 0 : echo $rep."/".$questions."<br />..." ; break;
							case 1 : echo $rep."/".$questions."<br />Il faudrait envisager une réorientation..." ; break;
							case 2 : echo $rep."/".$questions."<br />Pense a relire la leçon pour bien cerner les fondamentaux." ; break;
							case 3 : echo $rep."/".$questions."<br />Bon travail !" ; break;
							case 4 : echo $rep."/".$questions."<br />Très bien."; break;
							case 5 : echo $rep."/".$questions."<br />Excellent !" ; break;
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