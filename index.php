<?php
session_start();

require './controleur/controleur.php';

try {
  if (isset($_GET['action'])) 
  {
    if ($_GET['action'] == 'Accueil') // Affiche page d'accueil annuaire
    {
      accueil();
      exit; 
    }

    if ($_GET['action'] == 'Authentification') // Authentification
    {
      if(isset($_POST['login']))
      {
        $ldapuser  = $_POST['login'];     // DN ou RDN LDAP
        $ldappassword = $_POST['password'];  // Mot de passe associé
        authentification($ldapuser,$ldappassword);
        exit();
      }
      accueil();
      exit();
    }

    if ($_GET['action'] == 'Appeler') // Appeler
    {
      if(isset($_GET['id']))
      {       
        $appele =  $_GET['id'];
        appeler($appele);
        exit();
      }
    }

    if ($_GET['action'] == 'Rechercher') // Rechercher
    {
      if(isset($_POST['find']))  // Barre de recherche
      {
      	$find = $_POST['find'];
      	rechercher($find);
      	exit();
      }
      if(isset($_GET['find'])) // Recherche par service
      {
        $find = $_GET['find'];
        rechercherservice($find);
        exit();
      }
      else
      {
        accueil();
        exit();
      }
    }

    if ($_GET['action'] == 'Modification')  // Page modification profil
    {
      if(isset($_GET['id']))
      {
        $ldapuser = $_GET['id'];
        modification($ldapuser);
        exit();
      }
    }

    if ($_GET['action'] == 'Modifier') // Enregistrer modification
    {
      if(isset($_POST['nom']))
      {
        modifier();
        exit();
      }
      accueil();
      exit();      
    }

    if ($_GET['action'] == 'Profil') // Afficher profil agent
    {
      if(isset($_GET['id']))
      {
        $find = $_GET['id'];
        profil($find);
        exit();
      }
    }

    if ($_GET['action'] == 'Deconnexion') // Deconnexion
    {
        $_SESSION=array();
        session_destroy();
        accueil();
        exit();
    }

    if ($_GET['action'] == 'Photo') // Ajouter une photo
    {
      photo();
      exit();
    }

    if ($_GET['action'] == 'EditPhoto') // Modifier une photo
    {
      editphoto();
      exit();
    }

    if ($_GET['action'] == 'ConfirmerPhoto') // Confirmer ajouter photo
    {
      confirmerphoto();
      exit();
    }

    if ($_GET['action'] == 'ConfirmerEditPhoto') // Confirmer modifier photo
    {
      confirmereditphoto();
      exit();
    }
    
    else 
    {
      throw new Exception("Action non valide");
    }
  }

  else 
  {
    accueil();  // action par défaut
  }
}
catch (Exception $e) {
erreur($e->getMessage());
}

?>