<div id="card-stats">
    <div class="row">
        <div class="col s12 m6 l3">
            <div class="card hoverable">
                <div class="card-content  green white-text">
                    <p class="card-stats-title"><i class="material-icons">group_add</i> Nombre de locataires</p>
                    <h4 class="card-stats-number">3</h4>
                    <!--<p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="green-text text-lighten-5">from yesterday</span>-->
                    </p>
                </div>
                <div class="card-action  green darken-2">
                    <div id="clients-bar" class="center-align"><canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card hoverable">
                <div class="card-content pink lighten-1 white-text">
                    <p class="card-stats-title"><i class="material-icons">euro_symbol</i> Recettes</p>
                    <h4 class="card-stats-number">12000 €</h4>
                    <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> cette année</span>
                    </p>
                </div>
                <div class="card-action  pink darken-2">
                    <div id="invoice-line" class="center-align"><canvas width="304" height="25" style="display: inline-block; width: 304px; height: 25px; vertical-align: top;"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card hoverable">
                <div class="card-content blue-grey white-text">
                    <p class="card-stats-title"><i class="material-icons">today</i> Rendez-vous</p>
                    <h4 class="card-stats-number">1</h4>
                    <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> cette semaine</span>
                    </p>
                </div>
                <div class="card-action blue-grey darken-2">
                    <div id="profit-tristate" class="center-align"><canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card hoverable">
                <div class="card-content purple white-text">
                    <p class="card-stats-title"><i class="material-icons">question_answer</i> Messages</p>
                    <h4 class="card-stats-number">3</h4>
                    <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> non lu(s)</span>
                    </p>
                </div>
                <div class="card-action purple darken-2">
                    <div id="sales-compositebar" class="center-align"><canvas width="214" height="25" style="display: inline-block; width: 214px; height: 25px; vertical-align: top;"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="card-widgets">
    <div class="row">

        <div class="col s12 m12 l4">
            <ul id="task-card" class="collection with-header">
                <li class="collection-header cyan">
                    <h4 class="task-card-title">Mes messages</h4>
                    <!--<p class="task-card-date">March 26, 2015</p>-->
                </li>
                <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <input type="checkbox" id="task1">
                    <label for="task1" style="text-decoration: none;">Create Mobile App UI. <a href="#" class="secondary-content"><span class="ultra-small">Today</span></a>
                    </label>
                    <span class="task-cat teal">Mobile App</span>
                </li>
                <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <input type="checkbox" id="task2">
                    <label for="task2" style="text-decoration: none;">Check the new API standerds. <a href="#" class="secondary-content"><span class="ultra-small">Monday</span></a>
                    </label>
                    <span class="task-cat purple">Web API</span>
                </li>
                <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <input type="checkbox" id="task3" checked="checked">
                    <label for="task3" style="text-decoration: line-through;">Check the new Mockup of ABC. <a href="#" class="secondary-content"><span class="ultra-small">Wednesday</span></a>
                    </label>
                    <span class="task-cat pink">Mockup</span>
                </li>
                <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <input type="checkbox" id="task4" checked="checked" disabled="disabled">
                    <label for="task4" style="text-decoration: line-through;">I did it !</label>
                    <span class="task-cat cyan">Mobile App</span>
                </li>
            </ul>
        </div>

        <div class="col s12 m6 l4">
            <div id="flight-card" class="card">
                <div class="card-header amber darken-2">
                    <div class="card-title">
                        <h4 class="flight-card-title">Flight</h4>
                        <p class="flight-card-date">June 18, Thu 04:50</p>
                    </div>
                </div>
                <div class="card-content-bg white-text">
                    <div class="card-content">
                        <div class="row flight-state-wrapper">
                            <div class="col s5 m5 l5 center-align">
                                <div class="flight-state">
                                    <h4 class="margin">LDN</h4>
                                    <p class="ultra-small">London</p>
                                </div>
                            </div>
                            <div class="col s2 m2 l2 center-align">
                                <i class="mdi-device-airplanemode-on flight-icon"></i>
                            </div>
                            <div class="col s5 m5 l5 center-align">
                                <div class="flight-state">
                                    <h4 class="margin">SFO</h4>
                                    <p class="ultra-small">San Francisco</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6 m6 l6 center-align">
                                <div class="flight-info">
                                    <p class="small"><span class="grey-text text-lighten-4">Depart:</span> 04.50</p>
                                    <p class="small"><span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                                    <p class="small"><span class="grey-text text-lighten-4">Terminal:</span> B</p>
                                </div>
                            </div>
                            <div class="col s6 m6 l6 center-align flight-state-two">
                                <div class="flight-info">
                                    <p class="small"><span class="grey-text text-lighten-4">Arrive:</span> 08.50</p>
                                    <p class="small"><span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                                    <p class="small"><span class="grey-text text-lighten-4">Terminal:</span> C</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col s12 m6 l4">
            <div id="profile-card" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?php echo img_url("user-bg.jpg"); ?>" alt="user background">
                </div>
                <div class="card-content">
                    <img src="<?php echo img_url("avatar.jpg"); ?>" alt="" class="circle responsive-img activator card-profile-image">
                    <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                        <i class="mdi-action-account-circle"></i>
                    </a>
<pre><?php //var_dump($this->session->userdata()); ?></pre>
                    <span class="card-title activator grey-text text-darken-4"><?php echo $utilisateurCourant->getPrenom()." ".$utilisateurCourant->getNom(); ?></span>
                    <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> <?php echo $utilisateurCourant->getRole(); ?></p>
                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> <?php echo $utilisateurCourant->getNumeroDeTelephone(); ?></p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> <?php echo $utilisateurCourant->getAdresseEmail(); ?></p>

                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Roger Waters <i class="mdi-navigation-close right"></i></span>
                    <p>Here is some more information about this card.</p>
                    <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</p>
                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
                    <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> BAR - AUS</p>
                </div>
            </div>
        </div>

    </div>
</div>