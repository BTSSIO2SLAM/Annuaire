<?php 
require 'include/config2.php'; 

$titretab = "Ajouter un batiment";


//Contenu de la page
ob_start(); 

if(isset($msg))
{
    echo $msg;
}
?>
<h2 class=text-center> Ajouter une catégorie </h2>
<div class="well">

    <form href= "index2.php?action=addcategoriesite" class="form-horizontal" role="form" enctype="multipart/form-data" method='POST'> 

    <div class="form-group">
        <label class="col-sm-4 control-label">Nom : </label>
        <div class="col-sm-6">
            <input type="text" name="nom" class="form-control" required autofocus>
        </div>
    </div>
    
<!--  Bouton de validation de la création du produit  -->                  
            <div class="form-group">
                <div class="col-sm-5 col-sm-offset-4">
                  <button type="submit" class="btn btn-primary" name="btn-save">
                  <span class="glyphicon glyphicon-plus"></span> Ajouter
                </button>  
                <a href="index2.php?action=Site" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Retournez à l'accueil</a>
                </div>
            </div>
        </form>        
    </div>

<?php
$contenupage = ob_get_clean();

//Appel de template
require "vue/Admin/template.php";
 ?>