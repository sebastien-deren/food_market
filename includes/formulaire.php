<?php

/* ce fichier gère les différents formulaires envoyé par l'utilisateur */

//nous deconecte avant de choisir la vue(si on a choisi de se déconnecter ofc)
if (isset($_GET['deco'])) {
    $_SESSION['FULL_NAME'] = null;
    $_SESSION['id'] = null;
}
//vide le cart lorsque qu'on checkout son cart
if (isset($_POST['checkout'])) {
    $num_command = command_cart();
    delete_cart_db();
}
//creer une session quand le formulaire de connection est rempli
if (isset($_POST['connection'])) {
    $verif_connection = creer_session();
}
// gère l'inscription d'une personne
if (isset($_POST['inscrit'])) {
    $verif_form = inscription();
    if ($verif_form == false) {
        $_POST['inscription'] = "reinscription";
    }
    $verif_inscription =  isset($_POST['inscription']) ? false : true;
}
//gere l'ajout d'item au cart
if (isset($_POST['add_once'])) {
    $ajout_panier = add_cart($_POST['id_product'], $_POST['quantity']);
}
//gère la supression d'item du cart
if (isset($_POST['supprimer'])) {
    delete_item_in_cart_db($_POST['id_product']);
}