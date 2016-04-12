<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actualites_model extends CI_Model
{
	protected $table = 'actualites';
	
	public function ajouter_actualite($titre, $contenu, $url_image, $tags)
	{
		$this->db->set("titre", $titre);
		$this->db->set("contenu", $contenu);
		$this->db->set("url_image", $url_image);
		$this->db->set("date_creation", "NOW()", FALSE);
		$this->db->set("tags", $tags);
		
		$this->db->insert($this->table);
	}
	
	public function modifier_actualite($id, $titre, $contenu, $url_image, $tags)
	{
		$this->db->set("titre", $titre);
		$this->db->set("contenu", $contenu);
		$this->db->set("url_image", $url_image);
		$this->db->set("date_creation", "NOW()", FALSE);
		$this->db->set("tags", $tags);
		$this->db->where('id', $id);
		
		$this->db->update($this->table);
	}
	
	public function recuperer_actualites(){
		return $this->db->select('*')
						->from($this->table)
						->order_by('id', 'desc')
						->get()
						->result();
	}
	
	public function recuperer_actualite($id){
		
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
	
	public function recuperer_actualite_limit($deb = 0, $fin = 5){
		
		return $this->db->select('*')
						->from($this->table)
						->limit($deb, $fin)
						->order_by('id', 'desc')
						->get()
						->result();
	}
	
	public function supprimer_actualite($id){
		return $this->db->where('id', (int) $id)
						->delete($this->table);
	}
}