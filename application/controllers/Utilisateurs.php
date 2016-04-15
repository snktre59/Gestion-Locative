<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateurs extends CI_Controller {
	
	public function connexion()
	{	
		// Chargement des bibliothèques
		$this->load->library('form_validation');
		
		// Chargement des modèles
		$this->load->model("utilisateurs_model");
		
		$this->layout->ajouter_js('utilisateurs/connexion');
	 
	 	// Définition des règles de champs
		$this->form_validation->set_rules('adresse_email', '"Adresse Email"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('mot_de_passe', '"Mot de passe"', 'trim|required|encode_php_tags');
	
		if ($this->form_validation->run())
		{
			// Récupération des variables postées
			$adresse_email = $this->input->post('adresse_email');
			$mot_de_passe = $this->input->post('mot_de_passe');
			$remember = $this->input->post('remember');
			
			// Récupération des informations du compte utilisateur
			$userData = $this->utilisateurs_model->getDataUtilisateurByEmail($adresse_email);
			
			// Le compte n'existe pas
			if ($userData == FALSE) {
				
				// Ajout d'un message d'erreur
				$this->layout->set_flashdata_message("red", "Le compte avec lequel vous souhaitez vous connecter n'existe pas, merci d'en créer un.");
				
				// Redirection et affichage du message d'erreur
				redirect("utilisateurs/connexion");
				
			// Le compte existe	
			} else {
				
				// Le compte existe mais n'est pas activé
				if ($userData["statut_compte"] != "ACTIF") {
					
					// Ajout d'un message d'erreur
					$this->layout->set_flashdata_message("red", "Le compte auquel vous souhaitez vous connecter n'est pas activé. Pour l'activer, cliquez sur le mail que vous avez reçu lors de votre inscription puis reconnectez vous.");
					
					// Redirection et affichage du message d'erreur
					redirect("utilisateurs/connexion");
				}
				
				// Le compte existe et les mots de passe correspondent
				else if (password_verify($mot_de_passe, $userData["mot_de_passe"])) {
					
					// Instanciation d'un nouvel utilisateur avec ses informations
					$utilisateur = $this->utilisateurs_model->instancier_utilisateur($adresse_email);
					
					// Destruction de la session précédente (visiteur)
					$this->session->unset_userdata("utilisateurCourant");
					
					// Création d'une nouvelle session utilisateur
					$this->session->set_userdata("utilisateurCourant", $utilisateur);
					
					// Mémorisation de la session
					if($remember == "on"){
						$this->session->mark_as_temp('utilisateurCourant', 604800);
					}
					
					// Ajout d'un message de confirmation
					$this->layout->set_flashdata_message("green", "Vous êtes dès à présent connecté !");
					
					// Redirection et affichage du message de confirmation
					redirect("accueil/index");
				
				// Les identifiants du compte sont incorrects	
				} else {
					
					// Ajout d'un message d'erreur
					$this->layout->set_flashdata_message("red", "Les informations d'identification sont incorrectes, veuillez réessayer.");
					
					// Redirection et affichage du message d'erreur
					redirect("utilisateurs/connexion");
				}
			}
		}
		else
		{
			$this->layout->view('utilisateurs/connexion');
		}
	}

	public function inscription(){
		
		// Chargement des bibliothèques
		$this->load->library('form_validation');
		
		//Chargement des modèles
		$this->load->model("utilisateurs_model");
		
		//Chargement des ressources JAVASCRIPT
		$this->layout->ajouter_js("utilisateurs/inscription");
		
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift - Inscription");
		
		// Définition des règles de champs
		$this->form_validation->set_rules('nom', '"Nom"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('prenom', '"Prénom"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('adresse_email', '"Adresse email"', 'trim|required|matches[adresse_email_confirm]|encode_php_tags|is_unique[utilisateurs.adresse_email]');
		$this->form_validation->set_rules('adresse_email_confirm', '"Adresse email confirmation"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('mot_de_passe', '"Mot de passe"', 'trim|required|matches[mot_de_passe_confirm]|encode_php_tags');
		$this->form_validation->set_rules('mot_de_passe_confirm', '"Mot de passe confirmation"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('adresse_postale', '"Adresse postale"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('code_postal', '"Code postal"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('ville', '"Ville"', 'trim|required|encode_php_tags');
		
		// Si le formulaire est correctement renseigné
		if($this->form_validation->run())
		{
			// Récupération des variables postées
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$adresse_email = $this->input->post('adresse_email');
			//$adresse_email_confirm = $this->input->post('adresse_email_confirm');
			$mot_de_passe = password_hash($this->input->post('mot_de_passe'), PASSWORD_BCRYPT);
			//$mot_de_passe_confirm = password_hash($this->input->post('mot_de_passe_confirm'), PASSWORD_BCRYPT);
			$adresse_postale = $this->input->post('adresse_postale');
			$code_postal = $this->input->post('code_postal');
			$ville = $this->input->post('ville');
			$adresse_ip = $this->input->ip_address();
			$token_id = md5(microtime(TRUE)*100000);
			
			$this->load->library("email_templates");
			
			// L'utilisateur à été ajouté en BDD
			if($this->utilisateurs_model->ajouter_utilisateur($nom, $prenom, $adresse_email, $mot_de_passe, $adresse_postale, $code_postal, $ville, $token_id) == TRUE){
				$message = '
					Vous vous êtes inscrit sur notre site internet et nous vous en remercions. Pour valider votre inscription, merci de cliquer sur <a href="'.base_url().'/utilisateurs/confirmation/adresse_email='.$adresse_email.'&token_id='.$token_id.'">ce lien</a>.<br />
					A bientôt sur undershift.fr !<br/>
					Under Shift.
				';
				// Envoi d'un mail de confirmation
				if($this->email_templates->inscription_validation("noreply@undershift.fr", "UNDER SHIFT", $adresse_email, $token_id, "Confirmez votre inscription", $message)){
					// Ajout d'un message de confirmation
					$this->layout->set_flashdata_message('green', "Votre inscription s'est déroulée correctement. Vous allez recevoir un email avec les détails pour l'activation de votre compte.");
					
					// Redirection et affichage du message
					redirect("accueil/index");
					
				// L'email de confirmation n'a pas été envoyé
				} else {
					// Ajout d'un message de confirmation
					$this->layout->set_flashdata_message('red', "Vous avez été inscrit cependant il y a eu un problème lors de l'envoi du mail de confirmation. Veuillez contacter un administrateur.");
					
					// Redirection et affichage du message
					redirect("accueil/index");
				}
				
			
			// Il y a eu un problème lors de l'ajout de l'utilisateur en BDD
			} else {
				
				// Ajout d'un message de confirmation
				$this->layout->set_flashdata_message('red', "Suite à un problème technique votre inscription ne peut aboutir. Veuillez contacter l'administrateur du site via le formulaire de contact.
					Veuillez nous excuser pour la gêne occasionnée.");
				
				// Redirection et affichage du message
				redirect("utilisateurs/inscription");
			}
			
		}
		else
		{
			// Affichage
			$this->layout->view('utilisateurs/inscription');
		}
	}
	
	function confirmation($adresse_email, $token_id){
		
		// Décodage de l'adresse email codée pour les caractères spéciaux
		$adresse_email = urldecode($adresse_email);
		
		// Chargement des modèles
		$this->load->model("utilisateurs_model");
		
		// Si le compte est activé
		if($this->utilisateur->activer_compte($adresse_email, $token_id) === TRUE){
			
			// Définition du message de confirmation et du statut
			$data["message"] = "Votre compte ".$adresse_email." à été activé ! Vous pouvez dès à présent vous connecter au site sur <a href='".base_url()."utilisateurs/connexion'>cette page</a>";
			$data["statut"] = "green";
			
			// Affichage de la vue
			$this->layout->view("utilisateurs/confirmation", $data);
			
		// Le compte à déjà été activé ou n'existe pas
		} else {
			
			// Définition du message d'erreur et du statut
			$data["message"] = "Votre compte n'a pas été activé. Cela peut-être dû au fait que le compte n'existe pas ou à déjà été validé.";
			$data["statut"] = "red";
			
			// Affichage de la vue
			$this->layout->view("utilisateurs/confirmation", $data);
		}
	}
	
	function deconnexion(){
		// Destruction de la session précédente (visiteur)
		$this->session->unset_userdata("utilisateurCourant");
		
		// Ajout d'un message de confirmation
		$this->layout->set_flashdata_message("orange", "Vous êtes à présent déconnecté !");
		
		// Redirection et affichage du message de confirmation
		redirect("accueil/index");
	}
	
	function csrf_redirect()
	{
	    
	    $this->layout->set_flashdata_message('red', "CSRF");
	    redirect('accueil', 'index');
	}
}
