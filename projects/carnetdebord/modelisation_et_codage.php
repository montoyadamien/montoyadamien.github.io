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
				<div><img src="img/tds/tdsTime.png" alt="time" />1 Heure</div>
				<div><img src="img/tds/tdsSoft.png" alt="logiciel" />Modélio</div>
			</div>
			
			<div class="inTdTitle"><h2>Interêt</h2></div>
			<div class="inTdBloc">
					<p>Grâce à modélio, lors de la création du projet en cochant la case "Java Project", lors de la création d'un diagramme de classe on pourra directement convertir le diagramme de classe en un code java
					permettant de ce fait de faire le diagramme UML et d'obtenir le code Java directement.</p>
			</div>
			
			<div class="inTdTitle"><h2>Mise en pratique</h2></div>
			<div class="inTdBloc">
					<p>Dans ce TD, il y aura plusieurs classes soit à dessiner puis à générer, dans notre cas sur modélio ou les écrire directement en java. Néanmoins suite aux problèmes de compilation liés à modélio, les classes seront déssinées mais le code sera écrit manuellement.</p>
			
			
				<h3>Classe ''TailleHaie''</h3>
				<div class="enonce"><p>
				Un taille haie est caractérisé par sa cadence de coupe, typiquement 4500 coupes/minute.<br />

				switchOn()+: méthode qui allume l’outil et fixe la cadence à 4500.<br />
				switchOff()+: méthode qui éteint l’outil et fixe la cadence à 0.<br /><br />
				<strong>1 - </strong>Dessiner la représentation UML de cette classe.<br />
				<strong>2 - </strong>Générer ou écrivez le code java correspondant à cette classe. On prévoira un constructeur qui initialise le tailleHaie dans l’état éteint, avec une cadence de 0. Les exceptions levées dans le corps des méthodes générées permettent de signaler les méthodes encore non implémentées. Vous devez retirer les levées d'exception en implémentant les méthodes.<br />
				<strong>3 - </strong>On veut pouvoir connaître la cadence du TailleHaie.<br />
				<strong>4 - </strong>Tester votre code. Si vous n'avez pas encore vu la notion de Test en java vous pouvez mettre vos tests dans une classe dédiée comportant un main et votre test peut ressembler à ce qui suit.<br />
				</p>
				</div>
				<div class="code">
				public class TestOutils {<br /><br />
	 
			&emsp;	public static void main(String[] args) {<br />
			&emsp;	&emsp;	TailleHaie monTailleHaie = new TailleHaie();<br />
			&emsp;	&emsp;	System.out.println("Taille Haie crée : " + monTailleHaie);<br />
			&emsp;	&emsp;	System.out.println("==> Test init : " + (monTailleHaie.getCadence() == 0) );<br />
			&emsp;	&emsp;	monTailleHaie.switchOn();<br />
			&emsp;	&emsp;	System.out.println("Cadence du Taille Haie en fonctionnement : " + monTailleHaie.getCadence());<br />
			&emsp;	&emsp;	System.out.println("==> Test fonctionnement : " + (monTailleHaie.getCadence() == 4500) );<br />
			&emsp;	&emsp;	monTailleHaie.switchOff();<br />
			&emsp;	&emsp;	System.out.println("Cadence du Taille Haie à l'arret : " + monTailleHaie.getCadence());<br />
			&emsp;	&emsp;	System.out.println("==> Test Arret : " + (monTailleHaie.getCadence() == 0) );<br />
			&emsp;	}<br />
				}
				</div>
				<p>
				Nous devrons donc dans un premier temps sous modélio une classe Taillehaie, composée d'un attribut integer nommé cadence avec comme encapsulation private. 
				Dans cette classe se trouverons les méthodes en public switchOn() et switchOff().</p>
				<img src="img/tds/diagModCod/1.jpg" alt="diag" />
				
				<p>Voici le code java correspondant pour tout l'exercice, l'ajout du getCadence a donc été fait:<br />
				</p><div class="code">
				package tailleHaie; //nos futures classes seront dans ce package<br /><br />

				public class TailleHaie{<br />
				&emsp;	private int cadence;<br /><br />
				
				&emsp;	public TailleHaie(){ //le constructeur<br />
				&emsp;&emsp;	cadence = 0;<br />
				&emsp;	}<br /><br />
					
				&emsp;	public void switchOn(){<br />
				&emsp;&emsp;		cadence = 4500;<br />
				&emsp;	}<br />	<br />
					
				&emsp;	public void switchOff(){<br />
				&emsp;&emsp;		cadence = 0;<br />
				&emsp;	}<br /><br />
					
				&emsp;	public int getCadence(){<br />
				&emsp;&emsp;		return cadence;<br />
				&emsp;	}<br />
				}

				
				</div>
				<p>
				En reprenant le code de test au dessus, les tests sont valides, nous obtenons ceci :<br />
				
				
				Taille Haie crée : tailleHaie.TailleHaie@15db9742<br />
				==> Test init : true<br />
				Cadence du Taille Haie en fonctionnement : 4500<br />
				==> Test fonctionnement : true<br />
				Cadence du Taille Haie à l'arret : 0<br />
				==> Test Arret : true
				</p>
				
				<h3>Classe "Tondeuse"</h3>
				<div class="enonce">
				<p>
				Sur le même modèle, une tondeuse est caractérisée par la vitesse de rotation de sa lame, typiquement 1000 Tour/minute. On prévoira<br />

				switchOn()+: méthode qui allume l’outil et fixe la cadence à 1000.<br />
				switchOff()+: méthode qui éteint l’outil et fixe la cadence à 0.<br />
				<strong>1 - </strong>Dessiner la représentation UML de cette classe et continuez comme précédemment.<br />
				<strong>2 - </strong>Que constatez-vous? Quels sont les éléments communs? Ne pourrait-on pas “partager” des informations?<br />
				<strong>3 - </strong>Ecrivez vos tests dans la même classe que précédemment et attention ils doivent tous continuer à fonctionner. Vous pouvez par exemple ajouter les lignes suivantes.<br />
				</p>
				</div>
				<div class="code">
				System.out.println("=========================TESTS TONDEUSE===================");<br />
				Tondeuse maTondeuse = new Tondeuse();<br />
				System.out.println("Tondeuse crée : " + maTondeuse);<br />
				System.out.println("==> Test init : " + (maTondeuse.getCadence() == 0) );<br />
				maTondeuse.switchOn();<br />
				System.out.println("Cadence de Tondeuse en fonctionnement : " + maTondeuse.getCadence());<br />
				System.out.println("==> Test fonctionnement : " + (maTondeuse.getCadence() == 1000) );<br />
				maTondeuse.switchOff();<br />
				System.out.println("Cadence de Tondeuse à l'arret : " + maTondeuse.getCadence());<br />
				System.out.println("==> Test Arret : " + (maTondeuse.getCadence() == 0) );<br />
				</div>
				
				<p>Nous aurons donc une classe Tondeuse constituée d'un attribut cadence integer et les méthodes switchOn et switchOff.</p>
				<img src="img/tds/diagModCod/2.jpg" alt="diag" />
				
				Concernant le code de cette classe, après l'ajout de getCadence nous aurons ceci :
				<div class="code">
				package tailleHaie;<br /><br />

				public class Tondeuse {<br />
				&emsp;		private int cadence;<br /><br />

				&emsp;		public Tondeuse(){ //le constructeur<br />
				&emsp;&emsp;			cadence = 0;<br />
				&emsp;		}<br /><br />

				&emsp;		public void switchOn(){<br />
				&emsp;&emsp;			cadence = 1000;<br />
				&emsp;		}<br /><br />

				&emsp;		public void switchOff(){<br />
				&emsp;&emsp;			cadence = 0;<br />
				&emsp;		}<br /><br />

				&emsp;		public int getCadence(){<br />
				&emsp;&emsp;			return cadence;<br />
				&emsp;		}<br />
				}
				</div>
				
				<p>
				Nous aurons donc comme résultat avec le code test au dessus :
				</p>
				<div class="code">
				Taille Haie crée : tailleHaie.TailleHaie@15db9742<br />
				==> Test init : true<br />
				Cadence du Taille Haie en fonctionnement : 4500<br />
				==> Test fonctionnement : true<br />
				Cadence du Taille Haie à l'arret : 0<br />
				==> Test Arret : true<br />
				=========================TESTS TONDEUSE===================<br />
				Tondeuse crée : tailleHaie.Tondeuse@6d06d69c<br />
				==> Test init : true<br />
				Cadence de Tondeuse en fonctionnement : 1000<br />
				==> Test fonctionnement : true<br />
				Cadence de Tondeuse à l'arret : 0<br />
				==> Test Arret : true<br />
				</div>
				
				<p><strong>2 - </strong>Nous avons donc les mêmes méthodes switchOff() ainsi que des classes avec les mêmes attributs. Nous pourrions donc mettre en commun la méthode switchOff(), getCadence() et l'attribut cadence.</p>
				<h3>Mise en facteur et Spécialisation : OutilElectrique</h3>
				<div class="enonce">
				<p><strong>1 - </strong>Mettez en facteur les éléments qui peuvent l'être dans la modélisation UML en ajoutant une classe OutilElectrique.<br />
					<strong>2 - </strong>En fonction de vos choix, déterminer s'il s'agit d'une classe abstraite ou non.<br />
					<strong>3 - </strong>Modifier la modélisation et les codes en conséquences.<br />
					<strong>4 - </strong>Réécrire en conséquence les classes TailleHaie et Tondeuse.<br />
					<strong>5 - </strong>Relancer vos tests sans les modifier! Ils doivent toujours fonctionner!<br />
				</p></div><p>
					<strong>1 - </strong>Voici le schéma UML avec un héritage entre allant de TailleHaie et Tondeuse vers OutilElectrique car une tondeuse et un taille haie est un outil électrique. 
					Il y aura également un méthode dans la classe OutilElectrique setCadence() permettant de faire les switchOn() étant donné que l'attribut cadence est en mode private.
					<img src="img/tds/diagModCod/3.jpg" alt="diag" />
					
					<strong>2 - </strong>Dans notre cas, il s'agirait plus d'une classe abstraire car nous voulons forcément instancier un outil particulier et non un OutilElectrique.
					
					Les codes de classes seront donc comme ceci :
					</p>
					<div class="code">
					//class taillehaie<br />
					package tailleHaie;<br /><br />

					public class TailleHaie extends OutilElectrique{<br /><br />

				&emsp;	public TailleHaie(){ //le constructeur<br />
				&emsp;&emsp;	setCadence(0);<br />
				&emsp;	}<br /><br />

				&emsp;	public void switchOn(){<br />
				&emsp;&emsp;		setCadence(4500);<br />
				&emsp;	}<br />
					}<br /><br /><br />
					
					
					//classe tondeuse<br />
					package tailleHaie;<br /><br />

					public class Tondeuse extends OutilElectrique{<br /><br />
							
					&emsp;		public Tondeuse(){ //le constructeur<br />
					&emsp;&emsp;			setCadence(0);<br />
					&emsp;		}<br /><br />

					&emsp;		public void switchOn(){<br />
					&emsp;&emsp;			setCadence(1000);<br />
					&emsp;		}<br />
					}<br /><br /><br />
					
					//classe outil<br />
					package tailleHaie;<br /><br />

					public abstract class OutilElectrique { //classe abstract car nous ne créons pas d'outil seul, mais sois tondeuse, sois taille haie<br /><br />
					&emsp;	private int cadence;<br /><br />
						
					&emsp;	public void switchOff(){<br />
					&emsp;&emsp;		cadence = 0;<br />
					&emsp;	}<br /><br />
						
					&emsp;	public int getCadence(){<br />
					&emsp;&emsp;		return cadence;<br />
					&emsp;	}<br /><br />
						
					&emsp;	protected void setCadence(int x){<br />
					&emsp;&emsp;		cadence = x;<br />
					&emsp;	}<br /><br />
					}

					
					</div>
					<p>Nous aurons donc les même résultats que précédent.</p>
					
					<h3>Spécialisation et Enuméré</h3>
					<div class="enonce">
					<p>
					La tondeuse a plusieurs vitesses de traction possibles : arret, lent, moyen ou rapide. Il est possible de changer la vitesse de la tondeuse. Au démarrage, sa vitesse est toujours à moyenne. Lorsque l'on éteint la tondeuse sa vitesse passe à arrêt.
					<br /><br />
					<strong>1 - </strong>Modifier le modèle de la classe Tondeuse pour tenir compte de cette nouvelle information. Les Vitesses sont un énuméré. Créer une enumeration dans le modèle, lui ajouter les enumerate literal arret, …
					<br /><strong>2 - </strong>Générer vos codes.
					<br /><strong>3 - </strong>Compléter vos codes pour gérer la vitesse. Pour accéder dans votre code par exemple à l'énuméré “arret”, vous écrirez par exemple, v = Vitesse.arret;
					<br /><strong>4 - </strong>Etendez les tests précédents pour vérifier que vos codes font bien ce qui est attendu. Vous devez lancer TOUS les tests. 
					Vous constatez à ce stade que la vérification de la réussite ou non des tests est plus “longue”, c'est pourquoi aujourd'hui on utilise des méthodes de tests qui systématise les vérifications et signalent spécifiquement les erreurs.
					</p>
					</div>
					<div class="code">
					System.out.println("=========================TESTS TONDEUSE ETENDU ===================");<br />
					//La tondeuse a plusieurs vitesses de traction possibles : arret, lent, moyenne ou rapide. <br />
					maTondeuse.switchOff();<br />
					System.out.println("Vitesse de Tondeuse à l'arret attendue "+ Vitesse.arret +"==>" + maTondeuse.getVitesse());<br />
					//Il est possible de changer la vitesse de la tondeuse. <br />
					maTondeuse.switchOn();<br />
					System.out.println("Vitesse de Tondeuse au démarrage attendue "+ Vitesse.moyen +"==>" + maTondeuse.getVitesse());<br />
					maTondeuse.setVitesse(Vitesse.rapide);<br />
					System.out.println("Vitesse de Tondeuse attendue "+ Vitesse.rapide +"==>" + maTondeuse.getVitesse());<br />
					//Au démarrage, sa vitesse est toujours à l'arrêt. Lorsque l'on éteint la tondeuse sa vitesse passe à arrêt.<br />
					maTondeuse.switchOff();<br />
					System.out.println("Vitesse de Tondeuse à l'arret attendue "+ Vitesse.arret +"==>" + maTondeuse.getVitesse());<br />
					maTondeuse.setVitesse(Vitesse.rapide);<br />
					maTondeuse.switchOn();<br />
					System.out.println("Vitesse de Tondeuse au démarrage attendue (alors que on a modifie sa vitesse "+ Vitesse.moyen +"==>" + maTondeuse.getVitesse());<br />
					maTondeuse.switchOff();
					</div>
					
					<p><strong>1 - </strong>Il faudra donc dans un premier temps ajoutée l'énumération Vitesse. Cette énumération contiendra comme possibilité d'attribut, arret, lent, moyen et rapide.
					Il faudra ensuite ajouter a la tondeuse un attribut de type Vitesse, cet attribut la pourra donc prendre comme valeur les valeurs de l'énumération étant donné que c'est un type Vitesse qui est le nom de l'énumération.
					Il y aura également une association entre la classe Tondeuse et l'énumération de cardinalité 1,1 car une tondeuse peut avoir une vitesse.
					Dans la classe tondeuse viendra alors s'ajouter les méthodes getVitesse, setVitesse(Vitesse vitesse) ainsi que switchOff qui permettra de mettre d'appeller switchOff de la classe OutilElectrique et pour mettre la vitesse sur arret.
					<img src="img/tds/diagModCod/4.jpg" alt="diag" />
					<br /><strong>2 - </strong>Suite au problèmes liés à modélio, le code n'a pas pu être généré mais sera écrit manuellement.
					Voici donc le code des classes modifiées, Tondeuse ainsi que l'énumération Vitesse :
					</p>
					<div class="code">
					//classe Tondeuse<br />
					package tailleHaie;<br /><br />

					public class Tondeuse extends OutilElectrique{<br /><br />
						
					&emsp;		private Vitesse vitesse;<br /><br />
							
					&emsp;		public Tondeuse(){ //le constructeur<br />
					&emsp;&emsp;			setCadence(0);<br />
					&emsp;		}<br /><br />
							
					&emsp;		public void setVitesse(Vitesse v){<br />
					&emsp;&emsp;			vitesse = v;<br />
					&emsp;		}<br /><br />
							
					&emsp;		public Vitesse getVitesse(){<br />
					&emsp;&emsp;			return vitesse;<br />
					&emsp;		}<br /><br />
							
					&emsp;	public void switchOff() {<br />
					&emsp;&emsp;			super.switchOff(); //on appelle le switchOff() de la class mère grâce au super<br />
					&emsp;&emsp;			vitesse = Vitesse.arret;<br />
					&emsp;	}<br /><br />

					&emsp;		public void switchOn(){<br />
					&emsp;&emsp;			setCadence(1000);<br />
					&emsp;&emsp;			vitesse = Vitesse.moyen;<br /><br />
					&emsp;		}<br />
					}<br /><br /><br />
							
					//l'énumération	vitesse<br />
					package tailleHaie;<br /><br />

					public enum Vitesse { //définition de l'énumération<br />
					&emsp;	arret,lent,moyen,rapide; //définition des différentes possibilité de l'attribut<br />
					}
					</div>
					
					<p>Le test est donc valide et affiche ceci :<br /><br />
					Taille Haie crée : tailleHaie.TailleHaie@15db9742<br />
					==> Test init : true<br />
					Cadence du Taille Haie en fonctionnement : 4500<br />
					==> Test fonctionnement : true<br />
					Cadence du Taille Haie à l'arret : 0<br />
					==> Test Arret : true<br />
					=========================TESTS TONDEUSE===================<br />
					Tondeuse crée : tailleHaie.Tondeuse@6d06d69c<br />
					==> Test init : true<br />
					Cadence de Tondeuse en fonctionnement : 1000<br />
					==> Test fonctionnement : true<br />
					Cadence de Tondeuse à l'arret : 0<br />
					==> Test Arret : true<br />
					=========================TESTS TONDEUSE ETENDU ===================<br />
					Vitesse de Tondeuse à l'arret attendue arret==>arret<br />
					Vitesse de Tondeuse au démarrage attendue moyen==>moyen<br />
					Vitesse de Tondeuse attendue rapide==>rapide<br />
					Vitesse de Tondeuse à l'arret attendue arret==>arret<br />
					Vitesse de Tondeuse au démarrage attendue (alors que on a modifie sa vitesse moyen==>moyen)
					</p>
					<h3>Utiliser une classe</h3>
					<div class="enonce">
					<p>Il s'agit de développer à présent un robot “Jardinier”. On peut donner un outil à un jardinier, lui demander de travailler ou d'arrêter de travailler.<br /><br />

					Nos robots ont tous un nom qui leur est donné à la création. Il n'est pas possible de le modifier par la suite.<br />
					Si on donne un outil au jardinier alors qu'il en a déjà un, il prend le nouvel outil et relâche l'ancien outil.<br />
					<br />Si on lui demande de travailler sans lui avoir donné d'outil, il répond par “Donnez-moi un outil!”. S'il a un outil en main, il le démarre et répond par “Je démarre ” suivi de la description de l'outil démarré.
					<br />Si on lui demande d'arrêter de travailler, il répond par “Merci, la journée a été dure!”. S'il a un outil en main, il l'arrête et le “lâche”.
					<strong>1 - </strong>Donner une représentation UML du problème du Jardinier.<br />
					<strong>2 - </strong>Générer les codes correspondants. Si les résultas ne vous satisfont pas, corriger votre modèle. En particulier, vous devrez utiliser la navigation entre les classes.<br />
					<strong>3 - </strong>Compléter les codes correspondants.<br />
					<strong>4 - </strong>Eventuellement par reverse-engineering, reconstruisez votre modèle.<br />
					<strong>5 - </strong>Evidemment tester votre programme. Voici un exemple de trace possible à l'exécution des tests.<br />
					=========================TESTS Jardinier ===================<br />
					Bonjour Je suis R2-D2 : je n'ai pas d'outil <br />
					Début  du travail pour le jardinier : Donnez-moi un outil!<br />
					On lui a donné la tondeuse : Je suis R2-D2, je tiens : Tondeuse [vitesse=arret, cadence=0]<br />
					Debut du travail pour le jardinier : Je démarre : Tondeuse [vitesse=moyen, cadence=1000]<br />
					Arret du travail pour le jardinier : Merci, la journée a été dure!<br />
						 La tondeuse doit être à l'arrêt : Tondeuse [vitesse=arret, cadence=0]<br />
						 Le jardinier n'a plus d'outil : Je suis R2-D2 : je n'ai pas d'outil<br />
					</p></div><p>
					<strong>1 - </strong>Nous aurons donc une classe Jardinier. Dans celle-ci, il y aura les attributs nom qui est un String, outil qui est un OutilElectrique, et travail qui est un boolean, qui dans mon cas permettra de déterminer si le Jardinier travail ou non.
					Il y aura également les méthodes Jardinier(nom string) qui est le constructeur, setOutil(out OutilElectrique) pour donner un outil, travailler(t boolean) pour lui dire de travailler ou d'arreter et toString() pour afficher son nom et son outil.
					Il y aura également une association allant de Jardinier vers OutilElectrique de cadinalité 1,1.
					<img src="img/tds/diagModCod/5.jpg" alt="diag" />
					
					<strong>2,3,4,5 - </strong>Voici donc le code de la classe Jardinier et de la classe OutilElectrique a laquelle nous avons ajouté les méthodes getVitesse() et setVitesse():			
					</p>
					<div class="code">
					//class OutilElectrique<br />
					package tailleHaie;<br /><br />

					public abstract class OutilElectrique {<br />
					&emsp;	private int cadence;<br /><br />
						
					&emsp;	public void switchOff(){<br />
					&emsp;&emsp;		cadence = 0;<br />
					&emsp;	}<br /><br />
						
					&emsp;	public int getCadence(){<br />
					&emsp;&emsp;		return cadence;<br />
					&emsp;	}<br /><br />
						
					&emsp;	public Vitesse getVitesse(){<br />
					&emsp;&emsp;		return this.getVitesse(); //retournera automatiquement la vitesse de l'objet tondeuse<br />
					&emsp;	}<br /><br />
						
					&emsp;	public void setVitesse(Vitesse v){<br />
					&emsp;&emsp;		this.setVitesse(v);<br />
					&emsp;	}<br /><br />
						
					&emsp;	protected void setCadence(int x){<br />
					&emsp;&emsp;		cadence = x;<br />
					&emsp;	}<br />
					}<br /><br /><br />
					
					//class Jardinier<br />
					package tailleHaie;<br />

					public class Jardinier {<br />
					&emsp;	private String nom;<br />
					&emsp;	private OutilElectrique outil;<br />
					&emsp;	private boolean travail; //pour savoir si il travail ou non<br /><br />
						
					&emsp;	public Jardinier(String nom){ //le constructeur<br />
					&emsp;&emsp;		this.nom = nom;<br />
					&emsp;&emsp;		outil = null; //de base il n'a pas d'outil, on le met a null<br />
					&emsp;&emsp;		travail = false;<br />
						}<br /><br />
						
					&emsp;public void setOutil(OutilElectrique out){<br />
					&emsp;&emsp;		outil = out;<br />
					&emsp;&emsp;		String s = "On lui a donné"; //Concaténation en fonction de si on lui donne un taille haie ou une tondeuse<br />
					&emsp;&emsp;		if((outil.getClass().getSimpleName()).equals("Tondeuse")){ //si le nom de l'outil est tondeuse<br />
					&emsp;&emsp;&emsp;			s+=" la tondeuse ";<br />
					&emsp;&emsp;		}<br />
					&emsp;&emsp;		else{<br />
					&emsp;&emsp;&emsp;			s+= " le taille haie ";<br />
					&emsp;&emsp;		}<br />
					&emsp;&emsp;&emsp;		s+= ": je suis "+nom+", je tiens : "+outil.getClass().getSimpleName()+" [vitesse="+outil.getVitesse()+", cadence="+outil.getCadence()+"]"; //le message disant la vitesse et la cadence<br />
					&emsp;&emsp;		System.out.println(s); //on affiche le message<br />
					&emsp;	}<br /><br />
						
					&emsp;	public void travailler(boolean t){<br />
					&emsp;&emsp;		try{ //on fait l'execption pour savoir s'il peut travailler ou non en fonction de l'outil qu'il a<br />
					&emsp;&emsp;&emsp;			if(outil == null && t == true) throw new Exception("Début du travail pour le jardinier : Donnez-moi un outil!"); //s'il n'a pas d'outil et qu'on le fait travailler on a une exception<br />
					&emsp;&emsp;&emsp;&emsp;		travail = t;<br />
					&emsp;&emsp;&emsp;			if(t == true){ //s'il a un outil, on le fait travailler<br />
					&emsp;&emsp;&emsp;&emsp;		System.out.println("Début du travail pour le jardinier : Je démarre ! : "+outil.getClass().getSimpleName()+" [vitesse="+outil.getVitesse()+", cadence="+outil.getCadence()+"]");<br />
					&emsp;&emsp;&emsp;			}<br />
					&emsp;&emsp;&emsp;			else{ //s'il a un outil et qu'on arrete le travail<br />
					&emsp;&emsp;&emsp;&emsp;			System.out.println("Arret du travail pour le jardinier : Merci, la journée a été dure!");<br />
					&emsp;&emsp;&emsp;&emsp;			outil.setCadence(0); //on met la cadence de l'outil a 0 <br />
					&emsp;&emsp;&emsp;&emsp;			if((outil.getClass().getSimpleName()).equals("Tondeuse")){<br />
					&emsp;&emsp;&emsp;&emsp;&emsp;				outil.setVitesse(Vitesse.arret); //on arrete la tondeuse<br />
					&emsp;&emsp;&emsp;&emsp;&emsp;				System.out.println("La tondeuse doit être à l'arrêt : "+outil.getClass().getSimpleName()+" [vitesse="+outil.getVitesse()+", cadence="+outil.getCadence()+"]");<br />
					&emsp;&emsp;&emsp;&emsp;			}<br />
					&emsp;&emsp;&emsp;&emsp;			else{<br />
					&emsp;&emsp;&emsp;&emsp;&emsp;				System.out.println("Le taille haie doit être à l'arrêt : "+outil.getClass().getSimpleName()+"cadence="+outil.getCadence()+"]");<br />
					&emsp;&emsp;&emsp;&emsp;			}<br />
					&emsp;&emsp;&emsp;&emsp;			outil = null; //après le travail, on lui enlève l'objet<br />
					&emsp;&emsp;&emsp;&emsp;			System.out.println(this.toString());<br />
					&emsp;&emsp;&emsp;			}<br />
					&emsp;&emsp;		}catch(Exception e){ //on gère l'exception<br />
					&emsp;&emsp;&emsp;		System.out.println(e.getMessage());<br />
					&emsp;&emsp;		}<br />
					&emsp;	}<br /><br />
						
					&emsp;	public String toString(){<br />
					&emsp;&emsp;		String s = "Bonjour Je suis "+nom;<br />
					&emsp;&emsp;		if(outil == null){<br />
					&emsp;&emsp;&emsp;			s+= " : je n'ai pas d'outil";<br />
					&emsp;&emsp;		}<br />
					&emsp;&emsp;		else{<br />
					&emsp;&emsp;&emsp;			s+= ", je tiens : "+outil.getClass().getSimpleName()+" [vitesse="+outil.getVitesse()+","+outil.getCadence()+"]";<br />
					&emsp;&emsp;		}<br />
					&emsp;&emsp;		return s;<br />
					&emsp;	}<br />
					}<br /><br /><br />
					
					//la classe de test :<br />
					System.out.println("=========================TESTS Jardinier ===================");<br />
					Jardinier jardi = new Jardinier("R2-D2");<br />
					System.out.println(jardi.toString());<br />
					jardi.travailler(true);<br />
					jardi.setOutil(maTondeuse);<br />
					maTondeuse.setVitesse(Vitesse.moyen);<br />
					maTondeuse.setCadence(1000);<br />
					jardi.travailler(true);<br />
					jardi.travailler(false);
					</div>
					<p>Bien évidemment, il éxiste plusieurs façons de coder, pour ma part j'ai choisi le fait de mettre les textes directement dans les méthodes.</p>
					
			</div>
			
			
			
			
			
			<div class="inTdTitle"><h2>Évaluation</h2></div>
				<div class="inTdBloc">
					<form method="post" action="#eval">
							<?php
								if(!isset($rep)){ $rep = 0;}
							?>
							<p><strong>Question 1 :</strong> L’attribut A1 deviendra :
							<img src="img/tds/diagModCod/quizz2.jpg" alt="quizz" />								
							<input type="radio" name="q1" value="1" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 1){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q1'])){echo '<span class="true">';} ?>Protected<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="2" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 2){echo 'checked'; }} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Static<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="3" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 3){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Private<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							<input type="radio" name="q1" value="4" <?php if(isset($_POST['q1'])){if($_POST['q1'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q1'])){echo '<span class="false">';} ?>Final<?php if(isset($_POST['q1'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 2 :</strong> La méthode m1 est implémentée par : 
							<img src="img/tds/diagModCod/quizz1.jpg" alt="quizz" />
							<input type="radio" name="q2" value="1" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>A1<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							<input type="radio" name="q2" value="3" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 3){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q2'])){echo '<span class="true">';} ?>A2<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							<input type="radio" name="q2" value="2" <?php if(isset($_POST['q2'])){if($_POST['q2'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q2'])){echo '<span class="false">';} ?>Aucune des deux réponses<?php if(isset($_POST['q2'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 3 :</strong> Si, dans un digramme de classe, le nom d’une classe est en Italic, cela signifie :<br />
							<input type="radio" name="q3" value="1" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 1){echo 'checked'; }} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Qu'il s'agit d'une classe temporaire<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							<input type="radio" name="q3" value="2" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q3'])){echo '<span class="false">';} ?>Qu'il s'agit d'une classe "static"<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							<input type="radio" name="q3" value="3" <?php if(isset($_POST['q3'])){if($_POST['q3'] == 3){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q3'])){echo '<span class="true">';} ?>Qu'il s'agit d'une classe abstraite<?php if(isset($_POST['q3'])){echo '</span>';} ?><br />
							
							<br /><strong>Question 4 : </strong>En vous basant sur ce diagramme, la flèche représente :
							<img src="img/tds/diagModCod/quizz3.jpg" alt="quizz" />						
							<input type="radio" name="q4" value="1" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 1){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>L’encapsulation<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="2" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 2){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Une composition<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="3" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 3){echo 'checked'; $rep++;}} ?>><?php if(isset($_POST['q4'])){echo '<span class="true">';} ?>Un héritage<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />
							<input type="radio" name="q4" value="4" <?php if(isset($_POST['q4'])){if($_POST['q4'] == 4){echo 'checked';}} ?>><?php if(isset($_POST['q4'])){echo '<span class="false">';} ?>Une interface<?php if(isset($_POST['q4'])){echo '</span>';} ?><br />

						
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