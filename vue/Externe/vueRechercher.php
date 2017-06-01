<?php
ob_start(); 

if(isset($msg))
{
    echo $msg;
}

?>


<div class="row">
    <div class="col-md-8 col-sm-offset-2">
    <hr>
        <form method="POST" action='index2.php?action=Rechercher'>
            <div class="input-group" id="adv-search">   
                <input align=center type="text" name='find' class="form-control" placeholder="Rechercher un organisme..." required autofocus/>
                 <div class="input-group-btn">
                    <button type="sumbit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>  
        <hr>
    </div>  
</div>



   <table id="example"></table>

   <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() 
{
 $('#example').dataTable( {
        "pageLength": 25,
        "aaData": [

        <?php $count = 0; foreach($resultats as $res){ $count++; 

        if(isset($res["nom"]))
        {
            $nom=$res["nom"];
        }
        else
        {
            $nom="Non défini";
        }
        if(!empty($res["adresse"]))
        {
            $adresse=$res["adresse"];
        }
        else
        {
            $adresse="Non défini";
        }
        if(!empty($res["tel"]))
        {
            $telephone=wordwrap($res["tel"],2," ",1);
        }
        else
        {
            $telephone="Non défini";
        }
        if(!empty($res["fax"]))
        {
            $fax=$res["fax"];
        }
        else
        {
            $fax="Non défini";
        }
        if(!empty($res["idcat"]))
        {
            $categorie=$res["idcat"];
        }
        else
        {
            $categorie="Non défini";
        }

              echo '["'.$count.'","'.$nom.'","'.$adresse.'","'.$telephone.'","'.$categorie.'" ],'; } ?>
        ],
        "columns": [
            { "title": "#" },
            { "title": "Nom", "render": function (data, type, row, meta) {
        return '<a href="index2.php?action=Fiche&id=' + data + '">' + data + '</a>'; }},
            { "title": "Adresse" },
            { "title": "Telephone"},
            { "title": "Categorie"},
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
require "vue/template.php";
 ?>