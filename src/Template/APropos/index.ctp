<?php
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
    <h5><?= __('Description') ?></h5>
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

<?php 
    echo $this->Html->image("/img/Files/HotelReservation.png", [
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