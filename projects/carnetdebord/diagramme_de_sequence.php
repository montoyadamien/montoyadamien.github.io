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
			<div id="inTdBandeau" class="inTdBandeauSeq">
				<h1 class="h1White">Diagramme de séquence</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div id="inTdBandTime">
				<div><img src="img/tds/tdsTime.png" alt="time" />1 Heure 15 Minutes</div>
				<div><img src="img/tds/tdsSoft.png" alt="logiciel" />Modélio</div>
			</div>
			
			<div class="inTdTitle"><h2>Interêt</h2></div>
			<div class="inTdBloc">
					<p>Les diagrammes de séquence nous permettent de décrire le comportement dynamique (comportement dans le temps) d’un système dans un diagramme.<br />
					Ils permettent également de montrer comment des sociétés d’objets peuvent collaborer pour réaliser les cas d’utilisation. <br />
					On y précise le contenu d’un cas d’utilisation en déroulant les scenarios (flots d’évènements).<br />
					En général, on y décrit que les scénarios les plus représentatifs</p>
			</div>
			
			<div class="inTdTitle"><h2>Mise en pratique</h2></div>
			<div class="inTdBloc">
			<h3>Je comprends</h3>
			<div class="enonce">
			<p>Lors de ce td, les premières questions pour se familiariser avec le diagramme de séquences étaient les suivantes :
			</p><img src="img/tds/diagSequence/comprends.png" alt="seq" />
			<p>
			<strong>1 -</strong> Quels sont les acteurs?<br />
			<strong>2 -</strong> Comprenez-vous le scénario?<br />
			<strong>3 -</strong> Quelle structure correspond à une boucle? à une condition?<br />
			<strong>4 -</strong> Quel objet est créé?<br />
			<strong>5 -</strong> Qui exécute le comportement de “réserver une chambre à une date donnée” ?<br />
			<strong>6 -</strong> Qui répond à “available(date)” ?<br />
			<strong>7 -</strong> Qui fait appel à “available(date)” ?<br />
			<strong>8 -</strong> Qui exécute “lookForHotels(Place)” ?<br />
			<strong>9 -</strong> Définissez les classes correspondantes et les méthodes qui leur sont associées.<br />
	
			</p></div><p>
			<span>Réponses :</span><br />
			<strong>1 -</strong> Il n'y a qu'un acteur, "Client"<br /> 
			<strong>2 -</strong> Le scénario est simple, un client se rend sur l'interface du système. Il demande une reservation pour un hotel, le système via HotelChain envoi la demande de réservation, puis le système vérifie les différents hôtels disponibles, celui-ci envoi à l'utilisateur la liste des hôtels différents et enfin l'utilisateur choisi son hôtel, la date et le réserve.<br />
			<strong>3 -</strong> La structure "loop" est une boucle et la structure "alt" est une condition.<br />
			<strong>4 -</strong> L'objet qui est créé est l'objet "Reservation" car sa ligne de vie débute après une méthode.<br />
			<strong>5 -</strong> C'est "Hotel" qui éxecute le comportement de reserve(date) car c'est lui au bout de la flèche.<br />
			<strong>6 -</strong> C'est "Hotel" qui répond à available(date) via le message "status" .<br />
			<strong>7 -</strong>  C'est "HotelChain" qui appel available(date).<br />
			<strong>8 -</strong> C'est "HotelChain" qui exécute lookForHotels(place)<br />
			<strong>9 -</strong> Les classes seront "Client" avec comme méthode makeReservation(date,place) et reserve(date).<br />
			"HotelChain" avec comme méthode lookForHotels(place), available(date), addHotelToTheList.<br />
			"Hotel" et "Reservation" avec comme méthode createReservation(date,hotel).<br />
			
				<div class="aSavoir">
				A retenir :<br />
				Celui qui répond/exécute à une méthode est celui-qui se situe en bout de flèche.<br />
				Celui qui fait appel à une méthode est celui-qui se situe à l'extrémité du message  sans avoir de flèche.<br />
				Lors de la programmation JAVA, la classe contenant les méthodes est celle qui est pointée par la flèche.
				</div>
			
			</p>
			
			<h3>Je m'implique, j'apprends</h3>
			<div class="enonce">
				<p>Nous allons donc dans cet exercice créer le diagramme de séquence correspondant au cas d'utilisation "Un internaute s'inscrit sur le site pour devenir client de la galerie d'art".<br />
				<br /><span>Décomposition du problème :</span><br />
				<strong>1 -</strong> L'internaute saisit son nom, son prénom, son adresse email<br />
				<strong>2 -</strong> Le système vérifie que ces informations sont bien construites<br />
				<strong>3 -</strong> Le système enregistre le nouveau client<br />
				<strong>4 -</strong> Le système signale au client que tout s'est bien passé<br /><br />
				
				<strong>1 -</strong> Représentez le diagramme de séquence Système correspondant au cas d'utilisation "Un internaute s'inscrit sur le site pour devenir client de la galerie d'art"<br />
				<strong>2 -</strong>Enrichissez le diagramme de séquence Système et visualisez la présence de flots alternatifs par des notes :<br />
									A1 : Données non valides<br /> 
									A2 : Client déjà enregistré <br />
			</p>
			</div>
				<p><span>Réponses :</span><br />
				Pour améliorer cet exercice, des élements on étés ajoutés, tels que les mots de passe. Dans cette partie, nous répondrons directement aux questions 1 et 2.<br /><br />
				
				L'internaute qui est l'acteur agissant sur le cas d'utilisation sera le premier objet du diagramme. En dessous de lui la ligne en pointillés est appellé "Ligne de vie". <br />
				<span>Ligne de vie : </span>ligne en pointillés représentant la durée d'activité d'un acteur ou d'un objet.<br />
				<img src="img/tds/diagSequence/1.jpg" alt="img" /><br />
				
				L'internaute pourra agir avec la galerie grâce à l'objet "Interface Web".<br />
				Un message numéroté dans l'ordre d'apparition sera lié de l'internaute vers l'interface web, composé du nom de la méthode puis entre parenthèse les informations envoyées, nom, prénom,mdp,mdpValid,mail.<br />
				<span>Message : </span>Intéraction entre deux lignes de vie.</p>
				<img src="img/tds/diagSequence/2.jpg" alt="img" /><br />
				
				<p>Le formulaire d'inscription sera alors envoyé à l'objet "Systeme Inscription". <br />
				Un message réflexif sera ensuite ajouté sur la ligne de vie de l'objet "Interface Web" indiquant que le système vérifie la validité des informations.<br />
				<span>Message réflexif : </span>Intéraction sur une même ligne de vie </p>
				<img src="img/tds/diagSequence/3.jpg" alt="img" /><br />
				
				<p>Grâce à plusieurs conditions, le systeme d'inscription pourra valider ou non les données. 
				Les conditions sont faites grâce à des bloc "alt" et des messages de retour seront envoyés à l'utilisateur.<br />
				<span>Message de retour : </span>message envoyé vers l'utilisateur pour lui indiquer un état, schématisé par une flècge en pointillés.<br /><br />
				Dans les conditions, si le formulaire est valide l'utilisateur sera averti et le compte sera créé en envoyant un message vers l'objet "Compte".	
				<img src="img/tds/diagSequence/4.jpg" alt="img" /><br />
				
				<div class="aSavoir">
				A retenir :<br />
				Attention, un utilisateur n'intéragit pas directement avec le système de gestion, il passe par une interface !
				</div>
				
				</p><div class="enonce"><p>
				<strong>3 -</strong> Représentez le diagramme de séquence Système correspondant au cas d'utilisation Acheter des oeuvres d’art<br />
				Nous partons du principe que l'utilisateur a déclenché ce scénario précédemment, ce qui a eu pour conséquence de créer le panier puis de le connecter au début du scénario ci-après.<br /><br />
				
				Le système propose les oeuvres d’art.<br />
				Le client sélectionne des oeuvres d’art.<br />
				Chaque oeuvre est placée dans le panier par le système<br />
				Le client demande à acheter.<br />
				Le contenu du panier est réservé dans les stocks.<br />
				Le système demande au système de paiement l’encaissement du panier.<br />
				Le système de paiement valide le paiement et retourne une facture.<br />
				Le système enregistre le retrait du stock.<br />
				Le système confirme l’achat au client<br /><br />
				</p></div><p>
				<span>Réponses :</span><br />
				Nous aurons dans un premier temps le client qui grâce à une interface web pourra voir des oeuvres.
				<img src="img/tds/diagSequence/10.jpg" alt="seq"/>
				
				Le client pourra alors sélectionner les oeuvres qu'il veut grâce à l'interface ce qui aura pour conséquence d'ajouter les oeubres à son panier et les lier à son compte. <br />
				Un message lui indiquera que les oeuvres ont bien été ajoutées.
				<img src="img/tds/diagSequence/11.jpg" alt="seq"/>
				
				Le client pourra ensuite aller sur la page pour acheter les oeuvres en cliquant sur un bouton. Ceci aura pour effet de réserver temporairement les stocks. <br />
				Le système devra alors encaisser le paiement grâce au système externe "chaimoinscheir".<br />
				"Chaimoinscheir" validera alors le paiement et retournera la facture. <br />
				Une variable sera alors envoyée au système, dès que celui-ci l'aura reçu, il enregistrera le retrait des stocks et retournera un message à l'utilisateur via l'interface.
				<img src="img/tds/diagSequence/12.jpg" alt="seq"/>
				
				</p><div class="enonce"><p>
				<strong>4 -</strong> Complétez le diagramme de classe du TD 3 pour prendre en compte les nouveaux objets apparus par votre analyse du diagramme de séquence.<br />
				<strong>5 -</strong> Peut-on avoir payé sans que l'oeuvre soit retirée du stock ?<br />
				<strong>6 -</strong> Quel est le meilleur moment pour ajouter de la pub sur le site des galerie d'art relativement à ce diagramme de séquence ?<br />
				
				</p></div>
				<p>
				<strong>4 -</strong>D'après notre diagramme de séquence, nous devons mettre la classe client ainsi que la classe gestion.
				<img src="img/tds/diagSequence/classeAfter.png" alt="seq"/>
				<strong>5 - </strong>L'oeuvre étant retirée automatiquement du stock après le paiement, on ne peut pas payer sans que celle-ci soit retirée du stock.<br />
				<strong>6 - </strong>Le meilleur moment serait d'ajouter de la pub juste avant d'emmener le client sur la page d'achat des oeuvres.<br /><br />
				
				Vous pouvez donc maintenant créer vos diagrammes de séquences à partir du cahier des charges sans problèmes ! (ou presque ;).
			</p>
			</div>
			
			<div class="inTdTitle"><h2>Évaluation</h2></div>
				<div class="inTdBloc">
					<form method="post" action="#eval">
							<?php
								if(!isset($rep)){ $rep = 0;}
							?>
							<p><strong>Question 1 :</strong> D’après ce diagramme, il s’agit de :
							<img src="img/tds/diagSequence/quizz1.jpg" alt="quizz" />								
							<input type="radio" name="q1" value="1" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Un message<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="2" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 2){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q1'])){echo '<span class="true">';} ?>Un message réflexif<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="3" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Une ligne de vie<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="4" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Un message de retour<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 2 :</strong>  Que représente la ligne de vie :  <br />
							<input type="radio" name="q2" value="1" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>La période d’activité du système <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							<input type="radio" name="q2" value="3" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>La période d’activité d’un acteur/objet <?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							<input type="radio" name="q2" value="2" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 2){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q2'])){echo '<span class="true">';} ?>Le moment à partir duquel l’acteur/objet commence à interagir avec le système<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 3 :</strong> D’après ce diagramme :
							<img src="img/tds/diagSequence/quizz3.jpg" alt="quizz" />	
							<input type="radio" name="q3" value="1" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>M1 est exécutée par A1<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							<input type="radio" name="q3" value="2" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 2){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q3'])){echo '<span class="true">';} ?>M1 est exécuté par A2<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							<input type="radio" name="q3" value="3" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>M1 est exécuté par A3<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 4 : </strong> D’après ce diagramme, il s’agit de :
							<img src="img/tds/diagSequence/quizz2.jpg" alt="quizz" />							
							<input type="radio" name="q4" value="1" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Un message<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="2" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Un message réflexif<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="3" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 3){echo 'checked'; }} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Une ligne de vie<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="4" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 4){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q4'])){echo '<span class="true">';} ?>Un message de retour<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />

						
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