<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateur extends CI_Controller
{
	// Déclaration des variables
    private $CI;
	private $id;
	private $nom;
	private $prenom;
	private $mot_de_passe;
	private $date_de_naissance;
	private $adresse_postale;
	private $code_postal;
    private $ville;
	private $pays;
    private $adresse_email;
    private $numero_de_telephone;
    private $adresse_ip_derniere_connexion;
    private $date_inscription;
    private $newsletter;
    private $type_abonnement;
    private $date_souscription;
    private $droits_compte;
    private $statut_compte;
    private $token_id;

    /*
    |===============================================================================
    | Constructeur
    |===============================================================================
    */

    public function __construct($id = "1")
    {
        $CI =& get_instance();
        
        // Chargement du modèle utilisateur
        $CI->load->model("utilisateurs_model");
        
        $dataUser = $CI->utilisateurs_model->getDataUtilisateurById($id);
        
        $this->id = (int)$dataUser["id"];
        $this->nom = $dataUser["nom"];
        $this->prenom = $dataUser["prenom"];
        $this->adresse_postale = $dataUser["adresse_postale"];
        $this->code_postal = $dataUser["code_postal"];
        $this->ville = $dataUser["ville"];
        $this->adresse_email = $dataUser["adresse_email"];
        $this->adresse_ip_derniere_connexion = $dataUser["adresse_ip_derniere_connexion"];
        $this->date_inscription = $dataUser["date_inscription"];
        $this->newsletter = $dataUser["newsletter"];
        $this->type_abonnement = $dataUser["type_abonnement"];
        $this->date_souscription = $dataUser["date_souscription"];
        $this->droits_compte = $dataUser["droits_compte"];
        $this->statut_compte = $dataUser["statut_compte"];
        $this->token_id = $dataUser["token_id"];
        $this->statut_compte = $dataUser["statut_compte"];
        if($dataUser["adresse_email"] == "visiteur"){
            $this->registered = FALSE;
        } else $this->registered = TRUE;
    }
    
    /*
     * Fonction d'inscription d'un utilisateur
     */
    public function inscrire($nom, $prenom, $date_de_naissance, $adresse_postale, $code_postal, $ville, $pays, $adresse_email,
	$numero_de_telephone, $adresse_ip_derniere_connexion, $date_inscription, $newsletter, $type_abonnement, $date_souscription,
	$droits_compte, $statut_compte, $token_id)
	{
        // Création du tableau contenant les informations à propos de l'utilisateur
		$tableau_utilisateur = array(
			"id"		=>		"",
			"nom"		=>		$nom,
			"prenom"	=>		$prenom,
			"date_de_naissance"		=>		$date_de_naissance,
			"adresse_postale"		=>		$adresse_postale,
			"code_postal"			=>		$code_postal,
			"ville"		=>		$ville,
			"pays"		=>		$pays,
			"adresse_email"		=>		$adresse_email,
			"numero_de_telephone"	=>		$numero_de_telephone,
			"adresse_ip_derniere_connexion"		=>		$adresse_ip_derniere_connexion,
			"date_inscription"		=>		$date_inscription,
			"newsletter"	=>		"1",
			"type_abonnement"		=>		"STANDARD",
			"date_souscription"		=>		$date_souscription,
			"droits_compte"		=>		"UTILISATEUR",
			"statut_compte"		=>		"INACTIF",
			"token_id"			=>		$token_id
		);
        
        // Insertion des données dans la table "utilisateurs"
		$inscrire_utilisateur = $this->db->insert("utilisateurs", $tableau_utilisateur);
	}
    
    public function activer_compte($adresse_email, $token_id){
        $this->CI =& get_instance();
        
        return $this->CI->utilisateurs_model->activer_compte($adresse_email, $token_id);
    }
    
    public function connexion_utilisateur($adresse_email, $mot_de_passe){
        $dataUser = $this->CI->utilisateurs_model->getDataUtilisateurByEmail($adresse_email);
    }
    
    public function estAuthentifie(){
        return ($this->registered === TRUE) ? TRUE : FALSE;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }

    /**
     * @return mixed
     */
    public function getDateDeNaissance()
    {
        return $this->date_de_naissance;
    }

    /**
     * @param mixed $date_de_naissance
     */
    public function setDateDeNaissance($date_de_naissance)
    {
        $this->date_de_naissance = $date_de_naissance;
    }

    /**
     * @return mixed
     */
    public function getAdressePostale()
    {
        return $this->adresse_postale;
    }

    /**
     * @param mixed $adresse_postale
     */
    public function setAdressePostale($adresse_postale)
    {
        $this->adresse_postale = $adresse_postale;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getAdresseEmail()
    {
        return $this->adresse_email;
    }

    /**
     * @param mixed $adresse_email
     */
    public function setAdresseEmail($adresse_email)
    {
        $this->adresse_email = $adresse_email;
    }

    /**
     * @return mixed
     */
    public function getNumeroDeTelephone()
    {
        return $this->numero_de_telephone;
    }

    /**
     * @param mixed $numero_de_telephone
     */
    public function setNumeroDeTelephone($numero_de_telephone)
    {
        $this->numero_de_telephone = $numero_de_telephone;
    }

    /**
     * @return mixed
     */
    public function getAdresseIpDerniereConnexion()
    {
        return $this->adresse_ip_derniere_connexion;
    }

    /**
     * @param mixed $adresse_ip_derniere_connexion
     */
    public function setAdresseIpDerniereConnexion($adresse_ip_derniere_connexion)
    {
        $this->adresse_ip_derniere_connexion = $adresse_ip_derniere_connexion;
    }

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->date_inscription;
    }

    /**
     * @param mixed $date_inscription
     */
    public function setDateInscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }

    /**
     * @return mixed
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param mixed $newsletter
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return mixed
     */
    public function getTypeAbonnement()
    {
        return $this->type_abonnement;
    }

    /**
     * @param mixed $type_abonnement
     */
    public function setTypeAbonnement($type_abonnement)
    {
        $this->type_abonnement = $type_abonnement;
    }

    /**
     * @return mixed
     */
    public function getDateSouscription()
    {
        return $this->date_souscription;
    }

    /**
     * @param mixed $date_souscription
     */
    public function setDateSouscription($date_souscription)
    {
        $this->date_souscription = $date_souscription;
    }

    /**
     * @return string
     */
    public function getDroitsCompte()
    {
        return $this->droits_compte;
    }

    /**
     * @param string $droits_compte
     */
    public function setDroitsCompte($droits_compte)
    {
        $this->droits_compte = $droits_compte;
    }

    /**
     * @return mixed
     */
    public function getStatutCompte()
    {
        return $this->statut_compte;
    }

    /**
     * @param mixed $statut_compte
     */
    public function setStatutCompte($statut_compte)
    {
        $this->statut_compte = $statut_compte;
    }

    /**
     * @return mixed
     */
    public function getTokenId()
    {
        return $this->token_id;
    }

    /**
     * @param mixed $token_id
     */
    public function setTokenId($token_id)
    {
        $this->token_id = $token_id;
    }
}