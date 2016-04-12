<div class="container">
                    
						<div id="primary" class="content-area">
							
                            <header class="page-header">
                                <h1 class="page-title">Contactez-nous</h1>
                            </header>

                            <div class="entry-content">
                                <div class="map-contact">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9514634977954!2d-122.08096280000004!3d37.414622099999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb755a2bbfcef%3A0x7207e9609eaa06cd!2s1500+N+Shoreline+Blvd%2C+Mountain+View%2C+CA+94043!5e0!3m2!1sen!2s!4v1409742972066" width="100%" height="250" frameborder="0" style="border:0"></iframe>
                                    <div class="address ui three doubling column grid">
                                        <div class="column">
                                            <i class="home icon"></i> Nord
                                        </div>
                                        <div class="column">
                                            <i class="call icon"></i> +33 (0)7 82 87 96 06
                                        </div>
                                        <div class="column">
                                            <i class="mail outline icon"></i> <a href="mailto:undershiftgroupe@gmail.com">undershiftgroupe@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                                <h4>Contactez-nous !</h4>
                                <p>Pour partager vos impressions, faire une réclamation, proposer un évènement, utilisez le formulaire de contact ci-dessous !</p>
                                  <?php $attributs = array('id' => 'contact_form', 'class' => 'form-horizontal form-label-left'); ?>
		                          <?php echo form_open("contact/index", $attributs); ?>
                                    <div class="form-row field_text">
                                        <label for="contact_name">Nom : </label><em>(requis)</em><br>
                                        <input id="contact_name" class="input_text required" type="text" value="<?php echo set_value('nom'); ?>" name="nom">
                                    </div>
                                    <p><?php echo form_error('nom', '<div class="ui red inverted segment">', '</div>'); ?></p>
                                    
                                    <div class="form-row field_text">
                                        <label for="contact_phone">Numéro de téléphone : </label><em>(optionnel)</em><br>
                                        <input id="contact_phone" class="input_text" type="text" value="<?php echo set_value('telephone'); ?>" name="telephone">
                                    </div>
                                    <p><?php echo form_error('telephone', '<div class="ui red inverted segment">', '</div>'); ?></p>

                                    <div class="form-row field_text">
                                        <label for="contact_email">Adresse email : </label><em>(requis)</em><br>
                                        <input id="contact_email" class="input_text required" type="text" value="<?php echo set_value('adresse_email'); ?>" name="adresse_email">
                                    </div>
                                    <p><?php echo form_error('adresse_email', '<div class="ui red inverted segment">', '</div>'); ?></p>
                                    
                                    <div class="form-row field_text">
                                        <label for="contact_subject">Sujet : </label><em>(requis)</em><br>
                                        <input id="contact_subject" class="input_text required" type="text" value="<?php echo set_value('sujet'); ?>" name="sujet">
                                    </div>
                                    <p><?php echo form_error('sujet', '<div class="ui red inverted segment">', '</div>'); ?></p>
                                    
                                    <div class="form-row field_textarea">
                                        <label for="contact_message">Message : </label><br>
                                        <textarea id="contact_message" class="input_textarea" type="text" value="<?php echo set_value('message'); ?>" name="message"></textarea>
                                    </div>
                                    <p><?php echo form_error('message', '<div class="ui red inverted segment">', '</div>'); ?></p>
                                    
                                    <div class="form-row field_submit">
                                        <input type="submit" value="Envoyer" class="ui button colored">
                                    </div>
                                <?php echo form_close(); ?> <!-- END #contact_form -->
                                
                            </div>

						</div> <!-- END #primary -->

						<div id="secondary" class="widget-area" role="complementary">
							<aside class="widget event_widget">
                                <h4 class="widget-title">Prochains concerts</h4>
                                <div class="widget-content">
    	                           
                                   <?php foreach($tableau_evenements as $evenement) { ?>
                                    <article class="post">
                                        <div class="event_left">
                                            <div class="event_date"><?php echo strftime('%e', strtotime($evenement->date)); ?></div>
                                            <div class="event_month"><?php echo strftime('%b', strtotime($evenement->date)); ?></div>
                                        </div>
                                        <div class="event_detail">
                                            <h2 class="event_title"><a href="index.php.html#"><?php echo $evenement->nom; ?></a></h2>
                                            <div class="event_time"><i class="time icon"></i> <?php echo strftime('%A %e %B %Y', strtotime($evenement->date)); ?></div>
                                            <div class="event_location"><i class="map marker icon"></i> <?php echo $evenement->adresse_postale; ?><br />
                                            <?php echo $evenement->code_postal." ".$evenement->ville; ?></div>
                                            <a href="<?php echo $evenement->lien_evenement; ?>" class="event_button ui button colored">Lien</a>
                                        </div>
                                    </article>
                                    <?php } ?>

                                </div>
                            </aside>

                            <aside class="widget">
                                <h4 class="widget-title">Dernières vidéos</h4>
                                <div class="widget-content dark_shadow">
                                    <div class="video_lightbox">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/SojTrYLS5pk" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </aside>

                           <aside class="widget">
                                <h4 class="widget-title">SoundCloud</h4>
                                <div class="widget-content dark_shadow">
                                    <iframe width="95%" height="280" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/202053026&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
                                </div>
                            </aside>

						</div> <!-- END secondary -->    
					</div>