<h2 class="page-title">Ajouter une actualité</h2>

<div class="row">
            <div class="col-lg-12">
                <section class="widget">
                    <header>
                        <h4><i class="fa fa-file-alt"></i> Actualité <small>Remplissez les champs du formulaire</small></h4>
                    </header>
                    <div class="body">
                        <?php $attributs = array('id' => 'formulaireAjoutEvenement', 'class' => 'form-horizontal form-label-left'/*, 'onsubmit' => 'return ajouter_evenement()'*/); ?>
                        <?php echo form_open_multipart('admin/ajouter_actualite', $attributs);?>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="titre">Titre <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('titre'); ?></li></ul></label>
                                    <div class="col-sm-9">
                                        <input type="text" id="titre" name="titre" class="form-control" required="required" value="<?php echo set_value('titre'); ?>"data-parsley-id="8173"><ul class="parsley-errors-list" id="parsley-id-8173"></ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="content"> 
                                        Contenu <span class="required">*</span><ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('contenu'); ?></li></ul>
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea rows="10" class="form-control" id="contenu" name="contenu" value="<?php echo set_value('contenu'); ?>">
                                            
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="article-tags" class="control-label col-sm-3">Image <ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('image'); ?></li></ul></label>
                                    <div class="col-sm-9">
                                        <input type="file" id="image" name="image"
                                               class="select-block-level" value="<?php echo set_value('image'); ?>">
                                        <span class="help-block">Choisissez une image au format .JPG, .PNG ou .JPEG</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="article-tags" class="control-label col-sm-3">Tags <ul class="parsley-errors-list filled"><li class="parsley-required"><?php echo form_error('tags'); ?></li></ul></label>
                                    <div class="col-sm-9">
                                        <input type="text" id="article-tags" name="tags"
                                               class="select-block-level" value="<?php echo set_value('tags'); ?>">
                                        <span class="help-block">Ecrivez ou sélectionnez un tag et pressez "Entrée" pour l'ajouter.</span>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="btn-toolbar">
                                            <button type="submit" class="btn btn-success">Ajouter</button>
                                            <button type="button" onclick="window.location.href='<?php echo site_url("admin/accueil_actualites"); ?>'" class="btn btn-danger">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </section>
            </div>
        </div>