<?php

include './include/config.php';
//Contenu de la page
ob_start(); 



///////////////////////////////////// ALERTE MESSAGE ////////////////////////////////
if(isset($msg))
{
    echo $msg;
}

?>

<!-- //////////////////////////////// BARRE DE RECHERCHE ////////////////////////// -->


<div class="row">
    <div class="col-md-8 col-sm-offset-2">
        <hr>
        <form method="POST" action='index.php?action=Rechercher'>
            <div class="input-group" id="adv-search">
            <input align=center type="text" name='find' class="form-control" placeholder="Rechercher un utilisateur, un service, un numéro..." required/>
                <div class="input-group-btn">
                    <button type="sumbit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </div>
        </form> 
        <hr> 
    </div>  
</div>

<!-- ////////////////////////////// ALERTE MESSAGE ////////////////////////////// -->

<div class='alert alert-info'>
    <center><strong> <?php echo $nbres; ?> </strong> résultat(s) trouvé(s) pour "<?php echo $find ?>". <a href="index.php?action=Accueil"> Retour à l'accueil </a> </center>
</div>

<hr>

<!-- //////////////////////////// TABLEAU //////////////////////////////////// -->

<div id="table" class="well" style="background: #fff;">     
    <table id="example"></table>
</div>


<script type="text/javascript" charset="utf-8">
$(document).ready(function() 
{
 $('#example').dataTable( {
        "aaData": [

        <?php for ($i=0; $i<$data["count"]; $i++)
            {     
                $cn=$data[$i]['cn'][0];

                if(isset($data[$i]["samaccountname"][0]))
                {
                  $login = $data[$i]["samaccountname"][0];
                }
                else
                {
                  $login = "Non défini";
                }
                
                if(isset($data[$i]["department"][0]))
                {
                  $department = $data[$i]["department"][0];
                }
                else
                {
                  $department = "Non défini";
                }
                if(isset($data[$i]["telephonenumber"][0]))
                {
                  $telephone = wordwrap($data[$i]["telephonenumber"][0],2," ",1);
                }
                else
                {
                  $telephone = "Non défini";
                }
                if(isset($data[$i]["ipphone"][0]))
                {
                  $interne = $data[$i]["ipphone"][0];
                }
                else
                {
                  $interne = "Non défini";
                }
                if(isset($data[$i]["mobile"][0]))
                {
                  $mobile = wordwrap($data[$i]["mobile"][0],2," ",1);
                }
                else
                {
                  $mobile = "Non défini";
                }
            

              echo '["'.$cn.'","'.$department.'","'.$telephone.'","'.$interne.'","'.$mobile.'"],'; } ?>
        ],
        "columns": [
            { "title": "Agent", "render": function (data, type, row, meta) {
        return '<a title="Voir le profil de '+data+'" href="index.php?action=Profil&id=' + data + '">' + data + '</a>';
    }},
            { "title": "Service", "render": function (data, type, row, meta) {
        if(data!="Non défini") {
        return `<a title="Chercher ' `+data+` '" style="color: #222" href="index.php?action=Rechercher&find=` + data + '">' + data + '</a>'; }
        else{
            return "Non défini";
        }
    }},
            { "title": "N° Telephone" },
            { "title": "N° interne", "render": function (data, type, row, meta) {
        if(data!="Non défini") {
        return `<a title="Appeler le `+data+`" href="index.php?action=Appeler&find=<?php echo $find ?>&id=` + data + '"><i class="glyphicon glyphicon-earphone"></i>&nbsp' + data + '</a>'; }
        else{
            return "Non défini";
        }
    }},
            { "title": "N° Mobile" },
        ],
        "language": {
            "lengthMenu": "Afficher _MENU_ résultats par page",
            "zeroRecords": "Aucun résultat trouvé",
            "info": "Page _PAGE_ sur _PAGES_",
            "infoEmpty": "Pas de résultats disponibles",
            "sSearch":         "Rechercher dans les résultats&nbsp;:",
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

            require "vue/template.php";


?>