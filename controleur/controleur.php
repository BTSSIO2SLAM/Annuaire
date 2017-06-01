<?php

require './modele/modele.php';

// Affiche la page d'accueil

function accueil() 
{
	require './include/config.php';
	$direction1 = Palier3(1);  
	$direction2 = Palier3(2);
	$direction3 = Palier3(3);
	$direction4 = Palier3(4);
	$direction5 = Palier3(5);
	$direction6 = Palier3(6);
	$direction7 = Palier3(7);
	$direction8 = Palier3(8);
	$direction9 = Palier3(9);
	$direction10 = Palier3(10);
	$direction11 = Palier3(11);
	$direction12 = Palier3(12);
	$direction13 = Palier3(20);
	$cabinet = Palier3(21);
	require './vue/vueAccueil.php';
}


function authentification($ldapuser, $ldappassword)
{
	require './include/config.php';

	$ldapbind = @ldap_bind($LDAP_cnx, $ldapuser.'@'.$PARAM_domain, $ldappassword);
	if($ldapbind)
	{
		$result = finduser($LDAP_cnx,$PARAM_domain,$PARAM_dn,$PARAM_utilisateur,$PARAM_mot_passe,$ldapuser);
		$data = ldap_get_entries($LDAP_cnx, $result);

		$group = get_groups($ldapuser);
		ldap_close($LDAP_cnx);
		getSession($ldapuser, $group, $data);
		if(isset($_GET['user']))
		{
			profil($_GET['user']);
			exit();
		}
    	modification($ldapuser);
	}	
	else
	{
		$msg = "<div class='alert alert-danger'>
				<center> <strong> Erreur de connexion : </strong> identifiant ou mot de passe incorrect </center>
				</div>";
		require './vue/vueAccueil.php';
	}
}

function rechercher($find) // Recherche simple
{
	require './include/config.php';
	$result = find($LDAP_cnx,$PARAM_domain,$PARAM_dn,$PARAM_utilisateur,$PARAM_mot_passe,$find);
	$data = ldap_get_entries($LDAP_cnx, $result);
	$nbres = ldap_count_entries($LDAP_cnx, $result);
	ldap_close($LDAP_cnx);
	require './vue/vueRechercher.php';
}

function rechercher2($find,$msg) // Recherche simple avec msg
{
	require './include/config.php';
	$result = find($LDAP_cnx,$PARAM_domain,$PARAM_dn,$PARAM_utilisateur,$PARAM_mot_passe,$find);
	$data = ldap_get_entries($LDAP_cnx, $result);
	$nbres = ldap_count_entries($LDAP_cnx, $result);
	ldap_close($LDAP_cnx);
	require './vue/vueRechercher.php';
}

function rechercherservice($find) // Recherche par service
{
	require './include/config.php';
	$result = findservice($LDAP_cnx,$PARAM_domain,$PARAM_dn,$PARAM_utilisateur,$PARAM_mot_passe,$find);
	$data = ldap_get_entries($LDAP_cnx, $result);
	$nbres = ldap_count_entries($LDAP_cnx, $result);
	ldap_close($LDAP_cnx);
	require './vue/vueRechercher.php';
}

function appeler($appele) // Appeler
{
	if(isset($_SESSION['interne']))  // Verifier si l'appelant possede un numero interne
	{
	    $appelant=$_SESSION['interne'];
		appel($appelant,$appele); // Le telephone sonne

		// Retour sur la page user
		if(isset($_GET['user']))
		{
			profil($_GET['user']); 
			exit();
		}
		$msg = "<div class='alert alert-success'>
					<center> Veuillez décrochez votre téléphone pour appeler votre correspondant </center>
					</div>";
		rechercher2($_GET['find'],$msg);
		exit();
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<center> Veuillez vous connecter ou enregistrer votre numero interne pour appeler votre correspondant </center>
					</div>";
		rechercher2($_GET['find'], $msg);
	}

}


function profil($find) // Afficher profil agent
{
	require './include/config.php';

	//chercher les données de l'utilisateur recherché (ldap)
	$result = find($LDAP_cnx,$PARAM_domain,$PARAM_dn,$PARAM_utilisateur,$PARAM_mot_passe,$find);
	$data = ldap_get_entries($LDAP_cnx, $result);
	$nbres = ldap_count_entries($LDAP_cnx, $result);
	ldap_close($LDAP_cnx);

	//chercher la photo de l'utilisateur pour l'afficher (bd)
	$ldapuser=$data[0]["samaccountname"][0];
	$annuaire = new Annuaire();
	$photo = $annuaire->findphoto($ldapuser); 
	require './vue/vueAgent.php';
}

function modification($ldapuser) // Page modification profil
{
	require './include/config.php';
	$services = getServices(); // Afficher services pour liste déroulante
	$annuaire = new Annuaire(); // Classe annuaire
	$photo = $annuaire->findphoto($ldapuser); // Chercher la photo dans la bd pour l'afficher
	$result = finduser($LDAP_cnx,$PARAM_domain,$PARAM_dn,$PARAM_utilisateur,$PARAM_mot_passe,$ldapuser); // Données de l'utilisateur recherché
	$data = ldap_get_entries($LDAP_cnx, $result); 
	ldap_close($LDAP_cnx); 
	require './vue/vueModification.php';
}

function modification2($ldapuser,$msg)  //Vue Modification avec alerte message
{
	require './include/config.php';
	$services = getServices(); // Afficher service pour liste déroulante
	//photo
	$annuaire = new Annuaire();
	$photo = $annuaire->findphoto($ldapuser); // chercher photo dans la bd
	$result = finduser($LDAP_cnx,$PARAM_domain,$PARAM_dn,$PARAM_utilisateur,$PARAM_mot_passe,$ldapuser);          
	$data = ldap_get_entries($LDAP_cnx, $result); 
	ldap_close($LDAP_cnx);
	require './vue/vueModification.php';
}

function modifier() // Enregistrer modification
{
	require './include/config.php';

	//data ldap
	$ldapuser = $_SESSION['ldapuser'];

	//Trouver le dn de l'utilisateur à modifier
	$result = finduser($LDAP_cnx,$PARAM_domain,$PARAM_dn,$PARAM_utilisateur,$PARAM_mot_passe,$ldapuser);          
	$info = ldap_get_entries($LDAP_cnx, $result);
	$DNuser = $info[0]['distinguishedname'][0];
	$edit=edit($LDAP_cnx,$DNuser); 

	if($edit)
	{
		$msg = "<div class='alert alert-info'>
				<center><strong> Super ! </strong> Modification effectuée </center>
				</div>";
	}
	else 
	{
		$msg = "<div class='alert alert-danger'>
				<center><strong> Erreur ! </strong> Modification annulée </center>
				</div>";
	}
	ldap_close($LDAP_cnx);
	modification2($ldapuser,$msg); //Retour sur la page modification
}

function photo() // Vue ajouter photo
{
	include './include/config.php';
	$ldapuser=$_SESSION["ldapuser"];
	$annuaire = new Annuaire();
	$photo = $annuaire->findphoto($ldapuser);
	require './vue/vuePhoto.php';
}

function editphoto() // Vue modifier photo
{
	include './include/config.php';
	$ldapuser=$_SESSION["ldapuser"];
	$annuaire = new Annuaire();
	$photo = $annuaire->findphoto($ldapuser);
	require './vue/vueEditPhoto.php';
}

function confirmerphoto() // Enregistrer ajouter une photo
{
	$annuaire = new Annuaire();
	$newphoto = $annuaire->addphoto();
	$msg = "<div class='alert alert-info'>
				<center> Modification effectuée </center>
				</div>";

	modification2($_SESSION['ldapuser'],$msg); // Retour sur la vue modification
}

function confirmereditphoto() // Enregistrer modifier photo
{
	$annuaire = new Annuaire();
	$newphoto = $annuaire->editphoto();
	$msg = "<div class='alert alert-info'>
				<center> Modification effectuée </center>
				</div>";

	modification2($_SESSION['ldapuser'],$msg); // retour sur la vue modification
}

// Affiche une erreur
function erreur($msgErreur) {
	require './vue/vueErreur.php';
}

function get_groups($user) //groupes de l'utilisateur
{
	include "./include/config.php";
 
	$ldapbind = @ldap_bind($LDAP_cnx, $PARAM_utilisateur.'@'.$PARAM_domain, $PARAM_mot_passe); //Authentification

 
	// Search AD
	$results = ldap_search($LDAP_cnx,$PARAM_dn,"(samaccountname=$user)",array("memberof","primarygroupid"));
	$entries = ldap_get_entries($LDAP_cnx, $results);
	
	// No information found, bad user
	if($entries['count'] == 0) return false;
	
	// Get groups and primary group token
	if(isset($entries[0]['memberof']))
	{
		$output = $entries[0]['memberof'];
	}
	else
	{
		$output = array();
	}
	
	$token = $entries[0]['primarygroupid'][0];
	
	// Remove extraneous first entry
	array_shift($output);
	
	// We need to look up the primary group, get list of all groups
	$results2 = ldap_search($LDAP_cnx,$PARAM_dn,"(objectcategory=group)",array("distinguishedname","primarygrouptoken"));
	$entries2 = ldap_get_entries($LDAP_cnx, $results2);
	
	// Remove extraneous first entry
	array_shift($entries2);
	
	// Loop through and find group with a matching primary group token
	foreach($entries2 as $e) {
		if($e['primarygrouptoken'][0] == $token) {
			// Primary group found, add it to output array
			$output[] = $e['distinguishedname'][0];
			// Break loop
			break;
		}
	}
 
	return $output;
}



