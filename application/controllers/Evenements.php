<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Classe Evenements
 */
class Evenements extends CI_Controller {

	/*
	 * Action en charge de lister les évènements du groupe
	 */
	public function liste()
	{
		// Définition du titre de la page
		$this->layout->set_titre("Under Shift | Evenements - Dates de concert");
		
		// Chargement des modèles
		$this->load->model("evenements_model");
		
		// Chargement des helpers
		$this->load->helper('date');
		
		// Récupération de la liste des évènements avec une limite
		$data["tableau_evenements"] = $this->evenements_model->recuperer_evenement_limit();
		
		// Affichage de la page
		$this->layout->view('frontend/evenements/liste', $data);
	}
}
