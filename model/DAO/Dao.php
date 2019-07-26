<?php
spl_autoload("Contact.php");
class Dao {
    private $_db;


    public function __construct() {
        try
        {
            $this->_db = new PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    
    
    public function getContactsList() {
        $req = $this->_db->prepare("SELECT * FROM contacts ORDER BY name");
        $req->execute();
        $contactsList=array();
        while ($contact = $req->fetch()) {
                if (isset($contact)) {
                $contactsList[] = new Contact($contact['id'], $contact['name'], $contact['firstname'], $contact['tel']);
            }
        }
        $req->closeCursor();
        return $contactsList;
    }
    
    public function addContact($contactObject) {
        $req = $this->_db->prepare("INSERT INTO contacts (id, name, firstname, tel) VALUES (null,?,?,?)");
        $resp = $req->execute(array($contactObject->getName(),$contactObject->getFirstname(),$contactObject->getTel()));
        $req->closeCursor();
        return $resp;
    }
    
    public function setContact($contactObject) {
        $req = $this->_db->prepare("UPDATE contacts SET name = ?, firstname = ?, tel = ? WHERE tel = ?");
        $resp = $req->execute(array($contactObject->getName(),$contactObject->getFirstname(),$contactObject->getTel()));
        $req->closeCursor();
        return $resp;
    }
}