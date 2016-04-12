<!-- Inclusion du CSS du dataTable -->
<link href="<?php echo css_url("jquery.dataTables.min"); ?>" rel="stylesheet">

<h2 class="page-title">Gestion des actualités</h2>
<section class="widget">
    <div class="well well-sm">
        <blockquote class="blockquote-sm">Ajouter</blockquote>
        <div class="row margin-bottom text-align-center">
            <div class="col-md-8 col-md-offset-2">
                <a class="btn btn-lg btn-success btn-block" role="button" href="<?php echo site_url("admin/ajouter_actualite"); ?>"data-original-title="" title="">
                    Ajouter une actualité
                </a>
            </div>
        </div>
    </div>
</section>
<section class="widget">
    <input type="hidden" id="url_supprimer_actualite" value="<?php echo site_url("admin/supprimer_actualite"); ?>" />
    <table id="ges_actualites" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Titre</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </tfoot>
 
        <tbody>
            <?php foreach($liste_actualites as $actualites) { ?>
            <tr id="<?php echo $actualites->id; ?>">
                <td><?php echo $actualites->titre; ?></td>
                <td><?php echo strftime('%A %e %B %Y à %H:%M', strtotime($actualites->date_creation));?></td>
                <td>
                    <a href="<?php echo site_url("admin/modifier_actualite/".$actualites->id) ?>"><span class="label label-warning text-gray-dark fw-semi-bold">Modifier</span></a>
                    <a style="cursor:pointer" onclick="supprimer_actualite(<?php echo $actualites->id; ?>)"><span class="label label-danger">Supprimer</span></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>