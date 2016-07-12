<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Locataires extends CI_Controller
{

	public function index()
	{
        if($this->session->userdata("utilisateurCourant")->estAuthentifie() === TRUE){
            
        $this->layout->ajouter_css('locataires/locataires');
        
        $this->layout->ajouter_js('locataires/accueil');
            
        $this->load->model('locataires_model');
        
        $idProprietaire = $this->session->userdata("utilisateurCourant")->getId();
        
        $listeLocataires = $this->locataires_model->getLocatairesByIdProprietaire($idProprietaire);
            
        // Définition du titre de la page
		$this->layout->set_titre("Loca'Gestion - Mes locataires");
		
		//Définition de la meta-description
		$this->layout->set_meta_description("Obtenez toutes les informations à propos de vos locataires. Vous pouvez en ajouter ou en supprimer.");
		
        // Assignation des variables
        $data['listeLocataires'] = $listeLocataires;
        
		// Affichage du template
		$this->layout->view('locataires/accueil', $data);
        
        } else redirect();
    }
    
    public function ajouter(){
        $nom = $this->input->post('NOM');
        $prenom = $this->input->post('PRENOM');
        
    }
}