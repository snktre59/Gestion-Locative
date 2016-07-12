<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tableau_de_bord extends CI_Controller
{

	public function index()
	{
        if($this->session->userdata("utilisateurCourant")->estAuthentifie() === TRUE){
            
        // Définition du titre de la page
		$this->layout->set_titre("Loca'Gestion - Mon tableau de bord");
		
		//Définition de la meta-description
		$this->layout->set_meta_description("Utilisez le tableau de bord pour garder un visuel sur vos locations.");
		
		// Affichage du template
		$this->layout->view('tableau_de_bord/tableau_de_bord');
        
        } else redirect();
    }
}