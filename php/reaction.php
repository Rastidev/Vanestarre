<?php
include_once '../models/Model.php';
include_once '../models/reaction_Model.php';

require_once '../header.php';
require_once 'connexion_handler.php';

if (isset($_POST['t'], $_POST['id'], $sessionid) && !empty($_POST['t']) && !empty($_POST['id']) && $sessionid != 0) {
    $id = (int) $_POST['id'];
    $t = (int) $_POST['t'];

    if ($t >= 1 && $t <= 4) {
        $reaction_table = array('style', 'swag', 'cute', 'love');
        $type = $reaction_table[$t-1];

        $request = requestReaction($sessionid, $id);
        $reaction_amount = $request->rowCount();
        $reaction = $request->fetch();

        if ($reaction_amount == 1) {
            deleteReaction($sessionid, $id);
            if ($reaction['type'] != $type) {
                insertReaction($sessionid, $id, $type);
            }
        }
        else {
            insertReaction($sessionid, $id, $type);
        }
    }
    else {
        die('Erreur: Index not found');
    }
    //header('Location: '.$_SERVER['HTTP_REFERER']);
}
else {
    exit('Fatal Error: Request Not Found');
}