<?php 
require 'include/config2.php'; 

$titretab = "Komidi Administration";

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

<div class="clearfix"></div>

<div class="container">
<a href="index2.php?action=addsite" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Ajouter un site</a>

<a href="index2.php?action=addcategoriesite" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Ajouter une categorie</a>
</div>  

<hr>



   <table id="example"></table>
  

 

   <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() 
{
 $('#example').dataTable( {
        "pageLength": 25,
        "aaData": [

        <?php $count = 0; foreach($sites as $site){ $count++; 

        if(isset($site["Nom_site"]))
        {
            $nom=$site["Nom_site"];
        }
        else
        {
            $nom="Non défini";
        }
        if(isset($site["Adresse_site"]))
        {
            $adresse=$site["Adresse_site"];
        }
        else
        {
            $adresse="Non défini";
        }
                if(isset($site["Tel_site"]))
        {
            $telephone=$site["Tel_site"];
        }
        else
        {
            $telephone="Non défini";
        }
                if(isset($site["Fax_site"]))
        {
            $fax=$site["Fax_site"];
        }
        else
        {
            $fax="Non défini";
        }
                if(isset($site["ID_cat_site"]))
        {
            $categorie=$site["ID_cat_site"];
        }
        else
        {
            $categorie="Non défini";
        }

              echo '["'.$count.'","'.$nom.'","'.$adresse.'",`<a title="Modifier" href="index2.php?action=updatesite&id='.$site["ID_site"].'" class="btn btn-xs btn-primary" ><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;<a title="Supprimer" href="index2.php?action=deletesite&id='.$site["ID_site"].'" class="btn btn-xs btn-danger" ><span class="glyphicon glyphicon-remove"></span></a>` ],'; } ?>
        ],
        "columns": [
            { "title": "#" },
            { "title": "Nom" },
            { "title": "Adresse" },
            { "title": "Actions"},
        ],
        "language": {
            "lengthMenu": "Afficher _MENU_ résultats par page",
            "zeroRecords": "Aucun résultat trouvé",
            "info": "Page _PAGE_ sur _PAGES_",
            "infoEmpty": "Pas de résultats disponibles",
            "sSearch":         "Rechercher &nbsp;:&nbsp;",
            "oPaginate": {
                            "sFirst":      "Premier",
                            "sPrevious":   "Pr&eacute;c&eacute;dent",
                            "sNext":       "Suivant",
                            "sLast":       "Dernier"
                          },
            "infoFiltered": "(filtré sur _MAX_ résultats)"
        }

    } );   
});
</script>
        
<script type="text/javascript">
  $('#example')
 .addClass('table table-striped table-bordered tr-default');
</script>



<?php
$contenupage = ob_get_clean();

//Appel de template
require "vue/Admin/template.php";
 ?>