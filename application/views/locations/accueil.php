<h2 class="header orange-text text-lighten-1" style="display: inline">Locations</h2>

<div id="liens" style="display: inline">
    <a data-target="modal1" class="waves-effect waves-light modal-trigger btn orange lighten-2"><i class="material-icons left">business</i>Ajouter</a>
</div><br /><br /><br />

<div class="row">
    <div class="col s12">
        <ul class="tabs">
        <?php foreach($listeLocations as $location): ?>
            <li class="tab col s3"><a href="#<?php echo $location->ID_LOCATION.''.$location->NOM_COURT; ?>"><?php echo $location->LIBELLE; ?></a></li>
        <?php endforeach; ?>
        </ul>
    </div>

    <?php $i=0; ?>
    <?php foreach($listeLocations as $location): ?>
        
    	<div id="<?php echo $location->ID_LOCATION.''.$location->NOM_COURT; ?>" class="col s12">

        <br />
            <div class="row">
                <div class="col s12 m4 l2"><p></p></div>
                <div class="col s12 m4 l8">
                    <p>
                        <div id="card-alert" class="card orange darken-4">
                            <div class="card-content white-text">
                                <p style="text-align: center">
                                    Adresse : <?php echo $location->ADRESSE." ".$location->CODE_POSTAL." ".$location->VILLE ; ?>
                                </p>
                            </div>
                        </div>
                    </p>
                </div>
                <div class="col s12 m4 l2"><p></p></div>
            </div><br />
            <?php if (isset($listeAppartements[$i])) : ?>
            <h3 class="header orange-text text-lighten-1" style="display: inline">Liste des appartements</h3>
    		
    		<table style="width:100%" id="TABLE_APPARTEMENTS">
	    		<thead>
					<tr>
				    	<th>ID</th>
						<th>Numéro de l'appartement</th>
					</tr>
	    		</thead>
	    		<tbody>
				    <tr>
				    	<?php foreach($listeAppartements as $appartement): ?>
					    	<?php if($appartement->FK_ID_LOCATION == $location->ID_LOCATION): ?>
						    	<td><?php echo $appartement->FK_ID_LOCATION; ?></td>
						    	<td><?php echo $appartement->NUMERO; ?></td>
						    <?php endif; ?>
						<?php endforeach; ?>
					</tr>
	    		</tbody>
			</table>
            <?php endif; ?>
    		<?php $i++; ?>
    	</div>
	<?php endforeach; ?>
	
	

</div>


<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Ajouter une location</h4>
        <!--
        <div id="card-alert" class="card green">
          <div class="card-content white-text">
            <p><i class="material-icons left">done</i> MESSAGE</p>
          </div>
        </div>-->
        <p>
            <div class="row">
                <form class="col s12" id="ajouterLocataire" method="POST">
                    <div class="row">
                        <div class="input-field col s10">
                            <i class="material-icons prefix">business</i>
                            <select id="typeBien">
                                <option value="" disabled selected>Choisir une option...</option>
                                <option value="MAISON">Une maison</option>
                                <option value="APPARTEMENT">Un appartement</option>
                            </select>
                            <label for="nom">Quel type de bien est-ce ? </label>
                        </div>
                    </div>
                    <div id="blocMaison" style="display: none">
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">format_color_text</i>
                                <input placeholder="Nom du bien" id="libelle" type="text" name="NOM" class="validate">
                                <label for="nom">Nom du bien : </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">room</i>
                                <input placeholder="Adresse du bien" id="adresse" type="text" name="ADRESSE" class="validate">
                                <label for="nom">Adresse : </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">label</i>
                                <input placeholder="Code postal du bien" id="codePostal" type="text" name="CODE_POSTAL" class="validate" maxlength="5">
                                <label for="codePostal">Code postal : </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">language</i>
                                <input placeholder="Ville du bien" id="ville" type="text" name="VILLE" class="validate">
                                <label for="ville">Nom du bien : </label>
                            </div>
                        </div>
                    </div>
                    <div id="blocAppartement" style="display: none">
                    	<div class="row">
	                        <div class="input-field col s10">
	                            <i class="material-icons prefix">business</i>
	                            <select id="maisonAppartement">
	                                <option value="" disabled selected>Choisir une option...</option>
	                                <?php foreach($listeLocations as $location): ?>
	                                	<option value="<?php echo $location->ID_LOCATION; ?>"><?php echo $location->LIBELLE; ?></option>
	                                <?php endforeach; ?>
	                            </select>
	                            <label for="nom">Sélectionnez le bien auquel il appartient :  </label>
	                        </div>
	                    </div>
                        <div class="row numeroPorte" style="display: none">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">label</i>
                                <input placeholder="Numero de porte" id="numero" type="text" name="NUMERO" class="validate" maxlength="10">
                                <label for="codePostal">Numéro de porte : </label>
                            </div>
                        </div>
                    </div>
            </div>
        </p>
    </div>
    <div class="modal-footer">
        
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        <a href="#!" id="ajouterValidation" class=" modal-action waves-effect waves-green btn-flat">Ajouter</a>
    </div>
    <input type="hidden" id="urlMaison" value="<?php echo base_url('locations/ajouterMaison'); ?>" />
    <input type="hidden" id="urlAppartement" value="<?php echo base_url('locations/ajouterAppartement'); ?>" />
    <input type="hidden" id="idProprietaire" name="idProprietaire" value="<?php echo $utilisateurCourant->getId(); ?>" />
    <input type="hidden" id="csrfTokenName" name="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>" />
    <input type="hidden" id="csrfTokenValue" name="csrfTokenValue" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    </form>
</div>