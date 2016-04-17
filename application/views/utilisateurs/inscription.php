<div id="primary" class="content-area">

	<header class="page-header">
		<h1 class="page-title">Inscription</h1>
	</header>

	<div class="entry-content">
		<h4>Inscrivez-vous et profitez de nombreux avantages !</h4>
		<p>Utilisez ce formulaire pour vous inscrire et créer votre espace personnel.</p>
							
		<?php $attributs = array('id' => 'contact_form', 'class' => 'form-horizontal form-label-left'); ?>
		<?php echo form_open("utilisateurs/inscription", $attributs); ?>
		<fieldset>
			<legend>&nbsp Informations personnelles : &nbsp</legend>
			<div class="form-row field_text">
				<label for="nom">Nom <em>(requis)</em></label>
				<div class="col-sm-4">
					<input type="text" id="nom" name="nom" value="<?php echo set_value('nom'); ?>" class="input_text required" placeholder="Entrez votre nom">
				</div>
			</div>
			<p><?php echo form_error('nom', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
			<div class="form-row field_text">
				<label for="prenom">Prénom <em>(requis)</em></label>
				<div class="col-sm-4">
					<input type="text" id="prenom" name="prenom" value="<?php echo set_value('prenom'); ?>"  placeholder="Entrez votre prénom">
				</div>
			</div>
			<p><?php echo form_error('prenom', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
		</fieldset>
		
		<fieldset>
			<legend>&nbsp Informations d'identification : &nbsp</legend>
			<div class="form-row field_text">
				<label for="adresse_email">Adresse email <em>(requis)</em></label>
				<div class="col-sm-4">
					<input type="email" id="adresse_email" name="adresse_email" value="<?php echo set_value('adresse_email'); ?>" required="required" placeholder="Entrez votre adresse email">
				</div>
			</div>
			<p><?php echo form_error('adresse_email', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
			<div class="form-row field_text">
				<label for="adresse_email_confirm">Confirmation d'adresse email <em>(requis)</em></label>
				<div class="col-sm-4">
					<input type="email" id="adresse_email_confirm" name="adresse_email_confirm" value="<?php echo set_value('adresse_email_confirm'); ?>" required="required" placeholder="Confirmez votre adresse email">
				</div>
			</div>
			<p><?php echo form_error('adresse_email_confirm', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
			<div id="mail-info">
			</div>
			
			<div class="form-row field_text">
				<label for="mot_de_passe">Mot de passe <em>(requis)</em></label>
				<div class="col-sm-4">
					<input type="password" id="mot_de_passe" name="mot_de_passe"  value="<?php echo set_value('mot_de_passe'); ?>" required="required" placeholder="Entrez un mot de passe">
				</div>
			</div>
			<p><?php echo form_error('mot_de_passe', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
			<div class="form-row field_text">
				<label for="mot_de_passe_confirm">Confirmation de mot de passe <em>(requis)</em></label>
				<div class="col-sm-4">
					<input type="password" id="mot_de_passe_confirm" name="mot_de_passe_confirm"  value="<?php echo set_value('mot_de_passe_confirm'); ?>" required="required" placeholder="Confirmez le mot de passe">
				</div>
			</div>
			<p><?php echo form_error('mot_de_passe_confirm', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
			<div id="pass-info">
			</div>
			
		</fieldset>
		
		<fieldset>
			<legend>&nbsp Informations postales : &nbsp</legend>
			
			<div class="ui blue inverted segment">
            	<p>Ces informations nous sont nécessaires si vous effectuez une commande sur notre site.</p>
            </div>
			
			<div class="form-row field_text">
				<label for="adresse_postale">Adresse postale</label>
				<div class="col-sm-4">
					<input type="text" id="adresse_postale" name="adresse_postale" value="<?php echo set_value('adresse_postale'); ?>" placeholder="Entrez votre adresse postale">
				</div>
			</div>
			<p><?php echo form_error('adresse_postale', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
			<div class="form-row field_text">
				<label for="code_postal">Code postal</label>
				<div class="col-sm-4">
					<input type="text" id="code_postal" name="code_postal" value="<?php echo set_value('code_postal'); ?>" placeholder="Entrez votre code postal">
				</div>
			</div>
			<p><?php echo form_error('code_postal', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
			<div class="form-row field_text">
				<label for="ville">Ville</label>
				<div class="col-sm-4">
					<input type="text" id="ville" name="ville" value="<?php echo set_value('ville'); ?>" placeholder="Entrez votre ville">
				</div>
			</div>
			<p><?php echo form_error('ville', '<div class="ui red inverted segment">', '</div>'); ?></p>
			
		</fieldset>

			<div class="form-row field_submit">
				<input type="submit" id="_submit" name="_submit" class="ui button colored" value="Inscription">
			</div>
		<?php echo form_close(); ?>
		<div>
			Déjà inscrit ?&nbsp;&nbsp;<a href="<?php echo base_url()."utilisateurs/connexion"; ?>" class="ui inverted orange button">Connexion</a>
		</div>
	</div>

</div> <!-- END #primary -->

<div id="card-alert" class="card light-blue">
                      <div class="card-content white-text">
                        <p>NEWS : You have done 5 actions.</p>
                      </div>
                    </div>
<div class="col m6">
<h2 class="center-align">Inscription</h2>
<div class="row">
	<form class="col s12">
		<div class="input-field col s12">
			<input id="icon_prefix" type="text" class="validate" placeholder="Entrez votre nom">
			<label for="icon_prefix">Nom : (Requis)</label>
		</div><br />
		<div class="input-field col s12">
			<input id="icon_prefix" type="text" class="validate" placeholder="Entrez votre prénom">
			<label for="icon_prefix">Prénom (Requis) :</label>
		</div><br />
		<div class="input-field col s12">
			<i class="material-icons prefix">vpn_key</i>
			<input id="icon_telephone" type="password" class="validate" placeholder="Entrez votre mot de passe"	>
			<label for="icon_telephone">Mot de passe :</label>
		</div>
		<div class="input-field col s12">
			<i class="material-icons prefix">work</i>
			<select>
				<option value="" disabled selected>Je suis...</option>
				<option value="PROPRIETAIRE">Je suis propriétaire</option>
				<option value="LOCATAIRE">Je suis locataire</option>
			</select>
			<!--<label>Materialize Select</label>-->
		</div>
		
		<div class="row">
			<div class="col m12">
				<p class="right-align">
					<button class="btn btn-large waves-effect waves-light" type="button" name="action">Inscription</button>
				</p>
			</div>
		</div>
	</form>
</div>
</div>