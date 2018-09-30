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
			<div id="inTdBandeau" class="inTdBandeauModCod">
				<h1 class="h1White">Modélisation et codage</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div id="inTdBandTime">
				<div><img src="img/tds/tdsTime.png" alt="time" />1 Heure 20 Minutes</div>
				<div><img src="img/tds/tdsSoft.png" alt="logiciel" />Modélio</div>
			</div>
			
			<div class="inTdTitle"><h2>SpyMe</h2></div>
			<div class="inTdBloc">
			<div class="enonce"><p>
				On décide de produire une nouvelle application telle que :<br /><br />

				Un internaute peut s'inscrire à l'application en utilisant son compte facebook ou twitter ou un formulaire dédié.
				<br />Un membre peut enregistrer son parcours :
				<br />il déclare sur son téléphone qu'il commence à enregistrer un parcours;
				<br />toutes les 10 secondes, un nouveau point est automatiquement créé en demandant au GPS du téléphone sa position et l'heure actuelle; le point est ajouté au parcours en cours; Les coordonnées GPS sont des coordonnées sur une sphère et pas des coordonnées cartésiennes, cependant dans le cadre de ce TD, travaillez “simplement” avec des coordonnées cartésiennes;
				<br />le membre signale la fin du parcours qui est automatiquement enregistré dans sa base de parcours.
				<br />Un membre peut visualiser les parcours passés : par la distance parcourue, la durée, la vitesse moyenne, la date (jour et heure), le type d'entrainement, …
				<br />En sélectionnant un parcours, un membre peut visualiser un parcours en utilisant googleMAP.
				<br />Un membre peut préciser qu'il veut enregistrer un parcours d'entrainement; dans ce cas, avant le départ, il précise le mode d'entrainement. Pour chaque mode, un temps de relevé des points différent est prévu : marche rapide (2mn), course à pied (10s), vélos (5s), foot (10s), …
				<br />Un membre peut créer son propre mode d'entrainement en précisant les temps de consultation etc.
				<br />Un membre qui a précisé son compte twitter, peut demander en début de parcours, que chaque relevé de point soit automatiquement “tweetté” avec le message “Je suis en position …”.
				<br />Pouvez-vous étendre votre application pour donner la vitesse moyenne entre deux points donnés d'un parcours?

				<br /><br /><span>Questions :</span>
				<br />Evidemment vous commencez par identifier les cas d'utilisation de haut niveau. Mais ensuite vous pouvez travailler comme bon vous semble.

				<br /><strong>1 - </strong>Définir le diagramme de cas d'utilisation
				<br /><strong>2 - </strong>“Bipbip” s'inscrit en utilisant son compte “Facebook”;
				<br /><strong>3 - </strong>Définir le diagramme de classes
				<br /><strong>4 - </strong>Définir le diagramme de séquence correspondant à l'enregistrement d'un parcours par un membre, vous pouvez vous aider du diagramme ci-après.
				<br /><strong>5 - </strong>Implémenter ce scénario en vous aidant des codes ci-après. En particulier, comme nous ne disposons pas du GPS dans l'exemple donné ci-après c'est l'utilisateur qui saisit sa position. De même comme vous ne connaissez pas encore la parallèlisation des tâches on demande à chaque relevé de position, s'il faut ou non continuer à enregistrer le parcours.
			</p></div>
			
			<p><strong>1 - </strong>Voici donc le diagramme de cas d'utilisation :</p>
			<img src="img/tds/codeAvance/cas.png" alt="img" />
			
			<p><strong>2 - </strong>Voici les flots associé au cas d'utilisation s'inscrire via Facebook :<br /><br />
			<strong>Flot nominal : </strong><br />
			1)	Le client clique sur s’inscrire <br />
			2)	Le système affiche une page qui propose trois manières de s’inscrire Facebook, Twitter, formulaire d’inscription<br />
			3)	Bipbip clique sur l’icône Facebook pour pouvoir s’inscrire via Facebook<br />
			4)	Bipbip se connecte sur son compte Facebook en entrant son identifiant et son mot de passe <br />
			5)	Bipbip valide sa connexion et accepte l’inscription via Facebook <br />
			6)	Facebook valide la connexion <br />
			7)	Le système confirme l’inscription <br /><br />

			<strong>Flot alternatif :</strong><br />
			5) 	a) Bipbip n’insère pas le bon mot de passe ou/et le bon identifiant.<br />
				&emsp;« Inscription invalide veuillez-vous recliquez sur l’icône de Facebook et réessaierez vos identifiants »<br /> 
				&emsp;(Libre interprétation de notre part : on imagine que Facebook ferme directement la page après que Bipbip ait inscrit de mauvais identifiants.). Bipbip retourne donc à l’étape 2<br /><br />

			5) b) Les conditions de Facebook n’ont pas été accepté<br />
				&emsp;   « Veuillez-vous réinscrire et acceptez les conditions de confidentialité de Facebook »<br />
				&emsp;	  Bipbip retourne à l’étape 2<br /><br />

			<strong>Flot d’erreurs :</strong><br />
			3) a) Le système ne propose pas Facebook<br /> 
			4) a) Le clique ne redirige pas vers une autre page<br />
			6) a) Facebook empêche aux clients de s’inscrire <br />
			7) a) Le système ne confirme pas l’inscription 
			</p>
			
			<p><strong>3 - </strong>Voici donc le diagramme de classes :</p>
			<img src="img/tds/codeAvance/class.jpg" alt="img" />
			
			<p><strong>4 - </strong>Voici donc le diagramme de séquence :</p>
			<img src="img/tds/codeAvance/seq.png" alt="img" />
			
			<p><strong>5 - </strong> Voici donc le code :</p>
			
			<div class="code">
			public class Internaute{<br />
				&emsp; &emsp; public void Inscrire(){}<br />
				&emsp; &emsp; public String toString(){}<br />
			}<br /><br />

			public class Membre{	<br />
				&emsp; &emsp; private String Login;<br />
				&emsp; &emsp; private String Mot_de_passe;<br /><br />

				&emsp; &emsp; private void SeConnecter(String Log, String mdp){}<br />
				&emsp; &emsp; public void LierSonCompte(String reseauxSociaux){}	<br />
				&emsp; &emsp; public Parcours Creerparcours(){}<br />
				&emsp; &emsp; private Parcours ParcoursDefault(){}<br />
				&emsp; &emsp; public void Choisirparcours(String Parcours){}<br />
				&emsp; &emsp; public void CreerModeEntrainnement(){}	<br />
				&emsp; &emsp; public void VisualiserParcours(String Parcours){}<br />
				&emsp; &emsp; public String toString(){}<br />
				&emsp; &emsp; private void ModeEntrainnementDefault(){}<br />
				&emsp; &emsp; private void PartagerSaPosition(){}<br />
				&emsp; &emsp; public void EnregistrerParcours(){}<br />
			}<br /><br />

			public class Parcours{<br />
				&emsp; &emsp; private String Nom;<br />
				&emsp; &emsp; private int Duree;<br />
				&emsp; &emsp; private int Distance;<br />
				&emsp; &emsp; private String PointDepart;<br />
				&emsp; &emsp; private String PointFinal;<br />
				&emsp; &emsp; private Date date;<br />

				&emsp; &emsp; public int DistanceRestante(String PointDepart, String PointFinale){}<br />
				&emsp; &emsp; public int TempsRestante(){}<br />
				&emsp; &emsp; public int DureeRestane(){}	<br />
				&emsp; &emsp; public String toString(){}<br />
				&emsp; &emsp; Public int CalculVitesseMoy(int Distance1, int Distance2){}<br />
			}<br /><br />

			public class ModeEntrainnement{<br />
				&emsp; &emsp; private String Duree;<br />
				&emsp; &emsp; private String Nom;<br />
				&emsp; &emsp; private String Difficulte;<br /><br />

				&emsp; &emsp; public String toString(){}<br />
			}<br /><br />


			public class Internaute{<br />
				&emsp; &emsp; public void Inscrire(){}<br />
				&emsp; &emsp; public String toString(){}<br />
			}<br /><br />

			public class Membre{	<br />
				&emsp; &emsp; private String Login;<br />
				&emsp; &emsp; private String Mot_de_passe;<br /><br />

				&emsp; &emsp; private void SeConnecter(String Log, String mdp){}<br />
				&emsp; &emsp; public void LierSonCompte(String reseauxSociaux){}	<br />	
				&emsp; &emsp; public Parcours Creerparcours(){}<br />
				&emsp; &emsp; private Parcours ParcoursDefault(){}<br />
				&emsp; &emsp; public void Choisirparcours(String Parcours){}<br />
				&emsp; &emsp; public void CreerModeEntrainnement(){}		<br />			
				&emsp; &emsp; public void VisualiserParcours(String Parcours){}<br />
				&emsp; &emsp; public String toString(){}<br />
				&emsp; &emsp; private void ModeEntrainnementDefault(){}<br />
				&emsp; &emsp; private void PartagerSaPosition(){}<br />
				&emsp; &emsp; public void EnregistrerParcours(){}<br />
			}<br /><br />

			public class Parcours{<br />
				&emsp; &emsp; private String Nom;<br />
				&emsp; &emsp; private int Duree;<br />
				&emsp; &emsp; private int Distance;<br />
				&emsp; &emsp; private String PointDepart;<br />
				&emsp; &emsp; private String PointFinal;<br />
				&emsp; &emsp; private Date date;<br /><br />

				&emsp; &emsp; public int DistanceRestante(String PointDepart, String PointFinale){}<br />
				&emsp; &emsp; public int TempsRestante(){}<br />
				&emsp; &emsp; public int DureeRestane(){}	<br />
				&emsp; &emsp; public String toString(){}<br />
				&emsp; &emsp; Public int CalculVitesseMoy(int Distance1, int Distance2){}<br />
			}<br /><br />

			public class ModeEntrainnement{<br />
				&emsp; &emsp; private String Duree;<br />
				&emsp; &emsp; private String Nom;<br />
				&emsp; &emsp; private String Difficulte;<br /><br />

				&emsp; &emsp; public String toString(){}<br />
			}<br />
			
			</div>
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