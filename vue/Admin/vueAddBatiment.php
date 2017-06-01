<?php 
require 'include/config2.php'; 

$titretab = "Ajouter un batiment";

// Menu de la page
ob_start(); 

foreach($adminmenupage as $page_name => $page_url) 
{
    $class = '';
    if ($current_page == $page_url) {
        $class = 'active';
    }
    echo "<li class='$class'>
        <a href='$page_url'>".$page_name ."</a>".
     "</li>";
}

$adminmenupage = ob_get_clean();

//Contenu de la page
ob_start(); 

if(isset($msg))
{
    echo $msg;
}
?>
<h2 class=text-center> Ajouter un Batiment </h2>
<div class="well">

    <form href= "index2.php?action=addbatiment" class="form-horizontal" role="form" enctype="multipart/form-data" method='POST'> 

    <div class="form-group">
        <label class="col-sm-4 control-label">Nom : </label>
        <div class="col-sm-6">
            <input type="text" name="nom" class="form-control" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Adresse : </label>
        <div class="col-sm-6">
            <input type="text" name="adresse" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Telephone : </label>
        <div class="col-sm-6">
            <input type="text" name="telephone" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Fax : </label>
        <div class="col-sm-6">
            <input type="text" name="fax" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Longitude : </label>
        <div class="col-sm-6">
            <input type="text" name='longitude' class='form-control'>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Latitude : </label>
        <div class="col-sm-6">
            <input type="text" name="latitude" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Categorie : </label>
        <div class="col-sm-6">
            <select class="form-control" name="categorie" >
            <?php
                foreach ($categories as $categorie)
                {
                    ?>
                    <option value="<?php echo $categorie['ID_cat_bat']; ?>"><?php echo $categorie['Nom_cat_bat']; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
<!--  Bouton de validation de la création du produit  -->                  
            <div class="form-group">
                <div class="col-sm-5 col-sm-offset-4">
                  <button type="submit" class="btn btn-primary" name="btn-save">
                  <span class="glyphicon glyphicon-plus"></span> Ajouter un batiment
                </button>  
                <a href="index2.php?action=Batiment" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Retournez à l'accueil</a>
                </div>
            </div>
        </form>        
    </div>

<?php
$contenupage = ob_get_clean();

//Appel de template
require "vue/Admin/template.php";
 ?>