<!-- Inclusion du CSS du dataTable -->
<link href="<?php echo css_url("jquery.dataTables.min"); ?>" rel="stylesheet">

<h2 class="page-title">Gestion des évènements</h2>
<section class="widget">
    <div class="well well-sm">
        <blockquote class="blockquote-sm">Ajouter</blockquote>
        <div class="row margin-bottom text-align-center">
            <div class="col-md-8 col-md-offset-2">
                <a class="btn btn-lg btn-success btn-block" role="button" href="<?php echo site_url("admin/ajouter_evenement"); ?>"data-original-title="" title="">
                    Ajouter un évènement
                </a>
            </div>
        </div>
    </div>
</section> 
<section class="widget">
    <input type="hidden" id="url_supprimer_evenement" value="<?php echo site_url("admin/supprimer_evenement"); ?>" />
    <table id="ges_evenements" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Adresse</th>
                <th>Action</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Adresse</th>
                <th>Action</th>
            </tr>
        </tfoot>
 
        <tbody>
            <?php foreach($liste_evenements as $evenements) { ?>
            <tr id="<?php echo $evenements->id; ?>">
                <td><?php echo $evenements->nom; ?></td>
                <td><?php echo $evenements->date; ?></td>
                <td><?php echo $evenements->heure_debut; ?></td>
                <td><?php echo $evenements->heure_fin; ?></td>
                <td><?php echo $evenements->adresse_postale; ?>&nbsp; à &nbsp;<?php echo $evenements->ville; ?></td>
                <td>
                    <a href="<?php echo site_url("admin/modifier_evenement/".$evenements->id) ?>"><span class="label label-warning text-gray-dark fw-semi-bold">Modifier</span></a>
                    <a style="cursor:pointer" onclick="supprimer_evenement(<?php echo $evenements->id; ?>)"><span class="label label-danger">Supprimer</span></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>