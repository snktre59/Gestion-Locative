<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Locations_model extends CI_Model{
		
		// Définition de la table utilisée
		protected $table_locations = 'locations';
        protected $table_appartements = 'appartements';
	
		public function getLocationsByIdProprietaire($idProprietaire){
            return $this->db->select("*")
                            ->from($this->table_locations)
                            ->where('FK_ID_PROPRIETAIRE', $idProprietaire)
                            ->get()
                            ->result();
        }
        
        public function getAppartementsByIdLocation($idLocation){
        
            return $this->db->select("*")
                            ->from($this->table_appartements)
                            ->where('FK_ID_LOCATION', (int)$idLocation)
                            ->get()
                            ->result();
        }
        
        public function ajouterMaison($data){
	        $this->db->insert($this->table_locations, $data);
	        
	        return $this->db->affected_rows();
        }

        public function ajouterAppartement($data){
	        $this->db->insert($this->table_appartements, $data);
	        
	        return $this->db->affected_rows();
        }
	}
?>