<?php

    require_once 'include/fonction.php'; 
	
	// Paramètres de connexion
    $PARAM_domain       = "tamponnt.re";     							// Nom de domaine
    $PARAM_host         = "svr-secondaire";  							// le chemin vers le serveur
    $PARAM_port         = "389";                                        // Port de connexion
    $PARAM_dn           = "ou=Mairie_Centrale,dc=tamponnt,dc=re";      	// Dossier Racine	 					
    $PARAM_utilisateur  = "ldap";            							// nom utilisateur
    $PARAM_mot_passe    = "M75}hcN8,,Nn";    							// mot de passe utilisateur
    
    $admin = "CN=INFORMATIQUE,OU=UO Informatique,OU=UO DG Ressources/Vie Associative/Démocratie Participative,OU=UO DG des Services,OU=Mairie_Centrale,DC=tamponnt,DC=re";

    //Connexion au serveur LDAP
    try
    {
        $LDAP_cnx = ldap_connect($PARAM_host);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    ldap_set_option($LDAP_cnx, LDAP_OPT_PROTOCOL_VERSION, 3);

?>