<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evenements_model extends CI_Model
{
	protected $table = 'evenements';
	
	public function ajouter_evenement($nom, $date, $heure_debut, $heure_fin, $adresse_postale, $code_postal, $ville, $code_iframe, $lien_evenement)
	{
		$this->db->set("nom", $nom);
		$this->db->set("date", $date);
		$this->db->set("heure_debut", $heure_debut);
		$this->db->set("heure_fin", $heure_fin);
		$this->db->set("adresse_postale", $adresse_postale);
		$this->db->set("code_postal", $code_postal);
		$this->db->set("ville", $ville);
		$this->db->set("code_iframe", $code_iframe);
		$this->db->set("lien_evenement", $lien_evenement);
		
		$this->db->insert($this->table);
	}
	
	public function modifier_evenement($id, $nom, $date, $heure_debut, $heure_fin, $adresse_postale, $code_postal, $ville, $code_iframe, $lien_evenement)
	{
		$this->db->set("nom", $nom);
		$this->db->set("date", $date);
		$this->db->set("heure_debut", $heure_debut);
		$this->db->set("heure_fin", $heure_fin);
		$this->db->set("adresse_postale", $adresse_postale);
		$this->db->set("code_postal", $code_postal);
		$this->db->set("ville", $ville);
		$this->db->set("code_iframe", $code_iframe);
		$this->db->set("lien_evenement", $lien_evenement);
		$this->db->where('id', $id);
		$this->db->update($this->table);
	}
	
	public function recuperer_evenements(){
		return $this->db->select('*')
						->from($this->table)
						->order_by('id', 'desc')
						->get()
						->result();
	}
	
	public function recuperer_evenement($id){
		
		// Il n'y a rien à éditer
		if($id == null)
		{
			return false;
		}
		
		$this->db->select('*')
					->where('id', (int) $id);
		$resultat = $this->db->get($this->table);
		
		$donnees = $resultat->result_array();
		
		if ($donnees == null){
			return false;
		} else return $donnees[0];
	}
	
	public function recuperer_evenement_limit($deb = 0, $fin = 5){
		
		return $this->db->select(' * FROM `evenements` WHERE DATEDIFF(date, NOW()) >=0 ORDER BY id LIMIT 5')
						->get()
						->result();
	}
	
	public function supprimer_evenement($id){
		return $this->db->where('id', (int) $id)
						->delete($this->table);
	}
}