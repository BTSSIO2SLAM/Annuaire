 <?php
 session_start();
// Dispatcher
require('./controleur/controleur2.php');

try {
    if (isset($_GET['action'])) {


        if ($_GET['action'] == 'client') {
            client();
            exit;
        } 
        // Page d'accueil
        if ($_GET['action'] == 'Accueil') {
            accueil();
            exit;
        }

        if ($_GET['action'] == 'Batiment') {
            getbatiments();
            exit;
        }

        if ($_GET['action'] == 'Site') {
            getsites();
            exit;
        }
    


        if ($_GET['action'] == 'Rechercher')
        {
            if(isset($_GET['ecole']))
            {
                $find=$_GET['ecole'];
                categorieEcole($find);
            }
            if(isset($_GET['batiment']))
            {
                $find=$_GET['batiment'];
                categorieBatiment($find);
            }
            if(isset($_GET['site']))
            {
                $find=$_GET['site'];
                categorieSite($find);
            }
            if(isset($_POST['find']))
            {
                $find=$_POST['find'];
                general($find);
            }
        }

        if ($_GET['action'] == 'Fiche')
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                fiche($id);
            }
        }


        //Ajouter
        if ($_GET['action'] == 'addecole') {
            if(isset($_POST['btn-save']))
            {
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $fax = $_POST['fax'];
                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];
                $categorie = $_POST['categorie'];
                addecole2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie);
                exit();
            }
            addecole1();  
            exit();
        }

        if ($_GET['action'] == 'addbatiment') {
            if(isset($_POST['btn-save']))
            {
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $fax = $_POST['fax'];
                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];
                $categorie = $_POST['categorie'];
                addbatiment2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie);
                exit();
            }
            addbatiment1();  
            exit();
        }

        if ($_GET['action'] == 'addsite') {
            if(isset($_POST['btn-save']))
            {
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $fax = $_POST['fax'];
                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];
                $categorie = $_POST['categorie'];
                addsite2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie);
                exit();
            }
            addsite1();  
            exit();
        }

        if ($_GET['action'] == 'addcategorieecole') {
            if(isset($_POST['btn-save']))
            {
                $nom = $_POST['nom'];
                addcategorieecole2($nom);
                exit();
            }
            addcategorieecole1();
            exit();
        }

        if ($_GET['action'] == 'addcategoriebatiment') {
            if(isset($_POST['btn-save']))
            {
                $nom = $_POST['nom'];
                addcategoriebatiment2($nom);
                exit();
            }
            addcategoriebatiment1();
            exit();
        }

        if ($_GET['action'] == 'addcategoriesite') {
            if(isset($_POST['btn-save']))
            {
                $nom = $_POST['nom'];
                addcategoriesite2($nom);
                exit();
            }
            addcategoriesite1();
            exit();
        }

        //SUPPRIMER
        if ($_GET['action'] == 'deleteecole') {
            if(isset($_POST['btn-del']))
            {
                $id= $_GET['id'];
                deleteecole2($id);
                exit();
            }
            if (isset($_GET['id'])) 
            {
                $id=$_GET['id'];
                deleteecole1($id);
                exit();
            }
        }

        if ($_GET['action'] == 'deletebatiment') {
            if(isset($_POST['btn-del']))
            {
                $id= $_GET['id'];
                deletebatiment2($id);
                exit();
            }
            if (isset($_GET['id'])) 
            {
                $id=$_GET['id'];
                deletebatiment1($id);
                exit();
            }
        }

        if ($_GET['action'] == 'deletesite') {
            if(isset($_POST['btn-del']))
            {
                $id= $_GET['id'];
                deletesite2($id);
                exit();
            }
            if (isset($_GET['id'])) 
            {
                $id=$_GET['id'];
                deletesite1($id);
                exit();
            }
        }


        //Modifier
        if ($_GET['action'] == 'updateecole') {
            if(isset($_POST['btn-update']))
            {
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $fax = $_POST['fax'];
                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];
                $categorie = $_POST['categorie'];
                $id = $_GET['id'];
                updateecole2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id);
                exit();
            }
            $id=$_GET['id'];
            updateecole1($id);
            exit;
            }

        if ($_GET['action'] == 'updatebatiment') {
            if(isset($_POST['btn-update']))
            {
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $fax = $_POST['fax'];
                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];
                $categorie = $_POST['categorie'];
                $id = $_GET['id'];
                updatebatiment2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id);
                exit();
            }
            $id=$_GET['id'];
            updatebatiment1($id);
            exit;
            }

        if ($_GET['action'] == 'updatesite') {
            if(isset($_POST['btn-update']))
            {
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $fax = $_POST['fax'];
                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];
                $categorie = $_POST['categorie'];
                $id = $_GET['id'];
                updatesite2($nom,$adresse,$telephone,$fax,$longitude,$latitude,$categorie,$id);
                exit();
            }
            $id=$_GET['id'];
            updatesite1($id);
            exit;
            }

        if ($_GET['action'] == 'deleteGenre')
        {
            if (!isset($_POST['btn-del']))
            {
                deleteGenre1($_GET['id']);
            }
            else
            {
                deleteGenre2($_GET['id']);
            }
        }

        if ($_GET['action'] == 'updateGenre')
        {
            if (!isset($_POST['genre']))
            {
                editGenre1($_GET['id']);
            }
            else
            {
                editGenre2($_GET['id']);
            }
        }

    }
    else {
        // action par défaut
        header('Location: ./index.php');      
    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}



