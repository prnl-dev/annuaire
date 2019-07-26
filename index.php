<?php
include "model/BO/Contact.php";
include "model/DAO/dao.php";

//connection database (Dao.php)
$db = new dao();

function check($name, $firstname, $tel) {
    $checkTel = checkTel($tel);
    if ($checkTel) {
        $valid = true;
    } else $valid = false;
    return $valid;
}
function checkTel($tel) {
    if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){4}$#",$tel)) {
        $valid = true;
    } else {
        $valid = false;
    }
    return $valid;
}
function formateTel($tel) {
    $chars = array(".","-");
    $tel = str_replace($chars,"",$tel);
    return $tel;
}
function createContact($name,$firstname,$tel) {
    //control
    $check = check($name,$firstname,$tel);
    if ($check) {
        $tel = formateTel(htmlspecialchars($_POST['tel']));
        //create new Contact object
        $newContact = new Contact(0, $name, $firstname, $tel);
    } else {
        $newContact = null;
    }
    return $newContact;
}

//control, create and insert new contact from newContactForm (welcome.php)
if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['tel'])) {
    $newContact = createContact(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['firstname']), htmlspecialchars($_POST['tel']));
    //insert Contact object into database
    if ($newContact) {
        $resp = $db->addContact($newContact);
        if (!$resp) {
            echo "Erreur insertion base de données";
        }
    } else {
        echo "Erreur format";
    }
}

//control and set contact form setContactForm (welcome.php)
if (isset($_POST['newName']) && isset($_POST['newFirstname']) && isset($_POST['newTel'])) {
    $newContact = createContact(htmlspecialchars($_POST['newName']), htmlspecialchars($_POST['newFirstname']), htmlspecialchars($_POST['newTel']));
    //set Contact object into database
    if ($newContact) {
        $resp = $db->setContact($newContact);
        if (!$resp) {
            echo "Erreur insertion base de données";
        }
    } else {
        echo "Erreur format";
    }
}

$contacts = $db->getContactsList();

include "view/welcome.php";