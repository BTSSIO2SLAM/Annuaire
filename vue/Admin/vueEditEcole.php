<?php 
require 'include/config2.php'; 

$titretab = "Modifier ".$ecole['Nom_ecole'];

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
<h2 class=text-center> Modifier "<?php echo $ecole['Nom_ecole']; ?>" </h2>
<div class="well">

    <form href= "index2.php?action=updateecole&id=<?php echo $ecole['ID_ecole']; ?>" class="form-horizontal" role="form" enctype="multipart/form-data" method='POST'>

    <div class="form-group">
        <label class="col-sm-4 control-label">Nom : </label>
        <div class="col-sm-6">
            <input type="text" value="<?php echo $ecole['Nom_ecole']; ?>" name="nom" class="form-control" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Adresse : </label>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $ecole['Adresse_ecole']; ?>" name="adresse" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Telephone : </label>
        <div class="col-sm-6">
            <input type="text" value="<?php echo $ecole['Tel_ecole']; ?>" name="telephone" class="form-control"  >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Fax : </label>
        <div class="col-sm-6">
            <input type="text" value="<?php echo $ecole['Fax_ecole']; ?>" name="fax" class="form-control"  >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Longitude : </label>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $ecole['Longitude_ecole']; ?>" name="longitude" class="form-control"  >
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Latitude : </label>
        <div class="col-sm-4">
            <input type="text" value="<?php echo $ecole['Latitude_ecole']; ?>" name="latitude" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Categorie : </label>
        <div class="col-sm-4">
            <select class="form-control" id="sel1" name="categorie" >
            <?php
                foreach ($categories as $categorie)
                {
                    ?>
                    <option <?php if($categorie['ID_cat_ecole']==$ecole['ID_cat_ecole']){  echo "selected"; } ?> value="<?php echo $categorie['ID_cat_ecole']; ?>"><?php echo $categorie['Nom_cat_ecole']; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
<!--  Bouton de validation de la création du produit  -->                  
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
                    <button type="submit" class="btn btn-default btn-primary" name="btn-update"><i class="glyphicon glyphicon-save"></i> Valider</button>
                    <a href="index2.php?action=Accueil" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
                </div>
            </div>
        </form>        
    </div>

<?php
$contenupage = ob_get_clean();

//Appel de template
require "vue/Admin/template.php";
 ?>