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
			<div id="inTdBandeau" class="inTdBandeauCase">
				<h1 class="h1White">Diagramme de cas d'utilisation</h1>	
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			
			<div id="inTdBandTime">
				<div><img src="img/tds/tdsTime.png" alt="time" />6 Heures</div>
				<div><img src="img/tds/tdsSoft.png" alt="logiciel" />Modélio</div>
			</div>
			
			<div class="inTdTitle"><h2>Interêt</h2></div>
			<div class="inTdBloc">
					<p>Les diagrammes de cas d’utilisation permettent de définir le système du point de vue des utilisateurs (et non depuis le nôtre, celui des développeurs !). <br />
					Il permet également de définir les limites du système. Ils nous permettent enfin de structurer les besoins, grâce au cahier des charges, ainsi que tout le reste du développement. <br />
					Il est également important de noter que les cas d’utilisation sont décrits en utilisant les termes du glossaire.</p>
			</div>
			
			<div class="inTdTitle"><h2>Mise en pratique - Diagrammes de cas d'utilisation</h2></div>
			<div class="inTdBloc">
			<h3>Je comprends</h3>
			<div class="enonce">
				<p>Lors du premier TD nous avions pour énoncé des questions simples par rapport au diagramme qui suit :<br />
				<img src="img/tds/exoUser.png" alt="user_case" /><br />
				<strong>1 -</strong> Quels sont les acteurs ?<br />
				<span>Acteur : </span>Un acteur est une personne ou une chose qui va interagir avec le système. Schématisé par un bonhomme fil de fer<br />
				</p>
				<div class="aSavoir">
				A retenir :<br />
				Il est important de bien comprendre que les acteurs vont intéragir avec le système, ils peuvent être humain ou non !.<br /><br />
				
				Il faut fait attention à ce que les acteurs intéragissent directement avec le système et ne pas ajouter n'importe qui en tant qu'acteur.
				</div>
				
				<p>
				<br /><strong>2 -</strong> Quelles sont les relations entre les acteurs?<br />
				<strong>3 -</strong> A votre avis, la banque représente quel type d'acteur :acteur humain ou système externe?<br />
				<strong>4 -</strong> Est-ce à vous de mettre en oeuvre la banque? En quoi est-ce important pour vous (en tant qu'informaticien) de modéliser cet acteur?<br />
				<strong>5 -</strong> Quels sont les cas d'utilisation?<br />
				<strong>6 -</strong> Que peut faire un administrateur?<br />
				<strong>7 -</strong> Quels acteurs interviennent dans ces différents cas d'utilisation?<br />
				<strong>8 -</strong> Que visualise le cadre autour des cas d'utilisation?<br />
				<strong>9 -</strong> Qu'exprime les cardinalités?<br />
				<strong>10 -</strong> A quoi sert un diagramme de cas d'utilisation ?<br />
				</p>
				</div>
				
				<p><span>Réponses :</span><br />
				<strong>1 -</strong> Les acteurs sont Customer, Administrateur et Bank.<br />
				<strong>2 -</strong> D'après la flèche entre administrateur et customer, l'administrateur est également customer.<br />
				<strong>3 -</strong> Bank est un acteur externe car elle se situe à droite de la frontière.<br />
				<strong>4 -</strong> Non car Bank est un acteur externe, elle possède donc son propre moyen de fonctionner. Il est important de la modéliser car elle rentre en interaction avec notre système.<br />
				<strong>5 -</strong> Les cas d'utilisation sont Withdraw, Transfer Funds, Deposit Money, Register ATM at bank et Read log<br />
				<span>Cas d'utilisation : </span>Motif cohérent de comportement réalisé par le système. Schématisé par une bulle incluant le mot à l'infinitif décrivant l'action.<br />
				<br /><strong>6 -</strong> Administrateur possède tout les droits de Customer, il peut donc faire Register ATM at bank, Read log, Withdraw, Transfer Funds et Deposit Money.<br />
				<strong>7 -</strong> Customer intervient dans Withdraw, Transfer Funds, Deposite Money. Adrministrateur intervient dans Withdraw, Transfer Funds, Deposite Money, Register ATM at bank et Read log.
				Bank intervient dans Deposit Money et Register ATm at bank.<br />
				<strong>8 -</strong> Le cadre autour du graphique est appellé frontière du système, il permet la séparation entre le système et les acteurs.<br />
				<strong>9 -</strong> Les cardinalités du coté des acteurs expriment le nombre d'actions que peut faire l'acteur en même temps et du coté des user case le nombre d'action qui peut être effectuée à la fois en fonction de l'acteur.<br />
				<strong>10 -</strong> Le diagramme de cas d'utilisation sert à définir le système du point de vue des utilisateurs, de définir les limites précises du système ainsi que structurer les besoins du logiciel en fonction du cahier des charges.<br />
				
				<br />Et vous ? Auriez-vous eu tout juste ? 
				</p>
				
				<h3>Je m'implique, j'apprends</h3>
				<div class="enonce">
				<p>Dans cette partie et dans plusieurs prochains exercices il sera question d'une galerie d'art. L'énoncé donné etait le suivant :<br />
				Nous prenons l'exemple d'une “galerie d'art virtuelle”.<br/>
				Nous identifions à présent les principaux cas d'utilisation. Pour des raisons de simplification, nous partons de l'énoncé suivant qui est une extraction d'un cahier des charges.<br/><br/>

				(1) Nous voulons informatiser une galerie d'art, par laquelle nous souhaitons vendre des oeuvres d'arts à des clients. Les paiements doivent être sécurisés en utilisant le système de paiement externe “chaimoinscheir”.<br/>
				(2) Les oeuvres et les artistes sont gérés par les administrateurs via des interfaces adaptées. <br/>
				(3) Un internaute doit pouvoir s'inscrire sur le site pour devenir client. Deux clients différents ne peuvent pas avoir la même adresse email. <br/>
				(4) Un internaute peut naviguer sur le site : retrouver un artiste par son nom, visualiser les oeuvres par artiste ou par catégorie. <br/>
				(5) Les clients peuvent voter pour les oeuvres ou les artistes qu'ils préfèrent. <br/>
				(6) Une fois par jour, un super-administrateur déclenche une opération de sauvegarde de la galerie.<br/>
				(7) L'identification des clients fait partie du système de la galerie.<br/>
				(8) Un client peut téléphoner à la secrétaire pour demander l'édition d'une facture consécutive à une vente passée.<br/>
				
				L'énoncé donné décrit votre étude de cas. Vous considérerez cette description comme exhaustive.<br /><br :>

				<strong>1 -</strong> En analysant chacune des phrases de l'énoncé identifiez les acteurs.<br />
				<strong>2 - </strong>En analysant chacune des phrases de l'énoncé, déterminez les grands cas d'utilisation de la galerie d'art et les dessiner.<br /><br />
				</p></div><p>
				<span>Réponses :</span><br />
				<strong>1 -</strong> Les clients sont des acteurs car il intéragissent avec la galerie. Le système de paiement est un acteur externe "chaimoinscher". <br />
					Les artistes ne sont pas des acteurs car ils ne rentrent pas en intéraction avec le système en revanche les administrateur eux sont bien des acteurs.<br />
					Un internaute est également un acteur différent d'un client. On suppose qu'un client ne peut pas avoir les mêmes droit qu'un internaute car celui-ci ne peut pas s'inscrire.<br />
					Le super-administrateur n'est pas un administrateur, c'est donc un nouvel acteur<br />
					La secrétaire peut éditer une facture, elle intéragit donc avec le système, c'est donc un acteur.<br />
				<br />
				<strong>2 - </strong>Un client doit pouvoir acheter des oeuvres. "Chaimoinscheir" intéragit avec l'achat des oeuvres car il doit sécuriser cet achat. On a donc un user case "Paiement".<br />
						Un administrateur doit pouvoir gérer des oeuvres et des artites. On a donc un use case "Gérer artistes/oeuvre".<br />
						Un internaute doit pouvoir s'inscrire pour devenir client on aura donc un use case "Devenir client".<br />
						Un client doit pouvoir voter pour les oeuvres et les artistes qu'il préfère, on a donc un use case "Voter".<br />
						Un super-administrateur doit pouvoir déclencher une sauvegarde de la galerie on aura donc un use case "Sauvegarder".<br />
						Un client doit pouvoir s'identifier, on aura donc un use case "S'identifier".<br />
						Un internaute et le client doivent également pouvoir naviguer sur la galerie, on aura donc un use case "Naviguer sur le site".<br />
						<img src="img/tds/diagUserCase/1.png" alt="usecase"/> 
				</p>
				
				<h3>Fixer le vocabulaire :</strong> Glossaire</h3> 
				<p>
				Il s'agit dans cette partie de définir les termes que l'on va utiliser lors de la conception du projet :<br />
				<strong>Client :</strong> fait qu'un internaute est un compte.<br />
				<strong>Administrateur :</strong> utilisateur ayant des droits de gestion.<br />
				<strong>Super administrateur :</strong> utilisateur pouvant avoir les droits d'administrateur et de sauvegarde.<br />
				<strong>Chaimoincheir :</strong> système de paiement externe.<br />
				<strong>S’identifier :</strong> le client peut se connecter.<br />
				<strong>Paiement :</strong> le client peut acqerir une œuvre, validée et payée.<br />
				<strong>Voter :</strong> le client peut sélectionner son œuvre favorite.<br />
				<strong>Sauvegarder :</strong> le super administrateur peut enregistrer la galerie en cas de perte de donnée une fois par jour.<br />
				</p>
				
				<h3>Description textuelle</h3>
				<div class="enonce">
				<p>Pour cette partie de l'exercice, l'énoncé etait le suivant :<br /><br />
				<strong>1 -</strong> Décrivez le scénario nominal correspondant au cas d'utilisation dans la partie description “Un internaute s'inscrit pour devenir client de la galerie d'art”.<br />
				<span>Scénario nominal (=flot nominal, flot basique) :</span> suite des évenement qu'effectue un acteur lors d'un cas d'utilisation sans les erreurs possibles.<br />
				<br /><strong>2 -</strong> Décrivez les flots alternatifs correspondant au cas d'utilisation “Un internaute s'inscrit pour devenir client de la galerie d'art” lorsque les données saisies sont invalides ou que l'internaute est déjà inscrit.<br />
				<span>Flot alternatif : </span>suite des évenement qu'effectue un acteur lorsque celui-ci ne suis pas le flot nominal.<br />
				<br /><strong>3 -</strong> Décrivez le cas d'utilisation “acheter des oeuvres” :<br />
				 - Précisez les pré-conditions, post-conditions et les propriétés non-fonctionnelles (par exemple, la sécurité est importante)<br />
				 - Flot Nominal<br />
				 - Flots alternatifs (Vous vous limiterez à un cas).<br />
				 - Flots d'erreur (Vous vous limiterez à un cas).<br />
				<span>Flot d'erreur : </span>suite des évenement qu'effectue un acteur lorsque qu'une erreur est présente.<br />
				</p>
				</div>
				<p><span>Réponses :</span><br />
				<strong>1 - Voici le flot nominal :</strong><br />
					1) Internaute : se rend sur le site web<br />
					2) Internaute : clique sur le bouton<br />
					3) système : ouvre une page<br />
					4) Internaute : l'internaute rempli les champs<br />
					5) Système : vérifie les champs<br />
					6) Système : valide compte et crée le compte<br /><br />
				
				<strong>2 - Voici le flot alternatif :</strong><br />
					A5a) Adresse mail déjà utilisée<br />
					-->	1. L'utilisateur est invité a rentrer un autre mail<br />
					--> 2. Retour étape 4<br />
					 A5b) Les champs sont mal renseignés<br />
					-->	1. L’utilisateur est invité à corriger les champs<br />
					--> 2. Retour étape 4<br /><br />

				<strong>3 - Flot nominal du user case "Paiement" :</strong><br />
				Précondition : <br />
				l’internaute doit avoir un compte<br />
				<span>Précondition : </span> état dans lequel le système doit être avant le flot nominal <br /><br />
				
				1) Client : se rend sur le site web<br />
				2) Client : se connecte<br />
				3) Client : se rend sur la catégorie œuvres<br />
				4) Client : Clique sur un bouton ajouter au panier<br />
				5) Système : vérifie s’il reste en stock<br />
				6) Système : ajoute les articles au panier<br />
				7) Client : valide le panier<br />
				8) Système : redirige vers système chaimoinscheir sécuristé<br />
				9) Client : effectue le paiement via chaimoinscheir (coordonnées bancaires déjà enregistrées)<br />
				10) Système : ajoute les œuvres au compte client<br /><br />
				
				<strong>Flot alternatif :</strong><br />
				A5) Si le produit n’est plus en stock<br />
				-->	1.L’utilisateur recoit un message<br />
				B7) Le client n’a choisi aucune œuvre<br />
				-->	1. L’utilisateur est renvoyé sur la galerie<br />
				--> 2. Retour étape 3<br /><br />

				<strong>Flot d’erreur :</strong><br />
				A8) Système chaimoinscheir n’est pas disponible<br /><br />
				
				<strong>Postcondition :</strong><br />
				Les œuvres vendus seront enlevées du stock<br />
				Les factures seront faites<br />
				<span>Postcondition : </span>état dans lequel le système doit être après un flot nominal<br /><br />
				
				<strong>Propriétés non fonctionnelles :</strong><br />
				Temps de réponse : la transaction entre la demande d’achat et la validation de paiement ne peut excéder 15 minutes<br />
				Sécurité : la navigation du client sera sécursée<br />
				Concurrence : les personnes peuvent mettre dans panier le meme produit<br />
				Disponibilité : 7j/7, 24h/24<br />
				Confidentialité : les données du client ne seront connus que du client et du marchand<br />	
				</p><br />
				
				<div class="aSavoir">A retenir :<br />
					Le flot nominal est la suite d'action que va effectuer un utilisateur s'il n'y a aucun problème.<br />
					Le flot alternatif va avoir lieu si l'utilisateur fait une erreur.<br />
					Le flot d'erreur va avoir lieu si le système de ne fonctionne pas.<br />
					La précondition est l'état du système avant d'effectuer un flot nominal.<br />
					La précondition est l'état du système après le flot nominal.<br />
				</div>
				
				
				<div class="inTdTitle"><h2>Mise en pratique - Diagrammes de cas d'utilisation avancés</h2></div>
				<h3>Préparation aux tests de validation : Je m'implique, J'apprends</h3>
				<div class="enonce">
				<p>
				<strong>1 - </strong>Associer à chaque étape du scénario “nominal” de la semaine dernière, les données correspondantes. Assurez-vous que votre client (votre enseignant) est d'accord sur les données que vous proposez. Ces exemples de données vous serviront (i) à identifier les types de données manipulées et (ii) à la fin du projet à “valider” les cas d'utilisation. Vous faites cela dans la partie description de vos cas d'utilisation.
				<br /><strong>2 - </strong>Associer à chaque étape des scénarii “alternatifs” de la semaine dernière, les données correspondantes.
				<br />
				<span>Réponses : </span></p>
				<div class="aSavoir">A retenir :<br />
				Les données à entrer sont effectuée par des test de validation décrits comme suivant :<br />
				Etape : le numéro et nom du scénario<br />
				Procédure : comment est effectué scénario, dans le cas d'un acteur on lui attribut un nom<br />
				Résultat : ce que la procédure produit<br />
				</div>
				</div>
				<p>
				<strong>1 - Voici les données :</strong><br />
				Etape : 4)Devenir client<br />
				Prodécudre : L'utilisateur Stanislas se rend sur la page d'inscription. Il rempli les champs Nom:Da Silva Goncalves, Prénom:Stanislas, Mail:stanouSilva@gmail.com, Téléphone:3630, Date de naissance.:26/04/1998<br />
				Résultat : Da Silva Goncalves, Stanislas, stanouSilva@gmail.com, 3630, 26/04/1998, ceci sera écrit dans chaque champ<br /><br />

				Etape : 5)Le système vérifie les champs<br />
				Procédure : Le système vérifie les champs : Nom : ne doit pas contenir de chiffre, Prénom : ne doit pas contenir de chiffre, Mot de passe : ************, mail:doit ête du format *@*.*, téléphone:doit contenir que des chiffres, date de naissance: choisir dans le calendrier, l'utilisateur peut ête agé au min de 18 ans.<br />
				Résultat : Les champs sont correctes, cela affiche "Compte enregistré".<br /><br />

				<strong>2 - Voici les flots alternatifs :</strong><br />
				A5a) Le système vérifie les champs : adresse mail déjà utilisée<br />
				Données : Stanislas a rentré une adresse mail déjà utilisée, stanouSilva@gmail.com<br />
				Résultats : Le systeme affiche le message "L'adresse mail est déjà utilisée" puis l'utilisateur est invité à changer le champs.<br />
				A5b) Les système vérifie les champs : les champs ne respectent pas les conditions<br />
				Données : Stanislas a rentré des informations sans respecter les conditions.<br />
				Résultats : Le système affiche le message ‘les champs suivants ont été mal renseignés : Nom, Prénom, mail, calendrier (selon les choix de l’utilisateur<br />
				</p>
				
				<h3>Relations entre cas d'utilisation : Je comprends</h3>
				<div class="enonce">
				<p>Les questions suivantes seront faites en fonction de ce diagramme de cas d'utilisation :</p>
				<img src="img/tds/diagUserCase/comprend2.gif" atl="img" />
				<p>
				<strong>1 - </strong>Quelle relation y-a-t-il entre Place Order et Phone Order? Est-ce que tout passage de commande doit se faire par téléphone? Est-ce une extension d'un passage de commande?<br />
				<strong>2 - </strong>Est-ce qu'une demande de catalogue doit toujours être réalisée lorsque l'on passe une commande? Ou bien est-ce une possibilité mais elle n'est pas une obligation?<br />
				<strong>3 - </strong>Est-ce que la saisie des informations du client doit toujours être réalisée lorsque l'on passe une commande? Ou bien est-ce une possibilité mais elle n'est pas une obligation?<br />
				</p>
					
				<p><span>Généralisation :</strong> </span>L'acteur doit choisir une action fille a réaliser pour effectuer l'action mère. C'est un choix qui s'impose à lui.</p>
				<p><span>Include :</strong> </span>L'acteur doit effectuer l'action suivant la flèche pour pouvoir effectuer l'action précédent la flèche. C'est une obligation qui s'impose a lui</p>
				<p><span>Extend :</strong> </span>L'acteur peut effectuer une des actions précédent la/les flèche(s) pour effectuer l'action suivant la flèche. C'est une possibilité qui s'offre à lui.</p>
				</div>
				<p>
				<strong>1 - Interprétation : </strong>
				Tout d’abord on vous rappelle que place Order signifie : passer commande.<br />
				Du coup internet Ordrer, phone Order sont deux manières de passer commande soit par internet soit par téléphone en fonction de l'utilisateur.<br />
				Phone Order est donc une généralisation de Place Order car la flèche (pleine) part de Phone Order vers Place Order. Les personnes capables de passer la commande par téléphone sont le customer et l’internet customer (utilisateurs). 
				Vous l’aurez donc compris un internet Customer est une généralisation de Customer, internet customer possède donc les mêmes droits qu’un customer.<br />

				<strong>Les réponses claires  : </strong>
				Phone order est ici une généralisation de place Order grâce à la flèche pleine.<br />
				Non on peut passer commande soit pas téléphone soit par internet. <br />
				Non lorsqu’il s’agit d’une extension il y a une flèche en pointillé avec marqué entre crochets extends comme dans le cas d’utilisation de Request Catalog.<br /><br />
				
				<strong>2 - </strong>Il s’agit d’une extension comme expliqué aux dessus, le Customer a donc le choix de prendre ou non le catalogue.<br /><br />
				
				<strong>3 - </strong>Ici en revanche il s’agit d’une flèche en pointillé avec marquée entre crochets include il s’agit donc bien ici d’une obligation. Si on passe une commande on est obligé de rentrer des données.<br />
				
				</p>
				
				<div class="aSavoir">A retenir :<br />
				La généralisation est un choix. Schématisé par une flèche allant des choix vers l'action à réaliser.<br />
				L'include est un obligation, schémmatisé par une flèche en pointillés allant de l'action que à effectuer vers l'action obligatoire.<br />
				L'extend est une une possibilité, schématisé par une flèche en pointillés allant de l'action possible vers l'action a faire.<br /><br />
				
				Attention, il ne faut pas confondre les différents flèches, la généralisation est une flèche se terminant avec un triangles, l'include est une flèche normale et l'extend est une flèche pointillée.
				</div>
				
				<h3>Je m'implique, J'apprends</h3>
				<div class="enonce">
				<p>Dans cet exercice la il va faloir modifier le diagramme de cas d'utilisation de la galerie et ajouter quelques contraintes :<br />
				Pour acheter ou voter, un client doit s'être authentifié;<br />
				Un internaute qui désire voter est invité à s'inscrire sur le site;<br />
				La visualisation des oeuvres peut consister en une navigation “classique” dans les oeuvres, une navigation dans un espace virtuel en 3D où les oeuvres sont présentées par thèmes, un catalogue “virtuel”, ou des options de recherche avancées.<br />
				Un super administrateur est un administrateur.<br />
				Avant de valider sa commande un client peut consulter la popularité des oeuvres dans son panier.<br /><br />
				</p>
				</div>
				<p>
				Il y aura donc un include allant de "Voter" vers "S'identifier et de même pour "Paiement"<br />
				Il y aura 3 généralisation, une pour chaque mode de navigation vers le user case "Naviguer sur le site"<br />
				Il y aura un extend allant de "Recherche avancée" vers "Naviguer sur le site"<br />
				Il y aura également un généralisation allant de super administrateur vers administrateur.<br />
				Il y aura ensuite un extend allant de consulter popularité vers paiement.<br />
				
				Le diagramme aura donc cete forme la au final :
				</p>
				<img src="img/tds/diagUserCase/2.png" alt="diag" />
				
				<h3>Associer une interface à un cas d'utilisation</h3>
				<div class="enonce">
				<p>Dans ce dernier exercice, il faudra dessiner une interface pour le cas d'utilisation “Un internaute s'inscrit pour devenir client de la galerie d'art”. <br />
				Pour cet exercice, nous avons utilisé le logiciel Paint pour réaliser l'interface.<br /><br />
				</p></div><p>
				L'utilisateur est sur la page d'acceuil de la galerie :<br />
				<img src="img/tds/diagUserCase/art1.png" alt="art" />
				
				L'utilisateur est sur la page d'inscription et rentre ses données, flot nominal :<br />
				<img src="img/tds/diagUserCase/art2.png" alt="art" />
				
				L'utilisateur n'a pas mis les mêmes mots de passe, flot alternatif :<br />
				<img src="img/tds/diagUserCase/art3.png" alt="art" />
				
				<br /><br />
				Voila, vous avez maintenant les notions qui vous permettront de définir les besoins des utilisateurs grâce au cahier des charges !
				
				</p>
				
				<div class="inTdTitle"><h2>Évaluation</h2></div>
				<div class="inTdBloc">
					<form method="post" action="#eval">
							<?php
								if(!isset($rep)){ $rep = 0;}
							?>
							<p><strong>Question 1 :</strong> Le diagramme de cas d’utilisation défini le système du point de vue : <br />
							<input type="radio" name="q1" value="1" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Des développeurs<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="2" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 2){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q1'])){echo '<span class="true">';} ?>Des utilisateurs<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="3" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Du client<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="4" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Un peu des trois<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 2 :</strong> Le diagramme de cas d’utilisation sert à : <br />
							<input type="radio" name="q2" value="1" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 1){echo 'checked'; $rep++; }} ?>><?php if(isset($_POST['q2'])){echo '<span class="true">';} ?>Définir les limites précises du système<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							<input type="radio" name="q2" value="3" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Donner du design au cahier des charges<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							<input type="radio" name="q2" value="2" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Déterminer les enchainements d'actions<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 3 :</strong> En vous basant sur ce diagramme, : 
							<img src="img/tds/diagUserCase/quizz1.png" alt="quizz" />
							<input type="radio" name="q3" value="1" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Il s'agit d'un acteur<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							<input type="radio" name="q3" value="2" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Il s'agit de la frontière du diagramme<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							<input type="radio" name="q3" value="3" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 3){echo 'checked'; $rep++; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="true">';} ?>Il s'agit d'un cas d'utilisation<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 4 :</strong> En vous basant sur ce diagramme, l’acteur A1, pour réaliser l’action B1 :
							<img src="img/tds/diagUserCase/quizz2.png" alt="quizz" />
							<input type="radio" name="q4" value="1" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Doit réaliser B1.1 ET B1.2<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="2" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 2){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q4'])){echo '<span class="true">';} ?>Doit réaliser B1.1 OU B1.2<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="3" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Peut réaliser B1.1 ET B1.2<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="4" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Peut réaliser B1.1 OU B1.2<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />

							<br /><strong>Question 5 :</strong> En vous basant sur ce diagramme,  :
							<img src="img/tds/diagUserCase/quizz3.png" alt="quizz" />
							<input type="radio" name="q5" value="1" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>L’acteur A1 peut réaliser les actions B1, B2 et B3.<?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
							<input type="radio" name="q5" value="2" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 2){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q5'])){echo '<span class="true">';} ?>L’acteur A2 peut réaliser les actions B1, B2 et B3<?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
							<input type="radio" name="q5" value="3" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>L’acteur A2 peut seulement réaliser l’action B3<?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
							<input type="radio" name="q5" value="4" <?php if(isset($_POST['q5'])){if($_POST['q5'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q5'])){echo '<span class="false">';} ?>L’acteur A1 peut seulement réaliser l’action B3<?php if(isset($_POST['q5'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 6 :</strong> En vous basant sur ce diagramme,  :
							<img src="img/tds/diagUserCase/quizz4.png" alt="quizz" />
							<input type="radio" name="q6" value="1" <?php if(isset($_POST['q6'])){if($_POST['q6'] == 1){echo 'checked';$rep++;}} ?>><?php if(isset($_POST['q6'])){echo '<span class="true">';} ?>Il faut réaliser l’action A2 afin de réaliser l’action A1<?php if(isset($_POST['q6'])){echo '</span>';} ?><br />
							<input type="radio" name="q6" value="2" <?php if(isset($_POST['q6'])){if($_POST['q6'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q6'])){echo '<span class="false">';} ?>Il faut réaliser l’action A1 afin de réaliser l’action A2<?php if(isset($_POST['q6'])){echo '</span>';} ?><br />
							<input type="radio" name="q6" value="3" <?php if(isset($_POST['q6'])){if($_POST['q6'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q6'])){echo '<span class="false">';} ?>On peut réaliser l’action A1 en réalisant l’action A2.<?php if(isset($_POST['q6'])){echo '</span>';} ?><br />
							<input type="radio" name="q6" value="4" <?php if(isset($_POST['q6'])){if($_POST['q6'] == 4){echo 'checked'; }} ?>><?php if(isset($_POST['q6'])){echo '<span class="false">';} ?>On peut réaliser l’action A2 en réalisant l’action A1<?php if(isset($_POST['q6'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 7 :</strong> En vous basant sur ce diagramme,  :
							<img src="img/tds/diagUserCase/quizz5.png" alt="quizz" />
							<input type="radio" name="q7" value="1" <?php if(isset($_POST['q7'])){if($_POST['q7'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q7'])){echo '<span class="false">';} ?>Il faut réaliser l’action A2 afin de réaliser l’action A1<?php if(isset($_POST['q7'])){echo '</span>';} ?><br />
							<input type="radio" name="q7" value="2" <?php if(isset($_POST['q7'])){if($_POST['q7'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q7'])){echo '<span class="false">';} ?>Il faut réaliser l’action A1 afin de réaliser l’action A2<?php if(isset($_POST['q7'])){echo '</span>';} ?><br />
							<input type="radio" name="q7" value="3" <?php if(isset($_POST['q7'])){if($_POST['q7'] == 3){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q7'])){echo '<span class="true">';} ?>On peut réaliser l’action A1 en réalisant l’action A2.<?php if(isset($_POST['q7'])){echo '</span>';} ?><br />
							<input type="radio" name="q7" value="4" <?php if(isset($_POST['q7'])){if($_POST['q7'] == 4){echo 'checked'; }} ?>><?php if(isset($_POST['q7'])){echo '<span class="false">';} ?>On peut réaliser l’action A2 en réalisant l’action A1<?php if(isset($_POST['q7'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 8 :</strong> D’après cet énoncé, quel(s) est/sont le(s) acteur(s) :<br />
							Dans un jeu vidéo, un enfant peut créer un personnage. Un personnage est un être humain ou un Orc. Si l’enfant n’y arrive pas, il peut demander à sa mère de lire et lui expliquer les informations.<br />
							<input type="radio" name="q8" value="1" <?php if(isset($_POST['q8'])){if($_POST['q8'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q8'])){echo '<span class="false">';} ?>Enfants<?php if(isset($_POST['q8'])){echo '</span>';} ?><br />
							<input type="radio" name="q8" value="2" <?php if(isset($_POST['q8'])){if($_POST['q8'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q8'])){echo '<span class="false">';} ?>Enfant, Orc, Humain<?php if(isset($_POST['q8'])){echo '</span>';} ?><br />
							<input type="radio" name="q8" value="3" <?php if(isset($_POST['q8'])){if($_POST['q8'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q8'])){echo '<span class="false">';} ?>Mère<?php if(isset($_POST['q8'])){echo '</span>';} ?><br />
							<input type="radio" name="q8" value="4" <?php if(isset($_POST['q8'])){if($_POST['q8'] == 4){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q8'])){echo '<span class="true">';} ?>Enfant<?php if(isset($_POST['q8'])){echo '</span>';} ?><br />
							<input type="radio" name="q8" value="5" <?php if(isset($_POST['q8'])){if($_POST['q8'] == 5){echo 'checked';}} ?>><?php if(isset($_POST['q8'])){echo '<span class="false">';} ?>Enfant, Mère<?php if(isset($_POST['q8'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 9 :</strong> D’après cet énoncé, quel(s) est/sont le(s) cas d'utilisation :<br />
							Dans un jeu vidéo, un enfant peut créer un personnage. Un personnage est un être humain ou un Orc. Si l’enfant n’y arrive pas, il peut demander à sa mère de lire et lui expliquer les informations.<br />
							<input type="radio" name="q9" value="1" <?php if(isset($_POST['q9'])){if($_POST['q9'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q9'])){echo '<span class="false">';} ?>Expliquer les informations, créer un personnage<?php if(isset($_POST['q9'])){echo '</span>';} ?><br />
							<input type="radio" name="q9" value="2" <?php if(isset($_POST['q9'])){if($_POST['q9'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q9'])){echo '<span class="false">';} ?>Demander à sa mère, créer un personnage<?php if(isset($_POST['q9'])){echo '</span>';} ?><br />
							<input type="radio" name="q9" value="3" <?php if(isset($_POST['q9'])){if($_POST['q9'] == 3){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q9'])){echo '<span class="true">';} ?>Créer un personnage<?php if(isset($_POST['q9'])){echo '</span>';} ?><br />
							<input type="radio" name="q9" value="4" <?php if(isset($_POST['q9'])){if($_POST['q9'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q9'])){echo '<span class="false">';} ?>Être humain, Orc<?php if(isset($_POST['q9'])){echo '</span>';} ?><br />
							
							</p>
						<div>
							<input name="formu" type="submit" value="Valider" />
						</div> 
					</form>
				
		
					<?php $questions=9; 
							if(isset($_POST['formu'])){
								echo '<p id="eval">';
								
			
								switch($rep){
									case 0 : echo $rep."/".$questions."<br />..." ; break;
									case 1 : echo $rep."/".$questions."<br />Il faudrait envisager une réorientation..." ; break;
									case 2 : echo $rep."/".$questions."<br />Refait des exercices et revoit la leçon pour t'entrainer." ; break;
									case 3 : echo $rep."/".$questions."<br />La leçon n'est pas assez apprise !" ; break;
									case 4 : echo $rep."/".$questions."<br />Pense a relire la leçon pour bien cerner les fondamentaux." ; break;
									case 5 : echo $rep."/".$questions."<br />Il te reste encore quelques points à revoir." ; break;
									case 6 : echo $rep."/".$questions."<br />Bon travail mais pense à relire la leçon." ; break;
									case 7 : echo $rep."/".$questions."<br />Des petites erreurs, mais bien joué !" ; break;
									case 8 : echo $rep."/".$questions."<br />Très bien !" ; break;
									case 9 : echo $rep."/".$questions."<br />Excellent !" ; break;
								}
								
								echo '</p>';
								
							}
					?>
		
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