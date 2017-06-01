<!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> Annuaire Administration </title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
            <script>

$(document).ready(function () {
        var url = window.location;
    // Will only work if string in href matches with location
        $('ul.nav a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
        $('ul.nav a').filter(function () {
            return this.href == url;
        }).parent().addClass('active').parent().parent().addClass('active');
    });

            </script>
        </head>
        <body>
        <div class="navbar navbar-default" role="navigation">
    <!-- Partie de la barre toujours affichée -->
    <div class="navbar-header">
        <!-- Bouton d'accès affiché à droite si la zone d'affichage est trop petite -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
            <span class="sr-only">Activer la navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href='index2.php?action=client'><span class="glyphicon glyphicon-book"></span> Annuaire Externe </a>
    </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-target">
        <ul class="nav navbar-nav">
            <li><a href="index2.php?action=Accueil">Ecole</a></li>
            <li><a href="index2.php?action=Batiment">Batiment Administratif</a></li>
            <li><a href="index2.php?action=Site">Site Sportif et Culturel</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrateur<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?action=Deconnexion">Se deconnecter</a></li>
                </ul>
            </li>
        </ul>
    </div>
 
    </div>


    <div class="container">
    <div class="row">
    <!-- Contenu -->

                                <?= $contenupage ?>

                    </div>   


                    <footer>
                    <hr>
                        <p>&copy; Mairie du tampon - Service informatique - LEGROS Richard - 2016</p> 
                    </footer>
                    </div>  
                    

   

 
</body>
</html>

