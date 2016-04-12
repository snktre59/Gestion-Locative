<div id="home-slider-1" class="royalSlider rsMinW">

    <div class="rsContent slide1">
        <a class="rsImg" href="<?php echo img_url("/slider/slider1.jpg") ?>">Slider 1</a>
        <div class="bContainer">
            <div class="rsABlock rs_text rs_text_meta" data-move-effect="top"></div>
            <div class="rsABlock rs_text_box" data-move-effect="bottom">
                <span>Nouveaux titres disponibles !</span>
            </div>
            <div class="rsABlock" data-move-effect="bottom">
                <a href="index.html#" class="ui huge button colored">Ecouter</a>
            </div>
        </div>
    </div>



</div> <!-- END royalSlider -->
<script id="addJS">
    jQuery(document).ready(function($) {
        jQuery.rsCSS3Easing.easeOutBack = 'cubic-bezier(0.175, 0.885, 0.320, 1.275)';
        $('#home-slider-1').royalSlider({
            arrowsNav: true,
            arrowsNavAutoHide: true,
            fadeinLoadedSlide: false,
            controlNavigationSpacing: 0,
            controlNavigation: 'bullets',
            imageScaleMode: 'none',
            imageAlignCenter:false,
            blockLoop: true,
            loop: true,
            numImagesToPreload: 6,
            transitionType: 'fade',
            keyboardNavEnabled: true,
            block: {
                delay: 400
            }
        });
    });
</script>
<div class="page-inner">
    <div class="container">
        <section class="top_feature">
                            <div class="two column stackable ui grid">
                                <div class="column">
                                    <div id="favoriteplay" class="box_content_wrapper">
                                        <h4 class="widget_heading">Derniers Morceaux</h4>
                                        <div class="box_content">
                                            <div class="player_box dark_shadow">
                                                <div class="player_area">
                                                    <script type="text/javascript">
                                                    jQuery(document).ready(function($) {
                                                        var myPlaylist = [

                                                            {
                                                                mp3:'<?php echo music_url("par_obligation/le_bon_ordre.mp3") ?>',
                                                                //oga:'thumb/audio/1.ogg',
                                                                title:'Le Bon Ordre',
                                                                artist:'Under Shift',
                                                                rating:4,
                                                                buy:'Gratuit',
                                                                price:"<a href='<?php echo music_url("par_obligation/le_bon_ordre.mp3") ?>' target='_blank' title='Télécharger le morceau' download><i class='cloud download icon'></i></a>",
                                                                duration:'3:00'
                                                                //cover:'mix/1.png'
                                                            },
                                                            {
                                                                mp3:'<?php echo music_url("par_obligation/le_chant_des_muets.mp3") ?>',
                                                                //oga:'thumb/audio/1.ogg',
                                                                title:'Le Chant Des Muets',
                                                                artist:'Under Shift',
                                                                rating:4,
                                                                buy:'',
                                                                price:"<a href='<?php echo music_url("par_obligation/le_chant_des_muets.mp3") ?>' target='_blank' title='Télécharger le morceau' download><i class='cloud download icon'></i></a>",
                                                                duration:'3:00'
                                                                //cover:'mix/1.png'
                                                            }
                                                        ];

                                                        $('.player_area').ttwMusicPlayer(myPlaylist, {
                                                            autoPlay:false,
                                                            tracksToShow:2,
                                                            jPlayer:{
                                                                swfPath:'assets/js' //You need to override the default swf path any time the directory structure changes
                                                            }
                                                        });
                                                    });
                                                </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div id="albums_carousel" class="box_content_wrapper">
                                        <h4 class="widget_heading">Derniers Albums</h4>
                                        <div class="box_content">
                                            <div class="home_album_carousel owl-carousel">
                                                <div class="ac_item dark_shadow">
                                                    <a href="#">
                                                        <?php echo img("albums/par_obligation/cover.jpg", "Under Shift - Par obligation") ?>
                                                        <div class="overlay"></div>
                                                        <div class="overlay_title">
                                                            <h2>Par Obligation</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                                <script type="text/javascript">
                                                jQuery(document).ready(function($) {
                                                        $(".home_album_carousel").owlCarousel({
                                                            items : 2,
                                                            itemsDesktop: [1199,2],
                                                            itemsDesktopSmall: [979,1],
                                                            itemsTablet: [768,2],
                                                            navigationText: ['<i class="angle left icon"></i>','<i class="angle right icon"></i>'],
                                                            lazyLoad : true,
                                                            navigation : true
                                                        });
                                                });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        

                        

						<div id="primary" class="content-area">
							
                            <div class="recent_news">
                                <h4 class="widget_heading">Dernières Actualités</h4>
    	               <?php foreach ($tableau_actualites as $actualite) { ?>
                       
                                <article class="post clearfix">
                                    <div class="entry-thumb">
                                        <a href="#">
                                            <?php echo img($actualite->url_image, $actualite->tags); ?>
                                        </a>
                                    </div>
                                    <div class="entry-detail">
                                        <div class="entry-header">
                                            <h2 class="entry-title"><a href=""><?php echo $actualite->titre; ?></a></h2>
                                            <div class="entry-meta">
                                                <span class="posted-on"><?php echo strftime('%A %e %B %Y', strtotime($actualite->date_creation)); ?></span>
                                                <span class="comments-link">
                                                    <span class="sep">/</span>
                                                    <a href="index.php.html#">Commentaires</a>
                                                </span>
                                            </div>
                                            <div class="entry-content">
                                                <p><?php echo $actualite->contenu; ?></p>
                                            </div>
                                            <div class="entry-more">
                                                <a href="index.php.html#" class="ui button">Lire</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                        <?php }?>
                            </div>

						</div> <!-- END #primary -->

						<div id="secondary" class="widget-area" role="complementary">
							<aside class="widget event_widget">
                                <h4 class="widget-title">Prochains concerts</h4>
                                <div class="widget-content">
    	                           
                                   <?php foreach($tableau_evenements as $evenement) { ?>
                                    <article class="post">
                                        <div class="event_left">
                                            <div class="event_date"><?php echo utf8_encode(strftime('%e', strtotime($evenement->date))); ?></div>
                                            <div class="event_month"><?php echo utf8_encode(strftime('%b', strtotime($evenement->date))); ?></div>
                                        </div>
                                        <div class="event_detail">
                                            <h2 class="event_title"><a href="index.php.html#"><?php echo $evenement->nom; ?></a></h2>
                                            <div class="event_time"><i class="time icon"></i> <?php echo utf8_encode(strftime('%A %e %B %Y', strtotime($evenement->date))); ?> à partir de <?php echo $evenement->heure_debut; ?></div>
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

					</div><!--/.container -->
                    
                    <div class="container">
                        <!--
                        <div id="gallery_carousel">
                            <h4 class="widget_heading">Photos récentes</h4>
                            <div class="box_content">
                                <div class="gallery_carousel owl-carousel">

                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery1.jpg">
                                                <img src="thumb/gallery/gallery1_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery2.jpg">
                                                <img src="thumb/gallery/gallery2_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery3.jpg">
                                                <img src="thumb/gallery/gallery3_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery4.jpg">
                                                <img src="thumb/gallery/gallery4_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery5.jpg">
                                                <img src="thumb/gallery/gallery5_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery6.jpg">
                                                <img src="thumb/gallery/gallery6_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery7.jpg">
                                                <img src="thumb/gallery/gallery7_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery8.jpg">
                                                <img src="thumb/gallery/gallery8_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="gallery_item ">
                                        <div class="image-lightbox">
                                            <a class="popup-image" href="thumb/gallery/gallery9.jpg">
                                                <img src="thumb/gallery/gallery9_940_500.jpg" alt="">
                                                <span class="image-button"></span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                        $(".gallery_carousel").owlCarousel({
                                            items : 5,
                                            itemsDesktop: [1199,5],
                                            itemsDesktopSmall: [979,4],
                                            itemsTablet: [768,2],
                                            navigationText: ['<i class="angle left icon"></i>','<i class="angle right icon"></i>'],
                                            lazyLoad : true,
                                            navigation : true
                                        });
                                });
                                </script>
                            </div>
                        </div>--> <!--/.gallery_carousel -->
                    </div>
