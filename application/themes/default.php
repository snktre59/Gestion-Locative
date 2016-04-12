<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
	<head>
		<!-- Mobile Specific 
	    ========================================================================= -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
	
	    <!-- META TAGS
	    ========================================================================= -->
	    <meta name="description" content="<?php echo $meta_description; ?>">
	
	    <!-- Title Tag
	    ========================================================================= -->
		<title><?php echo $titre; ?></title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
		
		<!-- Browser Specical Files
	    ========================================================================= -->
	    <!--[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
		<!-- Site Favicon
	    ========================================================================= -->
	    <link rel="icon" type="image/png" href="<?php echo img_url("favicon.png") ?>" title="Favicon">
		
		<!-- WP HEAD
	    ========================================================================= -->
	    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
		
		<?php foreach($css as $url): ?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
		<?php endforeach; ?>
		
		<script type="text/javascript" src="<?php echo js_url("jquery-1.11.1.min") ?>"></script> 

	</head>

	<body>
		<div id="page" class="hfeed site">
            
    <header id="masthead" class="ui page site-header" role="banner">

        <div id="search-container" class="search-box-wrapper">
            <div class="container">
                <i class="big search icon"></i>
                <div class="search-box">
                    <form action="#" class="search-form" role="search" >
                        <label>
                            <span class="screen-reader-text">Rechercher :</span>
                            <input type="search" name="s" value="" title="Appuyez sur 'Entrer' pour lancer la recherche" placeholder="Rechercher.." class="search-field">
                        </label>
                        <input type="submit" value="Recherche" class="search-submit">
                    </form>
                </div>
            </div>
        </div><!--/ #search-container -->

        <div class="topbar">
            <div class="container">
                <div class="topbar_left fleft">
                    <nav class="topbar_menu_left">
                        <ul style="margin-top: 5px;">
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Dates</a></li>
                            <li><a href="#">Nous contacter</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="search-toggle fright">
                    <i class="search icon link icon"></i>
                </div>
                <div class="topbar_right fright">
                    <nav class="topbar_menu_left">
                        <ul style="margin-top: 5px;">
                            <li><a href="#">Mon Compte</a></li>
                            <li><a href="#">Déconnexion</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="topbar_right fright">
                    <nav class="topbar_menu_left">
                        <ul style="margin-top: 7px;">
                            <div class="ui circular facebook icon button" style="height:32px;vertical-align: bottom;width: 33px;">
                                <a href="https://www.facebook.com/pages/Under-Shift/148835128508161" style="color:white" target="_blank"><i class="facebook icon"></i></a>
                            </div>
                            <div class="ui circular twitter icon button" style="height:32px">
                                <i class="twitter icon"></i>
                            </div>
                            <div class="ui circular linkedin icon button" style="height:32px">
                                <i class="linkedin icon"></i>
                            </div>
                            <div class="ui circular google plus icon button" style="height:32px">
                                <i class="google plus icon"></i>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div> <!-- END .topbar -->

        <div class="header">
            <div class="container">
                <div class="logo_area fleft">
                    <a href="<?php echo base_url()."accueil/index"; ?>" rel="home">
                        <img src="<?php echo img_url("logo.png") ?>" alt="Under Shift - Logo">
                    </a>
                </div>
                <div class="header_right fright">
                    <a href="index.html#" class="event_count_wrapper clearfix">
                        <div class="event_countdown">

                        </div>
                        <span class="next_event_text">Prochain événement dans :</span>
                    </a>
                </div>
            </div>
        </div> <!-- END .header -->

    </header><!-- END #masthead -->

    <div id="boxed_content" class="boxed_content">
        <div class="inner">

            <nav id="primary-navigation" class="site-navigation primary-navigation clearfix" role="navigation">
                <button class="menu-toggle">Menu</button>
                <a href="index.html#content" class="screen-reader-text skip-link">Passer au contenu</a>
                <div class="menu-all-pages-container">
                    <ul class="nav-menu">
                        <li class="current-menu-item"><a href="<?php echo base_url()."accueil/index"; ?>"><i class="large vtop home icon"></i>Accueil</a></li>
                        <li class="menu-item-has-children"><a href="#"><i class="large vtop book icon"></i>Evenements</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url()."evenements/liste"; ?>"><i class="large vtop calendar icon"></i>Dates de concert</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><i class="large vtop bullseye icon"></i>Albums</a>
                            <ul class="sub-menu">
                                <li><a href="#">Par obligation</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><i class="large vtop archive icon"></i>Médias</a>
                            <ul class="sub-menu">
                                <li><a href="#"><i class="large vtop film icon"></i> Vidéos Live</a></li>
                                <li><a href="#"><i class="large vtop file image outline icon"></i> Fonds d'écran</a></li>
                                <li><a href="#"><i class="large vtop camera retro icon"></i> Portfolio</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><i class="large vtop empty star icon"></i>Artistes</a>
                            <ul class="sub-menu">
                                <li><a href="#"><i class="large vtop pointing right icon"></i>Nicolas</a></li>
                                <li><a href="#"><i class="large vtop pointing right icon"></i>Christophe</a></li>
                                <li><a href="#"><i class="large vtop pointing right icon"></i>Valérian</a></li>
                                <li><a href="#"><i class="large vtop pointing right icon"></i>Valentin</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><i class="large vtop pointing right icon"></i>US Club</a>
                            <ul class="sub-menu">
                                <li><a href="#"><i class="large vtop zoom icon"></i> + d'infos/s'abonner</a></li>
                                <?php if(!$utilisateurCourant->estAuthentifie()) { ?>
                                <li><a href="<?php echo base_url()."utilisateurs/inscription"; ?>"><i class="large vtop money icon"></i> Rejoindre</a></li>
                                <li><a href="<?php echo base_url()."utilisateurs/connexion"; ?>"><i class="large vtop sign in icon"></i> Connexion</a></li>
                                <?php } ?>
                                <?php if($utilisateurCourant->estAuthentifie()) { ?>
                                <li><a href="<?php echo base_url()."utilisateurs/deconnexion"; ?>"><i class="large vtop sign out icon"></i> Déconnexion</a></li>
                                <?php } ?>
                                <?php if($utilisateurCourant->getDroitsCompte() == "ADMINISTRATEUR"){ ?>
                                    <li><a href="<?php echo base_url()."admin/index"; ?>"> Administration</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="page_gallery_filterable.php.html"><i class="large vtop users icon"></i>Communauté</a>
                            <ul class="sub-menu">
                                <li><a href="https://www.facebook.com/pages/Under-Shift/148835128508161" target="_blank"><i class="large facebook icon popup" data-content="Facebook" data-variation="inverted"></i>Facebook</a></li>
                                <li><a href="https://www.youtube.com/channel/UC6APwPhJ7eLW4KsvWKDvaeQ/feed"><i class="large youtube icon popup" data-content="Youtube" data-variation="inverted"></i>Youtube</a></li>
                                <li><a href="#"><i class="large spotify icon popup" data-content="Spotify" data-variation="inverted"></i>Spotify</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a href="<?php echo base_url()."contact/index"; ?>"><i class="large vtop mail outline icon"></i>Contact</a></li>
                    </ul>
                </div>

                <!--<ul class="header_social">
                    <li><a href="https://www.facebook.com/pages/Under-Shift/148835128508161" title="Facebook"><i class="large facebook icon popup" data-content="Facebook" data-variation="inverted"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UC6APwPhJ7eLW4KsvWKDvaeQ" title="Youtube"><i class="large youtube play icon popup" data-content="Youtube" data-variation="inverted"></i></a></li>
                </ul>-->
            </nav>
            
            
            <div id="content" class="site-content single">

        	<div class="page-inner">
        		<div class="container">
                    <?php foreach($tabFlashMessage as $flashMessage): ?>
                        <div class="ui <?php echo $flashMessage['statut'];?> inverted segment">
                            <p><?php echo $flashMessage['message'];?></p>
                        </div>
                    <?php endforeach; ?>
                    
                    <!-- Affichage de la page -->
			        <?php echo $output; ?>
                    
                </div>
		    </div> <!-- END #boxed-wrapper -->
		</div>
</div>
</div>
</div>
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="inner">
            <div class="four column stackable doubling ui grid">
                <div class="column">
                    <aside class="widget">
                        <h4 class="widget_heading">Restez connecté</h4>
                        <div class="widget_content">
                            <p>Rejoignez-nous sur les réseaux sociaux pour être informé des dernières actualités !</p>
                            <a href="index.html#" class="tiny ui twitter button"><i class="twitter icon"></i>Twitter</a>
                            <a href="index.html#" class="tiny ui facebook button"><i class="facebook icon"></i>FaceBook</a>
                            <a href="index.html#" class="tiny ui spotify button"><i class="spotify icon"></i>Spotify</a>
                            <a href="index.html#" class="tiny ui soundcloud button"><i class="soundcloud icon"></i>SoundCloud</a>
                        </div>
                    </aside>
                </div>
                <div class="column">
                    <aside class="widget widget_nav_menu">
                        <h4 class="widget_heading">Découvrir</h4>
                        <div class="widget_content">
                            <ul>
                                <li><a href="#">Dates de concerts</a></li>
                                <li><a href="#">Magasin</a></li>
                                <li><a href="#">Actualités</a></li>
                                <li><a href="#">Albums</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="column">
                    <aside class="widget widget_nav_menu">
                        <h4 class="widget_heading">Média</h4>
                        <div class="widget_content">
                            <ul>
                                <li><a href="#">Photos</a></li>
                                <li><a href="#">Vidéos</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <!--<div class="column">
                    <aside class="widget widget_twitter">
                        <h4 class="widget_heading">Twitter Feed</h4>
                        <div class="widget_content">
                            <ul>
                                <li>
                                    Ut enim ad minim veniam <a href="http://t.co/LRyHvAcxeF">http://t.co/LRyHvAcxeF</a><br>
                                    <small>July 17, 2014 09:07 pm</small>
                                </li>

                                <li>
                                    Quis nostrud exercitation <a href="http://t.co/LRyHvAcxeF">http://t.co/LRyHvAcxeF</a><br>
                                    <small>July 17, 2014 09:07 pm</small>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>-->
            </div>
        </div>
        
        <div class="footer_copy">
            <div class="two column stackable ui grid">
                <div class="column copy_left">
                    <p><a href="index.html#">Nicolas PAMART</a> Copyright © 2015. Tous droits réservés.</p>
                </div>
                <div class="column copy_right">
                    <p>Design par <a href="#">Nicolas PAMART</a>.</p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- END #colophon-->

</div><!-- END #page -->
		
	<?php foreach($js as $url): ?>
		<script type="text/javascript" src="<?php echo $url; ?>"></script> 
	<?php endforeach; ?>

	</body>

</html>