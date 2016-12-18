<?php

session_start();
require 'Settings/bdd.inc.php';
include '/inc/connexion.inc.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_COOKIE["sid"])) {
    setcookie('sid', null, -1); //Si un utilisateur est connecté on le deconnect
}
if (isset($_COOKIE["uid"])) {
    setcookie('uid', null, -1); //On unset l'id d'uilisateur
}
if (isset($_COOKIE["admin"])) {
    setcookie('admin', null, -1); //Si un admin est connecté on le deconnect
}
//On le redérige vers la page index
header("Location: index.php");
?>