<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends CI_Controller
{

	public function index()
	{
        if($this->session->userdata("utilisateurCourant")->estAuthentifie() === TRUE){
            
        $this->layout->ajouter_css('locations/locations');
        
        $this->layout->ajouter_css('datatables-1.10.12/dataTables.material.min');
        
        $this->layout->ajouter_css('datatables-1.10.12/material.min');
        
        $this->layout->ajouter_js('global');
        
        $this->layout->ajouter_js('datatable-1.10.12/datatables-1.10.12.min');
        
        $this->layout->ajouter_js('datatable-1.10.12/dataTables.material.min');
        
        $this->layout->ajouter_js('locations/accueil');
            
        $this->load->model('locations_model');
        
        $idProprietaire = $this->session->userdata("utilisateurCourant")->getId();
        
        $listeLocations = $this->locations_model->getLocationsByIdProprietaire($idProprietaire);

        $listeAppartements = array();

        foreach($listeLocations as $location){
        	
            //array_merge($listeAppartements, $this->locations_model->getAppartementsByIdLocation($location->ID_LOCATION));
            array_push($listeAppartements, $this->locations_model->getAppartementsByIdLocation($location->ID_LOCATION));
        }
        //$listeAppartements = $this->locations_model->getAppartementsByIdLocation(1);
            
        // Définition du titre de la page
		$this->layout->set_titre("Loca'Gestion - Mes locations");
		
		//Définition de la meta-description
		$this->layout->set_meta_description("Obtenez toutes les informations à propos de vos locations. Vous pouvez en ajouter ou en supprimer.");
		
        // Assignation des variables
        $data['listeLocations'] = $listeLocations;
        
        $data['listeAppartements'] = $listeAppartements[0];
        
		// Affichage du template
		$this->layout->view('locations/accueil', $data);
        
        } else redirect();
    }
    
    public function ajouterMaison(){
        $idProprietaire = $this->input->post('idProprietaire');
        $libelle = $this->input->post('libelle');
        $adresse = $this->input->post('adresse');
        $codePostal = $this->input->post('codePostal');
        $ville = $this->input->post('ville');
        
        $this->load->model('locations_model');
        
        $data = array("ID_LOCATION" => '',
               		 "FK_ID_PROPRIETAIRE" => $idProprietaire,
	        		 "NOM_COURT" => $this->clean($libelle),
	        		 "LIBELLE" => $libelle,
	        		 "ADRESSE" => $adresse,
	        		 "CODE_POSTAL" => $codePostal,
	        		 "VILLE" => $ville);
        
        $retour = $this->locations_model->ajouterMaison($data);
        
    }

    public function ajouterAppartement(){
        $idLocation = $this->input->post('idLocation');
        $numero = $this->input->post('numero');
        
        $this->load->model('locations_model');
        
        $data = array("ID_APPARTEMENT" => '',
               		 "FK_ID_LOCATION" => $idLocation,
	        		 "NUMERO" => $numero);
        
        $retour = $this->locations_model->ajouterAppartement($data);
    }
    
    public function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	
	   return strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); // Removes special chars.
	}
}