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
				<h1 class="h1White">State et Composite</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div class="inTdTitle"><h2>Pattern State</h2></div>
			<div class="inTdBloc">
				<p>
					Dans ce tp nous avons vu l’utilisation de deux pattern intéressants par leur optimisation du code. En effet le pattern state nous permet d’affecter à un objet un état divisé en sous états permettant alors une utilisation et une modification facile de l’objet. Pour avoir un aperçu de ce pattern voici un diagramme de classe explicite :
					<img src="img/state_composite/1.jpg" alt="img" />
				</p>
				<p>
					Par exemple nous avons des capteurs. Ces capteurs peuvent être sur On, sur Off ou sur l’état Lazy. Comment modéliser une telle chose ? et bien tout simplement en utilisant le pattern state qui permettra à un capteur de disposer d’un objet StateSensor ou ses classes filles seront alors On, Off et Lazy. Ces classes filles contiendrons alors des méthodes communes qui pourront s’exécuter de manière différente en fonction des états. Dans le cadre de notre TD, un LogicalSensor est associé à un PhysicalSensor. De plus nous avons une classe SensorWithState permettant d’affecter à un LogicalSensor un état. Cela nous permet donc d’établir un premier diagramme de classe :
					<img src="img/state_composite/2.jpg" alt="img" />
				</p>
				<p>
					Nous pouvons donc voir sur le diagramme de classes ci-dessus que le design pattern state est bien appliqué, en effet nous avons différents états descendant d’une classe mère StateSensor.
					<br /><br />
					Voilà donc le code associé à ce diagramme de classe :
					<img src="img/state_composite/3.jpg" alt="img" />
					Nous aurons donc en premier temps la classe permettant de définir un capteur associé à un état.
					<img src="img/state_composite/4.jpg" alt="img" />
					Nous aurons ensuite la classe StateSensor qui sera l’état mère et qui donc ne pourra être instancié. La méthode abstract getValue() sera donc à redéfinir pour chaque classe fille.
					<img src="img/state_composite/5.jpg" alt="img" />
					Dans le cas où le capteur est sur off la méthode getValue retournera « Off »
					<img src="img/state_composite/6.jpg" alt="img" />
					Dans le cas où le capteur est sur on la méthode getValue retournera alors la valeur du capteur.
				</p>
			</div>
			<div class="inTdTitle"><h2>Pattern Composite</h2></div>
			<div class="inTdBloc">
				<p>
					Mais notre travail ne s’arrête pas là, en effet des capteurs doivent maintenant être disposés dans une maison. Dans une maison se trouve des parties comme par exemple l’étage, le rez de chaussé mais dans ces parties il existe également des pièces. Une partie peut contenir des capteurs mais une pièce aussi et la maison également peut obtenir un capteur central. Un moyen simple et optimisé existe alors pour permettre d’avoir les méthodes concernant les capteurs pour chaque lieu, le pattern Composite. 
					<img src="img/state_composite/7.jpg" alt="img" />
				</p>
				<p>
					D’après ce diagramme, nous pouvons alors visualiser le principe de ce pattern. En effet, un Composite peut se composer de plusieurs components qui peuvent alors être des composites et donc peuvent contenir à nouveau des components. Les méthodes pourront alors s’exécuter sur chaque objet. Si l’on suit ce principe, voilà le diagramme de classes que nous pouvons obtenir pour notre maison : 
					<img src="img/state_composite/8.jpg" alt="img" />
					Le lieu est donc le composant qui contiendra des capteurs. En effet, nous pouvons avoir des capteurs dans la Maison mais aussi dans les Pieces et Parties. 
				</p>
			</div>
			<div class="inTdTitle"><h2>Évaluation</h2></div>
			<div class="inTdBloc">
				<form method="post" action="#eval">
					<?php
						if(!isset($rep)){ $rep = 0;}
					?>
					<p><strong>Question 1 : Le pattern state permet d’affecter à un objet un état :</strong><br />
					<input type="radio" name="q1" value="1" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 1){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q1'])){echo '<span class="true">';} ?>Divisé en sous état<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="2" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Multiple par des états dans tous les class <?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="3" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Soustraire des attributs état dans les sous class <?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					<input type="radio" name="q1" value="4" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Additionné des états au class <?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 2 : Appliquer le pattern state permet de : </strong><br />
					<input type="radio" name="q2" value="1" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 1){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q2'])){echo '<span class="true">';} ?>De faciliter les modifications sur des objets <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="2" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>De compliquer le projet <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>De rendre toutes les class abstraites <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					<input type="radio" name="q2" value="4" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>De compléter des interfaces <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 3 : Un pattern composite peut se composer de :</strong><br /> 
					<input type="radio" name="q3" value="1" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Plusieurs interfaces <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="2" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>D’une seule interface <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="3" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 3){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q3'])){echo '<span class="true">';} ?>De plusieurs components <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					<input type="radio" name="q3" value="4" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>D’iron man <?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
					
					<br /><strong>Question 4 : Les méthodes présente dans un pattern composite permettent de : </strong> <br />
					<input type="radio" name="q4" value="1" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Lancer des erreurs et de faire crash Eclipse<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="2" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Lancer les méthodes sur un seul objet <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="3" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Changer le type de certains objet <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
					<input type="radio" name="q4" value="4" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 4){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q4'])){echo '<span class="true">';} ?>S’exécuter sur chaque objet <?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
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