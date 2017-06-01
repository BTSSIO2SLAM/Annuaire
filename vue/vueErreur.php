<?php 

ob_start(); 
?>

<br><br><br>
   <h3>Une erreur de type : </h3><h2><?= $msgErreur ?></h2> <h3>est survenue</h3>
   <br><br><br>


<?php
                
            

            $contenupage = ob_get_clean();

            require "vue/template.php";


?>