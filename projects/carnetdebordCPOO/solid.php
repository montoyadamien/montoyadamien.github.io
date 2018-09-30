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
			<div id="inTdBandeau" class="inTdBandeauModCod">
				<h1 class="h1White">SOLID</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div class="inTdTitle"><h2>Définitions</h2></div>
			<div class="inTdBloc">
				<h3>Single Responsability Principe (SRP) :</h3>
				<p>
					On ne doit pas donner à une classe plusieurs responsabilités. Elle ne doit en avoir qu’une seule. Pourquoi ? Car en tant que programmeur on change toujours nos classes afin de résoudre les différents problèmes que l’on a (non ce n’est pas un bug de la machine ou d’Eclipse). Afin de posséder un code plus robuste et d’éviter la recherche d’erreurs il faut absolument associer une classe à une responsabilité qu’elle sera la seule à avoir.   
				</p>
				<h3>Open/closed principle (OCP) :</h3>
				<p>
					La plupart des informaticiens considèrent ce principe comme l’un des plus important. Après avoir coder et tester une classe celle-ci est considérer comme Open donc ouverte aux extensions. Ce que nous entendons par extensions ce sont par exemple les différents « Extends » que l’on peut ajouter à une classe.
					<br />
					En revanche si la class marche bien on a aucune raison de la modifier d’où l’idée de fermeture (closed). Par exemple pour passer des attributs qui étaient en public à private.
					<br /><br />
					<span>La petite astuce : Ce principe est souvent impossible à appliquer partout mais essayer de le faire au maximum.</span>
				</p>
				<h3>Liskov subtition principle (LSP) : </h3>
				<p>
					Dans votre programme vous avez surement plusieurs objets qui font partie d’une class. Ces différents objets instanciés par votre class peuvent tous être instancier par des sous classes sans pour autant casser le programme.
					<br />
					Prenons l’exemple du carré et du rectangle. Le carré étant un rectangle on est sensé pouvoir remplacer tous les objets rectangles par des objets de type carré sans pour autant créer des erreurs.
				</p>
				<h3>Interface segregation principle (ISP) :</h3>
				<p>
					Ici il s’agirait plutôt d’un principe qui affecte le client. Le principe de la ségrégation des interfaces consisterait à limiter les informations sur l’interface afin de pouvoir guider le client et empêcher le surplus d’informations. Il ne doit voir que des méthodes qui lui sont utiles. 
					<span>La petite astuce : Au lieu d’avoir qu’une seule interface globale pensez à la séparer en plusieurs éléments.</span>
				</p>
				<h3>Dependency inversion principle (DIP) :</h3>
				<p>
					Les class de doivent pas dépendre des implémentations mais des abstractions (Abstracts). 
				</p>
			</div>
			<div class="inTdTitle"><h2>Mise en oeuvre de SOLID</h2></div>
			<div class="inTdBloc">
				<p>
					Le TD numéro 3 fut l’un des plus court, le sujet portait sur l’élaboration d’un nouveau moteur. L’entreprise qui mit au point ce moteur voulait faire des simulations qui porte sur le comportement des véhicules par exemple calculer la vitesse maximale.
				</p>
				<p>
					<span>Le polymorphisme :</span><br />
					Le fait que Petitbus, camionCiterne ou encore CamionBache soit un vechicule crée un polymorphisme.
				</p>
				<p>
					<span>Une interface :</span><br />
					A quoi sert une interface ? Une interface est en quelque sorte le père de toute les classes qui l’implémente. Dans ce cas présent, la classe machine est celle qui donne des ordres, elle oblige toutes les autres classes comme Vehicule à implémenter les méthodes getWeight() et getHorsePower().
					Sur l’image en dessous vous pouvez voir l’interface que nous avons utilisé.
					<img src="img/solid/1.jpg" alt="img">
				</p>
				<p>
					<span>Une classe abstraite :</span><br />
					Il est impossible d’instancier une classe abstraite ce qui veut dire que nous ne pouvons pas la définir. Plus précisément si vous avez une méthode celle-ci n’y sera pas défini, il faudra simplement y laisser son nom et ses attributs. En effet cette méthode sera alors définie dans les classes filles. 
					<br />
					Mais alors à quoi sert une classe abstraite ?
					<br />
					A dire que les classes ont un lien entre elle pardi ! Il nous arrive de parler de factorisation de code lorsque l’on souhaite parler de classe abstraite. Dans notre TD ce sont des classes comme calculVitesse () qui sont factorisées.
					<img src="img/solid/2.jpg" alt="img">
					Sur l'image ci-dessus nous déclarons une classe abstraite
					<img src="img/solid/3.jpg" alt="img">
					Et sur celle-ci nous définissons la méthode
				</p>
				<p>
					Lors de cette séance nous avons appris à faire des tests. Il nous a bien fallu plus d’un an pour apprendre que les tests ce n’est pas de simples comparaisons entre deux chaines de caractères. Sans oublier que Eclipse nous permet de vérifier si toutes les classes sont bien tester. Si elles sont bien testé elles seront surlignées en vert.
					<br /><br />
					<span>Le test</span><br />
					<img src="img/solid/4.jpg" alt="img">
					<span>Le code à tester</span><br />
					<img src="img/solid/5.jpg" alt="img">
				</p>
				<p>
					Et tout cela grâce à une petite astuce ce fameux bouton d’exécution
					<img src="img/solid/6.jpg" alt="img">
				</p>
				<p>
					Le plus dur fut de comprendre la différence entre la classe abstraite et les interfaces qui permettent la création d’un polymorphisme.
					<br /><br />
					La différence entre une classe abstraite et une interface est simple : Avec une interface on parle d’une implémentation alors qu’une classe abstraire on parle d’extensions. Il n’est possible pour une classe d’hériter que d’un seul parent en revanche il est possible d’implémenter plusieurs interfaces dans une seul et même classes.
				</p>
				<P>
					<span>Le diagramme de classe final :</span><br />
					<img src="img/solid/7.jpg" alt="img">
				</P>
				<p>
					Le principe open/closed est un principe important dans le pattern SOLID c’est donc pour cela que nous allons en parler plus en détail avec un exemple concret. Dans notre cas la société Amadeum nous demande d’améliorer la gestion de vols et de locations de voitures. Elle nous demande pour faire ceci d’améliorer un service de préparation de voyages permettant en fonction d’une description d’un voyage, des lieux et dates de voyages de proposer au client le moyen le moins cher d’effectuer son trajet. 
					<br /><br />
					Nous avons donc au départ après analyse des codes les voitures et avions créés. De plus nous avons un service permettant de gérer les voitures ainsi qu’un service permettant de gérer les avions séparément nous permettant alors d’établir le diagramme de classes suivant :
					<img src="img/solid/8.jpg" alt="img">
				</p>
				<p>
					Mais comment faire pour organiser des voyages en calculant le prix minimum que ce soit par avion ou voiture ? Et bien tout simplement en rendant notre code ouvert et en lui permettant d’être extensible. Pour implémenter un tel principe nous pouvons utiliser comme solution l’implémentation. En effet, en créant des interfaces et en les implémentant par ces classes nous serons en mesure de définir les méthodes même méthodes pour chaque classe permettant par la suite de les utiliser lors de la création des voyages par un gestionnaire de voyage.
					<br /><br />
					Nous aurons donc une interface nommée ObjectPrice qui permettra de redéfinir la méthode getPrice() et qui sera implémentée par Flight ainsi que CarRental. Cette méthode permettra alors a la classe gérant chacun des moyens de locomotion soit CarRentalService ainsi que FlightService d’obtenir le prix de chaque véhicule sachant que ceux-ci peuvent varier en fonction de divers critères. Notre but étant de retourner le moyen le moins cher de faire un voyage nous pouvons également créer une interface services qui sera implémentée par les gestionnaires permettant ainsi de trouver les moyens de déplacement les moins chers, interface qui retournera un objet de type ObjectPrice créé précédemment. 
					<img src="img/solid/9.jpg" alt="img">
				</p>
				<p>
					La méthode find maintenant mise en place devra être implémentée et utilisée par le type ObjectPrice. Pour trouver donc les meilleurs moyens de déplacements aux meilleurs prix nous pouvons imaginer une classe abstraite, CompareTools qui pourra trier les divers moyens de transport et retourner le moins cher. Cette classe sera définie en tant que classe abstraite car celle-ci n’aura pas besoin d’être instanciée, en effet nous pourrons utiliser directement des méthodes propres à la classe grâce aux arguments. Maintenant que nous avons la structure permettant de récupérer les meilleurs moyens de déplacement il nous suffit de créer un gestionnaire de voyages. Nous aurons donc un gestionnaire de voyage qui permettra de créer des voyages représentés ici par la classe Trip permettant de stocker dans cette classe les différents moyens de locomotion à prendre.
					<br /><br />
					Cela nous amène donc au diagramme de classe qui suit :
					<img src="img/solid/10.jpg" alt="img">
				</p>
				<p>
					Le diagramme de classe nous permet alors de produire plus facilement le code. Nous n’avons pas mis les accesseurs dans ce diagramme pour ne pas insérer trop d’informations superflues.
					<br />
					La comparaison des prix étant importante voici donc la classe CompareTools une fois implémentée :
					<img src="img/solid/11.jpg" alt="img">
				</p>
			</div>
			<div class="inTdTitle"><h2>Évaluation</h2></div>
			<div class="inTdBloc">
				<form method="post" action="#eval">
					<?php
						if(!isset($rep)){ $rep = 0;}
					?>
					<p><strong>Question 1 :</strong>Que signifie dans l’acronyme SOLID la lettre L : <br />
					<input type="radio" name="q1" value="1" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Label<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="2" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Lecture<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="3" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Lapin<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="4" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 4){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q1'])){echo '<span class="true">';} ?>Liskov<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 2 :</strong> Le principe de la ségrégation des interfaces permet de : <br />
					<input type="radio" name="q2" value="1" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 1){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q2'])){echo '<span class="true">';} ?>N’avoir qu’une seule interface et donc à séparer les éléments <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="2" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Regrouper toutes les informations au sein de plusieurs interfaces <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Ne pas affecter les clients <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="4" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Ségréger des classes abstraites <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 3 :</strong> Le principe d’open/closed est : <br /> 
					<input type="radio" name="q3" value="1" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Le moins importants des principes SOLID <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="2" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Un principe toujours applicable <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="3" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 3){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q3'])){echo '<span class="true">';} ?>La fermeture indique que si une class marche sa ne sert à rien de la modifier <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="4" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>D'’ouvrir et fermer la fenêtre d’Eclipse <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 4 :</strong> Pour avoir un code plus robuste et éviter la recherche trop longue d’erreurs il faudrait : <br />
					<input type="radio" name="q4" value="1" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Appliquer le principe de Open/Closed<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="2" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Appliquer le principe interface segregation <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="3" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 3){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q4'])){echo '<span class="true">';} ?>Appliquer le principe de Single Responsability <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="4" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Appliquer le principe du flash Mcqueen <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 5 :</strong> De quoi dépendent les classes selon le principe de d’inversion de dépendance :  <br />
					<input type="radio" name="q5" value="1" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>De l’utilisateur très compétent <?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
					<input type="radio" name="q5" value="2" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>Des implémentations <?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
					<input type="radio" name="q5" value="3" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>Des extensions <?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
					<input type="radio" name="q5" value="4" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 4){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q5'])){echo '<span class="true">';} ?>Des abstractions <?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
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