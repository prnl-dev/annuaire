<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" type="text/css" href="styles.css">
    <script src="./web/js/welcome.js"></script>
    <title>Annuaire</title>
</head>

<body>
    <h1>Bienvenue dans l'annuaire</h1>
    <h3>Ajouter un nouveau contact :</h3>
    <form method="POST" action="" id="newContactForm">
        <label for="name">Nom : </label>
        <input type="text" name="name" required>
        <label for="firstname">Prénom : </label>
        <input type="text" name="firstname" required>
        <label for="tel">Téléphone : </label>
        <input type="tel" name="tel" id="telInput" required>
        <div id="msgErrorTel"></div>
        <br><input type="submit" value="Envoyer">
    </form>

    <div id="liste_contacts">
        <h3>Liste des contacts :</h3>
        <ul>
        <?php 
        if (isset($contacts)) {
            foreach ($contacts as $contact) {?>
                <li>Nom : <?= $contact->getName();?><br>Prénom : <?= $contact->getFirstname();?><br>Téléphone : <?= $contact->getTel();?><br>
                <a href="" class="set" id="<?= $contact->getId();?>"><i>Modifier le contact</i></a>
                <a href=""><i>Supprimer le contact</i></a></li>
                <div class="setContactForm" id="setContactForm<?= $contact->getID();?>" hidden>
                    Nom : <input type="text" name="newName">
                    Prénom : <input type="text" name="newFirstname">
                    Téléphone : <input type="text" name="newTel"><br>
                </div>
            <?php }
        }
        ?>
        </ul>
    </div>
</body>