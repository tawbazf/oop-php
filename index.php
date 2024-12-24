<?php
// Classe Utilisateur
class Utilisateur {
    protected $nom;
    protected $prenom;
    protected $type_utilisateur;

    // Constructeur pour initialiser les propriétés
    public function __construct($nom, $prenom, $type_utilisateur) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->type_utilisateur = $type_utilisateur;
    }

    // Méthode pour afficher le nom complet
    public function afficherNomComplet() {
        return $this->prenom . ' ' . $this->nom;
    }

    // Méthode pour changer le nom
    public function changerNom($nom) {
        $this->nom = $nom;
    }

    // Méthode pour changer le prénom
    public function changerPrenom($prenom) {
        $this->prenom = $prenom;
    }

    // Getter pour le type d'utilisateur
    public function getTypeUtilisateur() {
        return $this->type_utilisateur;
    }
}

// Classe Patient qui hérite de Utilisateur
class Patient extends Utilisateur {
    private $rendez_vous;

    // Méthode pour prendre un rendez-vous
    public function prendreRendezVous($date) {
        $this->rendez_vous = $date;
    }

    // Méthode pour afficher le rendez-vous
    public function afficherRendezVous() {
        return $this->rendez_vous ? $this->rendez_vous : "Pas de rendez-vous prévu.";
    }
}

// Classe Medecin qui hérite de Utilisateur
class Medecin extends Utilisateur {
    private $specialite;

    // Constructeur pour initialiser la spécialité et les autres propriétés héritées
    public function __construct($nom, $prenom, $type_utilisateur, $specialite) {
        parent::__construct($nom, $prenom, $type_utilisateur);
        $this->specialite = $specialite;
    }

    // Méthode pour consulter un patient
    public function consulterPatient(Patient $patient) {
        echo "Le médecin " . $this->afficherNomComplet() . " consulte le patient " . $patient->afficherNomComplet() . ".\n";
        echo "Rendez-vous prévu le : " . $patient->afficherRendezVous() . "\n";
    }

    // Getter pour la spécialité
    public function getSpecialite() {
        return $this->specialite;
    }
}

// Création d'un objet Medecin
$medecin = new Medecin('alaoui', 'ahmed', 'Medecin', 'Cardiologue');

// Création d'un objet Patient
$patient = new Patient('zehaf', 'tawba', 'Patient');

// Le patient prend un rendez-vous
$patient->prendreRendezVous('2024-12-25');

// Affichage du nom complet du médecin
echo "Médecin : " . $medecin->afficherNomComplet() . "\n";  

// Le médecin consulte le patient
$medecin->consulterPatient($patient);  
?>
