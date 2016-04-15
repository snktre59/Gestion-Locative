<div class="col m6">
<h2 class="center-align">Connexion</h2>
<div class="row">
	<form class="col s12">
		<div class="input-field col s12">
			<i class="material-icons prefix">email</i>
			<input id="icon_prefix" type="text" class="validate" placeholder="Entrez votre adresse email">
			<label for="icon_prefix">Adresse email :</label>
		</div><br />
		<div class="input-field col s12">
			<i class="material-icons prefix">vpn_key</i>
			<input id="icon_telephone" type="password" class="validate" placeholder="Entrez votre mot de passe">
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
			<div class="col s12">
				<p>
					<input type="checkbox" id="remember">
					<label for="remember">Se souvenir de moi</label>
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col m12">
				<p class="right-align">
					<button class="btn btn-large waves-effect waves-light" type="button" name="action">Connexion</button>
				</p>
			</div>
		</div>
	</form>
</div>
</div>

<!--
<div id="primary" class="content-area">

	<header class="page-header">
		<h1 class="page-title">Connexion</h1>
	</header>

	<div class="entry-content">
		<h4>Connectez-vous à votre espace !</h4>
		<p>Utilisez ce formulaire pour vous connecter et avoir accès à votre espace personnel.</p>
		
		<?php if($this->session->flashdata('erreur')){ ?>
			<div class="ui red inverted segment">
        		<p><?php echo $this->session->flashdata('erreur'); ?></p>
        	</div>
		<?php } ?>

		
							
		<?php $attributs = array('id' => 'formulaireConnexion', 'class' => 'form-horizontal form-label-left'/*, 'onsubmit' => 'return ajouter_evenement()'*/); ?>
		<?php echo form_open("utilisateurs/connexion", $attributs); ?>

			<div class="form-row field_text">
				<label for="adresse_email">Adresse email <em>(requis)</em></label>
				<div class="col-sm-4">
					<input type="text" id="adresse_email" name="adresse_email" value="" required="required">
				</div>
			</div>

			<div class="form-row field_text">
				<label for="mot_de_passe">Mot de passe <em>(requis)</em></label>
				<div class="col-sm-4">
					<input type="password" id="mot_de_passe" name="mot_de_passe" required="required">
				</div>
			</div>

			<div class="form-row field_text">
				<div class="col-sm-4">
					<label for="remember">Se souvenir de moi</label>
					<input type="checkbox" id="remember" name="remember" value="on">
				</div>
			</div>

			<div class="form-row field_submit">
				<input type="submit" id="_submit" name="_submit" class="ui button colored" value="Connexion">
			</div>
		<?php echo form_close(); ?>
		<div>
			Déjà inscrit ?&nbsp;&nbsp;<a href="/register/" class="ui inverted orange button">Inscription</a>
		</div>
	</div>

</div> <!-- END #primary -->