<h2 class="page-title">Ajouter un évènement</h2>
<section class="widget">
    <header>
        <h4>
            <i class="fa fa-align-left"></i>
            Remplissez le formulaire pour ajouter un évènement
        </h4>
        <div class="widget-controls">
            <a href="form_elements.html#"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="form_elements.html#"><i class="fa fa-refresh"></i></a>
            <a href="form_elements.html#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </header>
    <div class="body">
        <?php $attributs = array('id' => 'formulaireAjoutEvenement', 'class' => 'form-horizontal form-label-left'/*, 'onsubmit' => 'return ajouter_evenement()'*/); ?>
        <?php echo form_open("", $attributs); ?>
            <fieldset>
                <legend class="section">Informations sur l'évènement</legend>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="nom">Nom : <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('nom'); ?></li></ul></label>
                    <div class="col-sm-8"><input type="text" id="nom" name="nom" required="required" value="<?php echo ($edition === 0) ? $evenement["nom"] : set_value('nom'); ?>" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="code_iframe">Code iFrame : &nbsp;&nbsp;<a target="_blank" href="http://www.e-monsite.com/pages/tutoriels/services-externes/afficher-une-carte-de-localisation-geographique-sur-votre-site.html">Qu'est-ce qu'un code iFrame ?</a><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('code_iframe'); ?></li></ul></label> 
                    <div class="col-sm-8"><input type="text" id="code_iframe" name="code_iframe" value="<?php echo ($edition === 0) ? $evenement["code_iframe"] : set_value('code_iframe'); ?>" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="lien_evenement">Lien vers l'évènement : <ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('lien_evenement'); ?></li></ul></label>
                    <div class="col-sm-8"><input type="text" id="lien_evenement" name="lien_evenement" value="<?php echo ($edition === 0) ? $evenement["lien_evenement"] : set_value('lien_evenement'); ?>" class="form-control"></div>
                </div>
            </fieldset>
            <fieldset>
                <legend class="section">Horaires de l'évènement</legend>
                
                <div class="form-group">
                    <label for="date" class="control-label col-sm-4">Date : <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('date'); ?></li></ul></label>
                    <div class="col-sm-6"><input id="date" class="date form-control" required="required" type="text" name="date" value="<?php echo ($edition === 0) ? $evenement["date"] : set_value('date'); ?>" data-parsley-id="8840"></div>
                </div>
                <div class="form-group">
                    <label for="heure_debut" class="control-label col-sm-4">Heure de début : <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('heure_debut'); ?></li></ul></label>
                    <div class="col-sm-6"><input id="heure_debut" class="heure_debut form-control" required="required" type="text" name="heure_debut" value="<?php echo ($edition === 0) ? $evenement["heure_debut"] : set_value('heure_debut'); ?>" data-parsley-id="8840"></div>
                </div>
                <div class="form-group">
                    <label for="heure_fin" class="control-label col-sm-4">Heure de fin : <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('heure_fin'); ?></li></ul></label>
                    <div class="col-sm-6"><input id="heure_fin" class="heure_fin form-control" required="required" type="text" name="heure_fin" value="<?php echo ($edition === 0) ? $evenement["heure_fin"] : set_value('heure_fin'); ?>" data-parsley-id="8840"></div>
                </div>
            </fieldset>
            <fieldset>
                <legend class="section">Localisation de l'évènement</legend>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="adresse_postale">Adresse postale : <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('adresse_postale'); ?></li></ul></label>
                    <div class="col-sm-8"><input type="text" id="adresse_postale" name="adresse_postale" value="<?php echo ($edition === 0) ? $evenement["adresse_postale"] : set_value('adresse_postale'); ?>" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="code_postal">Code postal : <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('code_postal'); ?></li></ul></label>
                    <div class="col-sm-8"><input type="text" id="code_postal" name="code_postal" value="<?php echo ($edition === 0) ? $evenement["code_postal"] : set_value('code_postal'); ?>" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="ville">Ville : <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('ville'); ?></li></ul></label>
                    <div class="col-sm-8"><input type="text" id="ville" name="ville" value="<?php echo ($edition === 0) ? $evenement["ville"] : set_value('ville'); ?>" class="form-control"></div>
                </div>
            </fieldset>
            
            <div class="form-actions">
                <div class="row">
                    <div class="col-sm-offset-4 col-sm-7">
                        <div class="btn-toolbar">
                            <button type="submit" class="btn btn-success">Modifier</button>
                            <button type="button" onclick="window.location.href='<?php echo site_url("admin/accueil_evenements"); ?>'" class="btn btn-danger">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="url_ajouter_evenement_validation" value="<?php echo site_url("admin/ajouter_evenement_validation"); ?>" />
        <?php echo form_close(); ?>
        <div id="response"></div>
    </div>
</section>