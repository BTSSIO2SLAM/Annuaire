<?php 
require 'include/config2.php'; 

$titretab = "Supprimer ".$ecole['Nom_ecole'];

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
?>
<div class="clearfix"></div>

<div class="container">
<div class="alert alert-danger">
    <p class=text-center> <strong>Êtes-vous sûr(e)</strong> de vouloir supprimer "<?php echo $ecole['Nom_ecole'] ?>" ?  </p>
</div>
</div>

<div class="well">

    <form href= "index2.php?action=deleteecole&id=<?php echo $ecole['ID_ecole']; ?>" class="form-horizontal" role="form" enctype="multipart/form-data" method='POST'>

    <div class="form-group">
        <label class="col-sm-4 control-label">Nom : </label>
        <div class="col-sm-6">
            <input type="text" value="<?php echo $ecole['Nom_ecole']; ?>" name="titre" class="form-control"  disabled>
        </div>
    </div>

              
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
                    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; Oui</button>
                    <a href="index2.php?action=Accueil" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Non </a>
                </div>
            </div>
        </form>        
    </div>

<?php
$contenupage = ob_get_clean();

//Appel de template
require "vue/Admin/template.php";
 ?>