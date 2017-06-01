<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Annuaire Téléphonique - Mairie du Tampon </title>
  <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="datatables/media/css/dataTables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/style.css"/>
  <script type="text/javascript" src="./jquery/jquery-3.1.1.min.js"></script>            
  <script type="text/javascript" src="datatables/media/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="datatables/media/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
  <script type="text/javascript" src="bootstrap/dist/js/annuaire.js?"+new Date()></script>

</head>

<body>

<div class="main">
  <a href="index.php?action=Accueil"><img src="./image/backgroundmairie.jpg"></a>
  <nav class="navbar navbar-inverse">
    <div class="container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       <a class="navbar-brand" href='http://intranet.mairie-tampon.fr'><span class="glyphicon glyphicon-home"></span> Intranet </a>
      </div>

      <div id="navbar" class="collapse navbar-collapse">
      <ul id='menu' class="nav navbar-nav">
        <li><a href='index.php?action=Accueil'>Annuaire Interne</a></li>
        <li><a href='index2.php?action=client'>Annuaire Externe</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

      <?php if(isset($_SESSION['ldapuser'])) { ?>

        <li>
          <a>
            Bonjour <?php echo $_SESSION['ldapuser']; ?>
          </a>
        </li>
        
        <a href='index.php?action=Modification&id=<?php echo $_SESSION['ldapuser']; ?>'> <button class="btn btn-primary navbar-btn">Modifier mon profil</button></a>
        
      <?php 

              
        if(in_array("CN=INFORMATIQUE,OU=UO Informatique,OU=UO DG Ressources/Vie Associative/Démocratie Participative,OU=UO DG des Services,OU=Mairie_Centrale,DC=tamponnt,DC=re", $_SESSION['group'])) {
      
          echo "<a href='index2.php?action=Accueil'><button class='btn btn-success navbar-btn' href='index2.php?action=Accueil'> Administration </button></a>";
        }?>
              
        <a href="index.php?action=Deconnexion"><button class="btn navbar-btn btn-danger" name="btn-dc"> Deconnexion </button></a>
              

      <?php } else { ?>

          <li>
            <form method=post action='index.php?action=Authentification' class="navbar-form navbar-right">
              <div class="form-group">
                <input type="text" name=login placeholder="Identifiant" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="password" name=password placeholder="Mot de passe" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-success">Connexion</button>  
            </form>
          </li>

      </ul>
          
      <?php } ?>

      </div><!--/.navbar-collapse -->
    </div>
  </nav>
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
