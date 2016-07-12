<div id="liens">
    <a data-target="modal1" class="waves-effect waves-light modal-trigger btn orange lighten-2"><i class="material-icons left">person_add</i>Ajouter</a>
</div>
<?php foreach($listeLocataires as $locataire): ?>
<div class="row">
    
    <div class="col s12 m6 l4">
       <div id="profile-card" class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="<?php echo img_url("user-bg.jpg"); ?>" alt="user background">
            </div>
            <div class="card-content">
                <img src="<?php echo img_url("avatar.jpg"); ?>" alt="" class="circle responsive-img activator card-profile-image">
                <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                    <i class="mdi-action-account-circle"></i>
                </a>
                <span class="card-title activator grey-text text-darken-4"><?php echo $locataire->PRENOM." ".$locataire->NOM; ?></span>
                <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> <?php echo $locataire->ROLE; ?></p>
                <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> <?php echo $locataire->NUMERO_DE_TELEPHONE; ?></p>
                <p><i class="mdi-communication-email cyan-text text-darken-2"></i> <?php echo $locataire->ADRESSE_EMAIL; ?></p>

            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Roger Waters <i class="mdi-navigation-close right"></i></span>
                <p>Here is some more information about this card.</p>
                <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</p>
                <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
                <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
                <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> BAR - AUS</p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Ajouter un utilisateur</h4>
        <p>
            <div class="row">
                <form class="col s12" id="ajouterLocataire" method="POST">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input placeholder="Nom" id="nom" name="NOM" type="text" class="validate">
                            <label for="nom">Nom :</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input placeholder="Prénom" id="prenom" type="text" name="PRENOM" class="validate">
                            <label for="prenom">Prénom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                            <label for="disabled">Disabled</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
            </div>
        </p>
    </div>
    <div class="modal-footer">
        
        <button class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</button>
        <button type="submit" class="modal-action waves-effect waves-green btn-flat">Ajouter</button>
    </div>
    <input type="hidden" value="<?php echo base_url('locataires/ajouter'); ?>" />
    </form>
</div>