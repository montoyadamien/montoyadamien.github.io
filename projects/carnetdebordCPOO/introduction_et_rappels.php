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
			<div id="inTdBandeau" class="inTdBandeauCase">
				<h1 class="h1White">Introduction et rappels</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div class="inTdTitle"><h2>Introduction</h2></div>
			<div class="inTdBloc">
				<p>
				Pour développer une application certaines méthodes et techniques se doivent d’être apprises. En effet la lecture et la compréhension du cahier des charges est une étape importante qui permettra de bien cerner toutes les fonctionnalités du projet et de produire une application correspondante aux attentes du client. Cet étape d’analyse est assistée par la présence d’outils et de méthodes tel que les user stories ainsi que certains diagrammes notamment les diagrammes UML et les design pattern (patrons de conception). Ses concepts permettront par la suite de produire des documents permettant de bien mettre en évidences les attentes du client ainsi que de visualiser en partie l’architecture de l’application. Au cours de ces TD nous verrons principalement l’étude des diagrammes de classes ainsi que les diagrammes de cas d’utilisation et de séquence mais d’abord nous verrons quelques rappels et explications.
				</p>
			</div>
			
			<div class="inTdTitle"><h2>Le diagramme de cas d'utilisation</h2></div>
			<div class="inTdBloc">
				<p>
				Les diagrammes de cas d’utilisation permettent de définir le système du point de vue des utilisateurs (et non depuis le nôtre, celui des développeurs !). Il permet également de définir les limites du système. Ils nous permettent enfin de structurer les besoins, grâce au cahier des charges, ainsi que tout le reste du développement.
				</p>
			</div>

			<div class="inTdTitle"><h2>Le diagramme de classes</h2></div>
			<div class="inTdBloc">
				<p>
				Les diagrammes de classes sont réalisé grâce à la détermination des concepts. On effectue une simple analyse grammaticale de la description textuelle des cas d’utilisation. En général, les noms représentent des concepts ou des attributs alors que les verbes représentent des comportements (opérations, méthodes).
				</p>
			</div>

			<div class="inTdTitle"><h2>Le diagramme de séquence</h2></div>
			<div class="inTdBloc">
				<p>
				Les diagrammes de séquence nous permettent de décrire le comportement dynamique (comportement dans le temps) d’un système dans un diagramme. Ils permettent également de montrer comment des sociétés d’objets peuvent collaborer pour réaliser les cas d’utilisation.<br /> 
				On y précise le contenu d’un cas d’utilisation en déroulant les scenarios (flots d’évènements). En général, on y décrit que les scénarios les plus représentatifs
				</p>
			</div>

			<div class="inTdTitle"><h2>Les design pattern</h2></div>
			<div class="inTdBloc">
				<p>
				En génie Logiciel, un design pattern (patron de conception en anglais) est un concept destiné à résoudre les problèmes récurrents suivant le paradigme objet. Les patrons de conception décrivent des solutions standards pour répondre à des problèmes d'architecture et de conception des logiciels (source Wikipédia).
				</p>
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