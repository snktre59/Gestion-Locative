<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Utilisateurs_model extends CI_Model{
		
		// Définition de la table utilisée
		protected $table = 'utilisateurs';
	
		/*
		 * Ajoute un utilisateur en base de données
		 * Retour : TRUE si une ligne à été affectée ou FALSE
		 */
		public function ajouter_utilisateur($nom, $prenom, $adresse_email, $mot_de_passe, $adresse_postale, $code_postal, $ville, $token_id)
		{
			$this->db->set("nom", $nom);
			$this->db->set("prenom", $prenom);
			$this->db->set("adresse_email", $adresse_email);
			$this->db->set("mot_de_passe", $mot_de_passe);
			$this->db->set("adresse_postale", $adresse_postale);
			$this->db->set("code_postal", $code_postal);
			$this->db->set("ville", $ville);
			$this->db->set("statut_compte", "INACTIF");
			$this->db->set("token_id", $token_id);
			
			$this->db->insert($this->table);
			
			return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
		}
		
		/*
		 * Active le compte d'un utilisateur en fonction de son adresse email et de son token ID
		 * Paramètres :
		 * $adresse_email => Adresse email du compte à activer
		 * $token_id => Token_id du compte (vérification)
		 *
		 * Retour : TRUE si une ligne à été affectée ou FALSE
		 */
		public function activer_compte($adresse_email, $token_id){
			$data = array(
				"statut_compte" => "ACTIF"
			);
			
			$this->db->where('adresse_email', $adresse_email);
			$this->db->where('token_id', $token_id);
			$this->db->update($this->table, $data);
			$rows = $this->db->affected_rows();
			
			return ($rows == 1) ? TRUE : FALSE;
		}
		
		/*
		 * Instancie un utilisateur en fonction de son adresse email
		 * Paramètres :
		 * $adresse_email => Adresse email du compte utilisateur à instancier
		 *
		 * Retour : Un objet utilisateur
		 */
		public function instancier_utilisateur($adresse_email = ""){
			
			// Récupération des données du compte
			$dataUser = $this->getDataUtilisateurByEmail($adresse_email);
			
			// Si aucune données récupérée
			if ($dataUser === FALSE) {
				
				// L'ID devient celui du visiteur
				$dataUser["id"] = 1;
			}
			
			// Chargement des librairies
			$this->load->library("utilisateur", $dataUser["id"]);
			
			// Création d'un nouvel utilisateur
			$utilisateur = new Utilisateur($dataUser["id"]);
			
			return $utilisateur;
		}
		
		/*
		 * Récupération des données du compte utilisateur par son adresse email
		 * Paramètres :
		 * $adresse_email => Adresse email du compte
		 *
		 * Retour : $donnees du compte ou FALSE
		 */
		public function getDataUtilisateurByEmail($adresse_email){
	 		 $this->db->select("*")
			 		  ->where('adresse_email', $adresse_email);
			 
			 $resultat = $this->db->get($this->table);
			 
			 $donnees = $resultat->result_array();
			 
			 return ($donnees == NULL) ? FALSE : $donnees[0];
		}
		
		/*
		 * Récupération des données du compte utilisateur par son ID
		 * Paramètres :
		 * $id => ID du compte 
		 *
		 * Retour : $donnees du compte ou FALSE
		 */
		public function getDataUtilisateurById($id){
	 		 $this->db->select("*")
			 		  ->where('id', $id);
			 
			 $resultat = $this->db->get($this->table);
			 
			 $donnees = $resultat->result_array();
			 
			 return ($donnees == NULL) ? FALSE : $donnees[0];
		}
	}
?>