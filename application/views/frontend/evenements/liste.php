<div id="primary" class="content-area">
							
        <header class="page-header">
            <h1 class="page-title">Prochains évènements</h1>
        </header>

        <div class="events_page">
            
            <div class="event_widget">
                
                <?php foreach($tableau_evenements as $evenement) { ?>
                <article id="post-ID" class="post event_item dark_shadow clearfix">
                    <div class="event_left">
                        <div class="event_date"><?php echo utf8_encode(strftime('%e', strtotime($evenement->date))); ?></div>
                        <div class="event_month"><?php echo utf8_encode(strftime('%b', strtotime($evenement->date))); ?></div>
                    </div>
                    <div class="event_detail">
                        <h2 class="event_title"><a href="#"><?php echo $evenement->nom; ?></a></h2>
                        <div class="event_time"><i class="time icon"></i> <?php echo utf8_encode(strftime('%A %e %B %Y', strtotime($evenement->date))); ?></div>
                        <div class="event_location"><i class="map marker icon"></i> <?php echo $evenement->adresse_postale; ?> <?php echo " ".$evenement->code_postal." ".$evenement->ville; ?></div>
                        <a href="<?php echo $evenement->lien_evenement; ?>" class="event_button ui button colored">Lien</a>
                    </div>
                </article>
                <?php } ?>
            </div>

        </div>

	</div> <!-- END #primary -->

	<div id="secondary" class="widget-area" role="complementary">

	</div> <!-- END secondary -->