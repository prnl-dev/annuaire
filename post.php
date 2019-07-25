<?php
session_start();
try
{
	$db = new PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$addContact = $db->prepare("INSERT INTO contacts (id, name, firstname, tel) VALUES (null,?,?,?)");
if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['tel'])) {
    $addContact->execute(array(htmlspecialchars($_POST['name']),htmlspecialchars($_POST['firstname']),htmlspecialchars($_POST['tel'])));
    header('Location: index.php');
}
$addContact->closeCursor();