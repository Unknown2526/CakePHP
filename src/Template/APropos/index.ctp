<?php
$this->extend('/Layout/default');
?>

<div class="apropos index large-11 medium-8 columns content">
    <h3><?= __('À propos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Titre du cours') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"><?= __('Anthony Chow') ?></td>
                <td scope="row"><?= __('420-5b7 MO Applications internet, Automne 2018, Collège Montmorency') ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="apropos index large-9 medium-8 columns content">
    <h4><?= __('Github') ?></h4>
    <a href="https://github.com/Unknown2526/CakePHP.git">https://github.com/Unknown2526/CakePHP.git</a>
    
    <h4><?= __('Description pour le TP1') ?></h4>
        <h6><?= __('En tant qu\'admin') ?></h6>
        <?= __('Je peux voir, ajouter, modifier, supprimer les données.<br>Ajouter/modifier/supprimer un hôtel, un client, un user, un fichier.<br><br>') ?>
        
        <h6><?= __('En tant que propriétaire') ?></h6>
        <?= __('Je peux voir, ajouter, modifier, supprimer seulement ses propres données qu\'il a créé.<br>Ajouter/modifier/supprimer un hôtel.<br>'
                . 'Le propriétaire reçoit un email de l\'admin lorsqu\'un client fait une réservation à son hôtel. Le email n\'a pas de UUID.<br><br>') ?>
        
        <h6><?= __('En tant que client') ?></h6>
        <?= __('Je peux voir, réserver les hôtels.<br>Réserver un hôtel.<br><br>') ?>
        
        <h6><?= __('En tant que visiteur') ?></h6>
        <?= __('Je peux voir les hôtels.<br>Créer un compte.<br><br>') ?>
        
        <h6><?= __('Compte admin') ?></h6>
        <?= __('Username: admin@gmail.com<br>Password: admin<br>Seulement l\'administrateur qui peut créer les propriétaires.<br>') ?>
</div>

<div class="apropos index large-9 medium-8 columns content">
    <h4><?= __('Description pour le TP2') ?></h4>
        <h6><?= __('Listes liées') ?></h6>
        <?= __('Vous devez vous connecter en tant qu\'administrateur ou propriétaire, ensuite cliquer sur "New Hotel". La liste liée est dans le champ du pays avec la ville.<br><br>') ?>
        
        <h6><?= __('Autocomplétion') ?></h6>
        <?= __('Vous devez vous connecter en tant qu\'administrateur ou propriétaire, ensuite cliquer sur "New Hotel". L\'autocomplétion est dans le champ du nom de l\'hôtel.<br><br>') ?>
        
        <h6><?= __('Tests') ?></h6>
        <?= __('Les tests sont créés dans le contrôleur de l\'hotel et le modèle de l\'hôtel.<br><br>') ?>
        
        <h6><?= __('Mise en place d\'interfaces REST et CRUD avec Ajax') ?></h6>
        <?= __('Vous devez vous connecter en tant qu\'administrateur, ensuite cliquer sur "List Pays".<br><br>') ?>
        
        <h6><?= __('Routage Admin') ?></h6>
        <?= __('Vous pouvez y accéder par la barre situé en haut à droite. «Section Admin en PHP» <br><br>') ?>
        
        <h6><?= __('Générer une vue en tant que fichier "pdf"') ?></h6>
        <?= __('Vous pouvez accéder au PDF à la page index de hôtel.<br><br>') ?>
        
        <h6><?= __('Compte admin') ?></h6>
        <?= __('Username: admin@gmail.com<br>Password: admin<br>Seulement l\'administrateur qui peut créer les propriétaires.<br>') ?>
</div>

<div class="apropos index large-9 medium-8 columns content">
    <h4><?= __('Description pour le TP3') ?></h4>
        <h6><?= __('Démarrage de session et du changement de mot de passe') ?></h6>
        <?= __('Vous devez vous connecter en tant qu\'administrateur pour pouvoir accéder à la page de pays (localhost/CakeHotel/pays), ensuite cliquer sur "List Pays". Il a les champs pour entrer le email et le mot de passe.<br><br>') ?>
        
        <h6><?= __('CAPTCHA') ?></h6>
        <?= __('Le CAPTCHA se retrouve dans la page de pays. Vous devez faire la vérification au CAPTCHA avant de cliquer sur le bouton login.<br><br>') ?>
        
        <h6><?= __('Listes liées avec ANGULAR JS') ?></h6>
        <?= __('Vous devez vous connecter en tant qu\'administrateur ou propriétaire, ensuite cliquer sur "New Hotel". La liste liée est dans le champ du pays avec la ville.<br><br>') ?>
        
        <h6><?= __('Dropzone') ?></h6>
        <?= __('Vous devez vous connecter en tant qu\'administrateur, ensuite cliquer sur "List Files". Ensuite vous pouvez glisser la photo vers le (Drop files here to upload) et l\'image va se rajouter.<br><br>') ?>
        
        <h6><?= __('Stratégie d\'objectifs') ?></h6>
        <?= __('Ce site web permet aux propriétaires des hotels de mettre leur hotel en ligne. Et il permet aux gens de faire une réservation à un hôtel.<br><br>') ?>
        
        <h6><?= __('Stratégie de cible') ?></h6>
        <?= __('Les clients ciblés sont les personnes qui veulent faire une réservation à un hôtel. Les personnes qui aiment voyager sont les clients ciblés.<br><br>') ?>
        
        <h6><?= __('Compte admin') ?></h6>
        <?= __('Username: admin@gmail.com<br>Password: admin<br>Seulement l\'administrateur qui peut créer les propriétaires.<br>') ?>
</div>

<?php 
    echo $this->Html->image("/img/Files/HotelReservation2.png", [
         "alt" => "diagramme"
    ]);
?>
<div class="apropos index large-9 medium-8 columns content">
    <a href="http://www.databaseanswers.org/data_models/hotels/index.htm">Diagramme original</a>
</div>
<?php 
    echo $this->Html->image("/img/Files/DiagrammeOG.png", [
         "alt" => "diagramme"
    ]);
?>

<div class="apropos index large-9 medium-8 columns content">
    <br><br>
    <h6><?= __('Coverage') ?></h6>
    <a href="coverage/Controller/HotelsController.php.html">Test pour HotelsController</a>
    <br><br>
    <a href="coverage/Model/Table/HotelsTable.php.html">Test pour HotelsTable</a>
</div>