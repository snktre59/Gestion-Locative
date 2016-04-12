<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	/**
	 * Constructeur de la classe Admin
	 */
	public function __construct(){
		parent::__construct();
		
		// Si l'utilisateur est authentifier en tant qu'administrateur, il peut accéder au back-office sinon redirection
		if($this->layout->utilisateurCourant->getDroitsCompte() !== "ADMINISTRATEUR"){
			redirect("accueil", "index");
		}
	}
	
	public function form(){
		$this->layout->set_flashdata_message("success", "MESSAGE OK");
		
		redirect("admin", "index");
	}
	/**
	 * Action en charge de l'affichage de la page d'accueil du back-office
	 */
	public function index()
	{
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift | ADMINISTRATION - Accueil");
		
		$data["messages"] = $this->layout->get_flashdata_messages();
		
		// Chargement de la vue
		$this->layout->view('admin/accueil', $data);
	}
	
	/**
	 * Action en charge de l'affichage de la page d'accueil des évènements
	 */
	public function accueil_evenements()
	{
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift | ADMINISTRATION - Gestion des évènements");
		
		// Chargement des ressources JAVASCRIPT
		$this->layout->ajouter_js("lib/datatables/media/js/jquery.dataTables.min");
		$this->layout->ajouter_js("evenements/accueil_evenements");
		
		// Chargement des modèles
		$this->load->model("evenements_model");
		
		// Récupération des évènements
		$data["liste_evenements"] = $this->evenements_model->recuperer_evenements();
		
		// Chargement de la vue
		$this->layout->view('admin/evenements/accueil_evenements', $data);
	}
	
	/**
	 * Action en charge de l'ajout d'un évènement
	 */
	public function ajouter_evenement()
	{
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift | ADMINISTRATION - Ajouter un évènement");
		
		// Chargement ee ressources CSS
		$this->layout->ajouter_css("bootstrap-clockpicker.min");
		
		// Chargement de ressources JAVASCRIPT
		$this->layout->ajouter_js("lib/moment/moment");
		$this->layout->ajouter_js("lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min");
		$this->layout->ajouter_js("evenements/bootstrap-clockpicker.min");
		$this->layout->ajouter_js("evenements/ajouter_evenement");
		
		// Chargement des modèles
		$this->load->model("evenements_model");
		
		// Chargement des librairies
		$this->load->library('form_validation');
	 
	 	// Définition des règles de champs
		$this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
		$this->form_validation->set_rules('date', '"Date"', 'trim|required|min_length[10]|max_length[15]|encode_php_tags');
		$this->form_validation->set_rules('heure_debut', '"Heure de debut"', 'trim|required|min_length[4]|max_length[5]|encode_php_tags');
		$this->form_validation->set_rules('heure_fin', '"Heure de fin"', 'trim|required|min_length[4]|max_length[5]|encode_php_tags');
		$this->form_validation->set_rules('adresse_postale', '"Adresse postale"', 'trim|required|min_length[5]|max_length[100]|encode_php_tags');
		$this->form_validation->set_rules('code_postal', '"Code postal"', 'trim|required|min_length[5]|max_length[5]|encode_php_tags');
		$this->form_validation->set_rules('ville', '"Ville"', 'trim|required|min_length[2]|max_length[70]|encode_php_tags');
		$this->form_validation->set_rules('code_iframe', '"Code iFrame"', 'trim|encode_php_tags');
		$this->form_validation->set_rules('lien_evenement', '"Lien evenement"', 'trim|encode_php_tags');
	
		// Si le formulaire est correctement renseigné
		if($this->form_validation->run())
		{
			// Définition des variables postées
			$nom = $this->input->post('nom');
			$date = $this->input->post('date');
			$heure_debut = $this->input->post('heure_debut');
			$heure_fin = $this->input->post('heure_fin');
			$adresse_postale = $this->input->post('adresse_postale');
			$code_postal = $this->input->post('code_postal');
			$ville = $this->input->post('ville');
			$code_iframe = $this->input->post('code_iframe');
			$lien_evenement = $this->input->post('lien_evenement');
			
			// Ajout de l'évènement en base de données'
			$data["retour_insertion"] = $this->evenements_model->ajouter_evenement($nom, $date, $heure_debut, $heure_fin, $adresse_postale, $code_postal, $ville
			, $code_iframe, $lien_evenement);
			
			// Ajout d'un message de confirmation en SESSION
			$this->layout->set_flashdata_message('success', "L'évènement à correctement été ajouté.");
			
			// Redirection sur la page d'acceuil des évènements et affichage du message
			redirect("admin/accueil_evenements");
		}
		// Formulaire mal renseigné
		else
		{
			// Affichage de la vue du formulaire
			$this->layout->view('admin/evenements/ajouter_evenement');
		}
		
	}
	
	/**
	 * Action en charge de la suppression d'un évènement
	 */
	public function supprimer_evenement()
	{
		// Chargement des modèles
		$this->load->model("evenements_model");
		
		// Suppression de l'évènement
		$this->evenements_model->supprimer_evenement($this->input->get('id'));
	}
	
	/*
	 * Action en charge de la modification d'un évènement
	 * Paramètres : $id => ID de l'évènement à modifier
	 */
	public function modifier_evenement($id)
	{	
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift | ADMINISTRATION - Modifier un évènement");
		
		//Chargement des ressources CSS
		$this->layout->ajouter_css("bootstrap-clockpicker.min");
		
		// Chargement des ressources JAVASCRIPT
		$this->layout->ajouter_js("lib/moment/moment");
		$this->layout->ajouter_js("lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min");
		$this->layout->ajouter_js("evenements/bootstrap-clockpicker.min");
		$this->layout->ajouter_js("evenements/ajouter_evenement");
		
		//Chargement des modèles
		$this->load->model("evenements_model");
		
		// Chargement des librairies
		$this->load->library('form_validation');
		
		// Définition des règles de champs
		$this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
		$this->form_validation->set_rules('date', '"Date"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('heure_debut', '"Heure de debut"', 'trim|required|min_length[4]|max_length[5]|encode_php_tags');
		$this->form_validation->set_rules('heure_fin', '"Heure de fin"', 'trim|required|min_length[4]|max_length[5]|encode_php_tags');
		$this->form_validation->set_rules('adresse_postale', '"Adresse postale"', 'trim|required|min_length[5]|max_length[100]|encode_php_tags');
		$this->form_validation->set_rules('code_postal', '"Code postal"', 'trim|required|min_length[5]|max_length[5]|encode_php_tags');
		$this->form_validation->set_rules('ville', '"Ville"', 'trim|required|min_length[2]|max_length[70]|encode_php_tags');
		$this->form_validation->set_rules('code_iframe', '"Code iFrame"', 'trim|encode_php_tags');
		$this->form_validation->set_rules('lien_evenement', '"Lien evenement"', 'trim|encode_php_tags');
	
		// Si le formulaire est correctement renseigné
		if($this->form_validation->run())
		{
			$data["edition"] = 1;
			// Définition des variables postées
			$nom = $this->input->post('nom');
			$date = $this->input->post('date');
			$heure_debut = $this->input->post('heure_debut');
			$heure_fin = $this->input->post('heure_fin');
			$adresse_postale = $this->input->post('adresse_postale');
			$code_postal = $this->input->post('code_postal');
			$ville = $this->input->post('ville');
			$code_iframe = $this->input->post('code_iframe');
			$lien_evenement = $this->input->post('lien_evenement');
			
			// Modification de l'évènement dont l'ID à été passé en paramètre
			$data["retour_insertion"] = $this->evenements_model->modifier_evenement($id, $nom, $date, $heure_debut, $heure_fin, $adresse_postale, $code_postal, $ville
			, $code_iframe, $lien_evenement);
			
			// Ajout d'un message de confirmation en SESSION
			$this->layout->set_flashdata_message('success', "L'évènement à correctement été modifié.");
			
			// Redirection sur la page d'accueil des évènements et affichage du message de confirmation
			redirect("admin/accueil_evenements");
		}
		//Le formulaire est mal renseignée
		else
		{
			$data["edition"] = 0;
			
			// Récupération des informations sur l'évènement à modifier
			$data["evenement"] = $this->evenements_model->recuperer_evenement($id);
			
			// L'évènement passé en paramètre n'existe pas
			if($data["evenement"] == false){
				
				// Définition d'un message d'erreur en SESSION
				$this->layout->set_flashdata_message('danger', "Impossible de modifier un évènement car celui-ci n'existe pas.");
				
				// Redirection sur la page d'accueil des évènements et affichage du message d'erreur
				redirect("admin/accueil_evenements");
			// Le formulaire est mal renseigné
			} else {
				// Affichage de la vue de modification de l'évènement
				$this->layout->view('admin/evenements/modifier_evenement', $data);
			}
		}
	}
	
	/*
	 * Action en charge d'afficher la page d'accueil des actualités
	 */
	public function accueil_actualites()
	{
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift | ADMINISTRATION - Gestion des actualités");
		
		// Ajout des ressources JAVASCRIPT
		$this->layout->ajouter_js("lib/datatables/media/js/jquery.dataTables.min");
		$this->layout->ajouter_js("actualites/accueil_actualites");
		
		// Chargement des modèles
		$this->load->model("actualites_model");
		
		// Récupération des actualités
		$data["liste_actualites"] = $this->actualites_model->recuperer_actualites();
		
		// Affichage de la vue
		$this->layout->view('admin/actualites/accueil_actualites', $data);
	}
	
	/*
	 * Action en charge de supprimer une actualité
	 */
	public function supprimer_actualite()
	{
		// Chargement des modèles
		$this->load->model("actualites_model");
		
		// Suppression de l'actualité
		$this->actualites_model->supprimer_actualite($this->input->get('id'));
	}
	
	/*
	 * Action en charge d'ajouter une actualité
	 */
	public function ajouter_actualite()
	{
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift | ADMINISTRATION - Ajouter une actualité");
		
		// Chargement des ressources JAVASCRIPT
		$this->layout->ajouter_js("lib/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all");
		$this->layout->ajouter_js("ckeditor/ckeditor");
		$this->layout->ajouter_js("lib/select2/select2.min");
		$this->layout->ajouter_js("actualites/ajouter_actualite");
		
		// Chargement des modèles
		$this->load->model("actualites_model");
		
		// Chargement des librairies
		$this->load->library('form_validation');
	 
	 	// Définition des règles de champs
		$this->form_validation->set_rules('titre', '"Titre"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
		$this->form_validation->set_rules('contenu', '"Contenu"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('tags', '"Tags"', 'trim|encode_php_tags');
	
		// Si le formulaire est correctement renseignée
		if($this->form_validation->run())
		{
			// Définition des variables postées
			$titre = $this->input->post('titre');
			$contenu = $this->input->post('contenu');
			$tags = $this->input->post('tags');
			
			// Configuration des paramètres d'upload de l'image de l'actualité
			$config['upload_path'] = './assets/backend/images/actualites/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
		
			// Chargement de la librairie UPLOAD paramétrée 
			$this->load->library('upload', $config);
			
			// L'upload s'est mal déroulé
			if ( ! $this->upload->do_upload("image"))
			{
				// Ajout des messages d'erreur
				$error = array('error' => $this->upload->display_errors());
				
				// Affichage de la vue d'ajout d'actualités
				$this->layout->view('admin/actualites/ajouter_actualite');
			}
			// L'upload s'est correctement déroulé
			else
			{
				// Récupération des données sur l'upload
				$uploadData = array('upload_data' => $this->upload->data());
				
				// Définition des variables liées à l'upload
				$file = $uploadData['upload_data']['file_name'];
				$url_image = "actualites/".$file;
				
				// Ajout de l'actualité en base de données
				$data["retour_insertion"] = $this->actualites_model->ajouter_actualite($titre, $contenu, $url_image, $tags);
				
				// Définition d'un message de confirmation
				$this->layout->set_flashdata_message('success', "L'actualité à correctement été ajoutée.");
				
				// Redirection sur la page d'acceuil des actualité et affichage du message de confirmation
				redirect("admin/accueil_actualites");
			}
		}
		// Le formulaire est mal renseigné
		else
		{
			// Affichage de la vue d'ajout d'actualité
			$this->layout->view('admin/actualites/ajouter_actualite');
		}
		
	}
	
	/*
	 * Action en charge de la modification d'une actualité
	 * Paramètres : $id => ID de l'actualité à modifier
	 */
	public function modifier_actualite($id)
	{	
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift | ADMINISTRATION - Modifier une actualité");
		
		// Chargement des ressources JAVASCRIPT
		$this->layout->ajouter_js("lib/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all");
		$this->layout->ajouter_js("ckeditor/ckeditor");
		$this->layout->ajouter_js("lib/select2/select2.min");
		$this->layout->ajouter_js("actualites/ajouter_actualite");
		
		// Chargement des modèles
		$this->load->model("actualites_model");
		
		// Chargement des librairies
		$this->load->library('form_validation');
	 
	 	// Définition des règles de champs
		$this->form_validation->set_rules('titre', '"Titre"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
		$this->form_validation->set_rules('contenu', '"Contenu"', 'trim|required|encode_php_tags');
		$this->form_validation->set_rules('tags', '"Tags"', 'trim|encode_php_tags');
	
		// Si le formulaire est correctement renseigné
		if($this->form_validation->run())
		{
			// Définition des variables postées
			$titre = $this->input->post('titre');
			$contenu = $this->input->post('contenu');
			$tags = $this->input->post('tags');
			
			// Configuration des paramètres d'upload de l'image de l'actualité
			$config['upload_path'] = './assets/frontend/images/actualites/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
		
			// Chargement de la librairie UPLOAD paramétrée 
			$this->load->library('upload', $config);
	
			// L'upload s'est mal déroulé
			if ( ! $this->upload->do_upload("image"))
			{
				$data["edition"] = 1;
				
				// Définition des erreurs
				$error = array('error' => $this->upload->display_errors());
				
				// Affichage de la vue de modification d'actualité
				$this->layout->view('admin/actualites/modifier_actualite', $data);
			}
			// L'upload s'est correctement déroulé
			else
			{
				// Récupération des données sur l'upload
				$uploadData = array('upload_data' => $this->upload->data());
				
				// Définition des variables liées à l'upload
				$file = $uploadData['upload_data']['file_name'];
				$url_image = "actualites/".$file;
				
				// Modification de l'actualité en base de données
				$data["retour_insertion"] = $this->actualites_model->modifier_actualite($id, $titre, $contenu, $url_image, $tags);
				
				// Définition d'un message de confirmation
				$this->layout->set_flashdata_message('success', "L'actualité à correctement été modifiée.");
				
				// Redirection sur la page d'accueil des actualité et affichage du message de confirmation'
				redirect("admin/accueil_actualites");
			}
		}
		// Le formulaire est mal renseigné
		else
		{
			$data["edition"] = 0;
			
			// Récupération des information de l'actualité à modifier
			$data["actualite"] = $this->actualites_model->recuperer_actualite($id);
			
			// L'évènement passé en paramètre n'existe pas
			if($data["actualite"] == false){
				
				// Définition d'un message d'erreur
				$this->layout->set_flashdata_message('danger', "Impossible de modifier une actualité car l'actualité n'existe pas.");
				
				// Redirection sur la page d'accueil des actualités et affichage du message d'erreur
				redirect("admin/accueil_actualites");
				
			// Le formulaire est mal renseigné
			} else {
				// Affichage de la page de modification d'actualité'
				$this->layout->view('admin/actualites/modifier_actualite', $data);
			}
		}
	}
	
}