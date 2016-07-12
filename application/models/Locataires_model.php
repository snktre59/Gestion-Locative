<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Locataires_model extends CI_Model{
		
		// Définition de la table utilisée
		protected $table_utilisateurs = 'utilisateurs';
        protected $table_locataires = 'locataires';
	
		public function getLocatairesByIdProprietaire($idProprietaire){
            return $this->db->select("*")
                            ->from($this->table_locataires)
                            ->join($this->table_utilisateurs.' U1', $this->table_locataires.'.FK_ID_LOCATAIRE = U1.ID_UTILISATEUR')
                            ->where('FK_ID_PROPRIETAIRE', $idProprietaire)
                            ->get()
                            ->result();
        }
	}
?>