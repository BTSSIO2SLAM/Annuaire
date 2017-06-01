<?php

require './modele/modele.class2.php';

/////////////////////////////////////CLIENT//////////////////////////////////////////


function client() /// Afficher l'Annuaire Externe
{
	$categorieEcole= new CategorieEcole;
	$categorieBatiment= new CategorieBatiment;
	$categorieSite= new CategorieSite;
	$ecoles = $categorieEcole->findAll();
	$batiments = $categorieBatiment->findAll();
	$sites = $categorieSite->findAll();
	require './vue/Externe/vueExterne.php';
}

function general($id) /// Recherche général ( tout )
{
	$Externe = new Externe();
	$resultats = $Externe->findAll2($id);
	require './vue/Externe/vueRechercher.php'; 
}

function fiche($id) /// Afficher un batiment/ecole/site
{
	$Externe = new Externe();
	$resultat = $Externe->findAll($id);
	require './vue/Externe/vueFiche.php';
}

function categorieEcole($id) /// Recherche par catégorie ecole
{
	$Ecole = New Ecole();
	$resultats = $Ecole->findAllbycat($id);
	require './vue/Externe/vueRechercher.php';
}

function categorieBatiment($id) /// Recherche par catégorie batiment
{
	$Batiment = New Batiment();
	$resultats = $Batiment->findAllbycat($id);
	require './vue/Externe/vueRechercher.php';
}

function categorieSite($id) /// Recherche par catégorie site
{
	$Site = New Site();
	$resultats = $Site->findAllbycat($id);
	require './vue/Externe/vueRechercher.php';
}

/////////////////////////////////ADMIN////////////////////////////////////////////


function accueil()  // Affiche la page d'accueil admin
{
	$Ecole = new Ecole();
	$ecoles = $Ecole->findAll();
	require './vue/Admin/vueAccueil.php';
}

function accueil_msg($msg) // Affiche la page d'accueil avec un alerte message
{
	$Ecole = new Ecole();
	$ecoles = $Ecole->findAll();
	require './vue/Admin/vueAccueil.php';
}

function getbatiments() // Affiche la page des batiments
{
	$Batiment = new Batiment();
	$batiments = $Batiment->findAll();
	require './vue/Admin/vueBatiments.php';
}

function getbatiments_msg($msg) // Affiche la page des batiments avec une alerte message
{
	$Batiment = new Batiment();
	$batiments = $Batiment->findAll();
	require './vue/Admin/vueBatiments.php';
}

function getsites() // Affiche la page des sites
{
	$Site = new Site();
	$sites = $Site->findAll();
	require './vue/Admin/vueSites.php';
}

function getsites_msg($msg) // AFfiche la page des sites avec une alerte message
{
	$Site = new Site();
	$sites = $Site->findAll();
	require './vue/Admin/vueSites.php';
}


///////////////////////////////////AJOUTER///////////////////////////////////////////////

function addecole1() // Afficher la page pour ajouter une ecole
{
	$Categorie = new CategorieEcole();
	$categories = $Categorie->findAll();
	require './vue/Admin/vueAddEcole.php';
}

function addecole2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie) // Ajouter une ecole
{
	$Ecole = new Ecole();
    $ecole = $Ecole->add($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie);

    //A AMELIORER
    $msg = "<div class='alert alert-info'>
            <center><strong>Super! </strong> L'Ecole a été ajouté avec succès ! </center>
                </div>";
    accueil();
    exit();
	$ecoles = $Ecole->findAll();
	require './vue/Admin/vueAccueil.php';
}

function addbatiment1() // Afficher la page pour ajouter un batiment
{
	$Categorie = new CategorieBatiment();
	$categories = $Categorie->findAll();
	require './vue/Admin/vueAddBatiment.php';
}

function addbatiment2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie) // Ajouter un batiment
{
	$Batiment = new Batiment();
    $batiment = $Batiment->add($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie);

    //A AMELIORER
    $msg = "<div class='alert alert-info'>
            <center><strong>Super! </strong> Le Batiment a été ajouté avec succès ! </center>
                </div>";
	$batiments = $Batiment->findAll();
	require './vue/Admin/vueBatiments.php';
}

function addsite1() // Afficher la page pour ajouter un site
{
	$Categorie = new CategorieSite();
	$categories = $Categorie->findAll();
	require './vue/Admin/vueAddSite.php';
}

function addsite2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie) // Ajouter un site
{
	$Site = new Site();
    $site = $Site->add($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie);

    //A AMELIORER
    $msg = "<div class='alert alert-info'>
            <center><strong>Super! </strong> Le Site a été ajouté avec succès ! </center>
                </div>";

	$sites = $Site->findAll();
	require './vue/Admin/vueSites.php';
}

function addcategorieecole1()  // Afficher la page pour ajouter une catégorie ecole
{
	require './vue/Admin/vueAddCategorieEcole.php';
}

function addcategorieecole2($nom) // Ajouter une catégorie ecole 
{
	$CategorieEcole = new CategorieEcole();
	$add = $CategorieEcole->add($nom);
	if(!empty($add))
	{
	    $msg = "<div class='alert alert-info'>
        <center><strong>Super! </strong> Catégorie ajouté </center>
            </div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
        <center><strong>Erreur doublon </strong></center>
            </div>";
	}
	accueil_msg($msg);
}

function addcategoriebatiment1() // Afficher la page pour ajouter une catégorie batiment
{
	require './vue/Admin/vueAddCategorieBatiment.php';
}

function addcategoriebatiment2($nom) // Ajouter une catégorie batiment
{
	$CategorieBatiment = new CategorieBatiment();
	$add = $CategorieBatiment->add($nom);
	if(!empty($add))
	{
	    $msg = "<div class='alert alert-info'>
        <center><strong>Super! </strong> Catégorie ajouté </center>
            </div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
        <center><strong>Erreur doublon </strong></center>
            </div>";
	}
	getbatiments_msg($msg);
}

function addcategoriesite1() // Afficher la page pour ajouter une catégorie site
{
	require './vue/Admin/vueAddCategorieSite.php';
}

function addcategoriesite2($nom) // Ajouter une catégorie site
{
	$CategorieSite = new CategorieSite();
	$add = $CategorieSite->add($nom);
	if(!empty($add))
	{
	    $msg = "<div class='alert alert-info'>
        <center><strong>Super! </strong> Catégorie ajouté </center>
            </div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
        <center><strong>Erreur doublon </strong></center>
            </div>";
	}
	getsites_msg($msg);
}

////////////////////////////////////SUPPRIMER///////////////////////////////////////////


function deleteecole1($id) // Afficher page Supprimer une ecole
{
	$Ecole = new Ecole();
	$ecole = $Ecole->find($id);
	require './vue/Admin/vueDeleteEcole.php';
}

function deleteecole2($id) // Supprimer une cole
{
	$Ecole = new Ecole();
	$delete = $Ecole->delete($id);

	//A AMELIORER
	$msg = "<div class='alert alert-success'>
    		<strong> L'école </strong> a été supprimé avec succès... 
			</div>";

	$ecoles = $Ecole->findAll();
	require './vue/Admin/vueAccueil.php';
}

function deletebatiment1($id) // Afficher une page supprimer batiment
{
	$Batiment = new Batiment();
	$batiment = $Batiment->find($id);
	require './vue/Admin/vueDeleteBatiment.php';
}

function deletebatiment2($id) // Supprimer un batiment
{
	$Batiment = new Batiment();
	$delete = $Batiment->delete($id);

	//A AMELIORER
	$msg = "<div class='alert alert-success'>
    		<strong> Le batiment </strong> a été supprimé avec succès... 
			</div>";

	$batiments = $Batiment->findAll();
	require './vue/Admin/vueBatiments.php';
}

function deletesite1($id) // Afficher une page pour supprimer un site
{
	$Site = new Site();
	$site = $Site->find($id);
	require './vue/Admin/vueDeleteSite.php';
}

function deletesite2($id) // Supprimer un site
{
	$Site = new Site();
	$delete = $Site->delete($id);

	//A AMELIORER
	$msg = "<div class='alert alert-success'>
    		<strong> Le site </strong> a été supprimé avec succès... 
			</div>";

	$sites = $Site->findAll();
	require './vue/Admin/vueSites.php';
}


///////////////////////////////////MODIFIER////////////////////////////////


function updateecole1($id)  // Afficher page modifier ecole
{
	$Categorie = new CategorieEcole();
	$Ecole = new Ecole();
	$ecole = $Ecole->find($id);
	$categories = $Categorie->findAll();
	require './vue/Admin/vueEditEcole.php';
}

function updateecole2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id) // modifier ecole
{

	$Ecole = new Ecole();
    $edit = $Ecole->edit($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id);
    if($edit==1)
    {
	    $msg = "<div class='alert alert-info'>
	               <center><strong>Super! </strong> L'école a été mis à jour avec succès !</center>
	            </div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
	               <center><strong>Erreur! </strong> L'école n'a pas été mis à jour !</center>
	            </div>";
	}
    $ecoles = $Ecole->findAll();
	require './vue/Admin/vueAccueil.php';
}

function updatebatiment1($id) // Afficher page modifier batiment
{
	$Categorie = new CategorieBatiment();
	$Batiment = new Batiment();
	$batiment = $Batiment->find($id);
	$categories = $Categorie->findAll();
	require './vue/Admin/vueEditBatiment.php';
}

function updatebatiment2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id) // Modifier batiment
{
	$Batiment = new Batiment();
    $edit = $Batiment->edit($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id);
	if($edit==1)
    {
	    $msg = "<div class='alert alert-info'>
	               <center><strong>Super! </strong> Le batiment a été mis à jour avec succès !</center>
	            </div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
	               <center><strong>Erreur! </strong> Le batiment n'a pas été mis à jour !</center>
	            </div>";
	}
    $batiments = $Batiment->findAll();
	require './vue/Admin/vueBatiments.php';
}

function updatesite1($id) // Afficher page modifier site
{
	$Categorie = new CategorieSite();
	$Site = new Site();
	$site = $Site->find($id);
	$categories = $Categorie->findAll();
	require './vue/Admin/vueEditSite.php';
}

function updatesite2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id) // Modifier site
{
	$Site = new Site();
    $edit = $Site->edit($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id);

    if($edit==1)
    {
	    $msg = "<div class='alert alert-info'>
	               <center><strong>Super! </strong> Le site a été mis à jour avec succès !</center>
	            </div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
	               <center><strong>Erreur! </strong> Le site n'a pas été mis à jour !</center>
	            </div>";
	}

    $sites = $Site->findAll();
	require './vue/Admin/vueSites.php';
}

function erreur($msgErreur) // Afficher msg erreur
{
	require './vue/Admin/vueErreur.php';
}
?>