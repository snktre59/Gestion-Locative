<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe Page_404
 */
class Contact extends CI_Controller {

	/*
	 * Définition du constructeur de la classe
	 */ 
	public function __construct(){  
           parent::__construct();         
  	}    
  
  	/*
	 * Action en charge d'afficher la page d'erreur 404
	 */
	public function index()
	{ 
		// Chargement des modèles
		$this->load->model("evenements_model");
		
		// Chargement des helpers
		$this->load->helper('date');
		
		// Chargement des librairies
		$this->load->library("form_validation");
		
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift - Site Officiel | Formuaire de contact");
		
		//Définition de la meta-description
		$this->layout->set_meta_description("Utilisez le formulaire de contact afin de partager vos impressions, proposer un évènement..");
		
		// Récupération des derniers évènements
		$data["tableau_evenements"] = $this->evenements_model->recuperer_evenement_limit();
		
		// Définition des règles de champs
		$this->form_validation->set_rules('adresse_email', '"Adresse Email"', 'trim|valid_email|required|encode_php_tags');
		$this->form_validation->set_rules('nom', '"Nom"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('telephone', '"Téléphone"', 'trim|encode_php_tags');
		$this->form_validation->set_rules('sujet', '"Sujet"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('message', '"Message"', 'trim|required|encode_php_tags');
		
		// Le formulaire à été correctement renseigné
		if ($this->form_validation->run())
		{
			// Récupération des variables postées
			$nom = $this->input->post('nom');
			$telephone = $this->input->post('telephone');
			$adresse_email = $this->input->post('adresse_email');
			$sujet = $this->input->post('sujet');
			$message = $this->input->post('message');
			
			// Chargement des librairies
			$this->load->library("email_templates");
			
			// Envoi d'un email à un administrateur
			$this->email_templates->contact_envoi_administrateur("no-reply@undershift.fr", "UNDER SHIFT", "pamart.nicolas@free.fr", $sujet, $message);
			
			// Envoi d'une copie à l'expéditeur
			$this->email_templates->contact_copie_client("no-reply@undershift.fr", "UNDER SHIFT", $adresse_email);

			// Ajout d'un message d'erreur
			$this->layout->set_flashdata_message("green", "Votre demande à bien été prise en compte, elle sera traitée dans les meilleurs délais.");
			
			// Redirection et affichage du message d'erreur
			redirect("accueil/index");
		}
		else
		{
			// Affichage de la vue 
			$this->layout->view('frontend/contact/index', $data);
		}
	}
}
