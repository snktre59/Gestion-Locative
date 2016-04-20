<html>
    <head>
		<!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
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
	    ========================================================================= 
	    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>-->
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
		<?php foreach($css as $url): ?>
			<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo $url; ?>" />
		<?php endforeach; ?>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav class="deep-orange accent-3">
            <div class="nav-wrapper">
                <a href="<?php echo base_url(); ?>" class="brand-logo">Loca'Gestion</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo base_url(); ?>"><i class="material-icons left">store</i>Accueil</a></li>
                    <li><a href="<?php echo base_url()."utilisateurs/connexion"; ?>"><i class="material-icons left">work</i>Espace Propriétaire</a></li>
                    <li><a href="<?php echo base_url()."utilisateurs/connexion"; ?>"><i class="material-icons left">vpn_key</i>Espace Locataire</a></li>
                </ul>
                <ul id="slide-out" class="side-nav">
                    <li><a href="sass.html"><i class="material-icons left">store</i>Accueil</a></li>
                    <li><a href="badges.html"><i class="material-icons left">work</i>Espace Propriétaire</a></li>
                    <li><a href="collapsible.html"><i class="material-icons left">vpn_key</i>Espace Locataire</a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons left">reorder</i></a>
            </div>
            </nav>
        </div>
        
        <div class="row" id="left-sidebar-row">

            <div id="left-navbar" class="col s2"style="overflow:auto"> <!-- Note that "m4 l3" was added -->
                <ul>
                    <li class="waves-effect waves-light"><a href="<?php echo base_url(); ?>"><span><i class="material-icons left">store</i><span>Accueil</a></li>
                    <li class="waves-effect waves-light"><a href="<?php echo base_url()."utilisateurs/connexion"; ?>"><i class="material-icons left">work</i>Espace Propriétaire</a></li>
                    <li class="waves-effect waves-light"><a href="<?php echo base_url()."utilisateurs/connexion"; ?>"><i class="material-icons left">vpn_key</i>Espace Locataire</a></li>
                    
                </ul>
            </div>
            
            <div class="col s10" id="main-container"> <!-- Note that "m8 l9" was added -->
                <?php foreach($tabFlashMessage as $flashDataMessage): ?>
                    <div id="card-alert" class="card <?php echo $flashDataMessage["statut"]; ?>">
                      <div class="card-content white-text">
                        <p><i class="material-icons left"><?php echo $flashDataMessage["logo"]; ?></i> <?php echo $flashDataMessage["message"]; ?></p>
                      </div>
                    </div>
                <?php endforeach; ?>
                
                <?php echo $output; ?>
            </div>
        </div>
        
		
        
        <?php foreach($js as $url): ?>
            <script type="text/javascript" src="<?php echo $url; ?>"></script> 
        <?php endforeach; ?>
        
        <script type="text/javascript">
            $(".button-collapse").sideNav();
        </script>
        
        <footer class="page-footer deep-orange accent-3">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2016 Un site conçu par <a href="http://www.e-contrast.fr" class="white-text">E-Contrast</a>
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
    </body>
</html>