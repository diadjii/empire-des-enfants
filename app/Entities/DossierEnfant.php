<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dossier_enfant")
 */
class DossierEnfant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     */
    private $idDossierEnfant;

    /**
     * @ORM\Column(type="string")
     */
    private $nomEnfant;

    /**
     *  @ORM\Column(type="string",nullable = true)
     */
    private $identifiantEnfant;

    /**
     * @ORM\Column(type="string")
     */
    private $prenomEnfant;

    /**
     * @ORM\Column(type="string")
     */
    private $ageEnfant;

    /**
     * @ORM\Column(type="string")
     */
    private $origineEnfant;

    /**
     * @ORM\Column(type="string")
     */
    private $dateAjoutDossierEnfant;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string")
     */
    private $profil;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string")
     */
    private $statutEnfant = "Enfant Présent";

    /**
     * @ORM\Column(type="string")
     */
    private $dateEntree;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $dateSortie;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $motifSortie;
    
    public function getIdDossierEnfant()
    {
        return $this->idDossierEnfant;
    }

    public function setIdDossierEnfant($idDossierEnfant)
    {
        $this->idDossierEnfant = $idDossierEnfant;
        return $this;
    }

    public function getNomEnfant()
    {
        return $this->nomEnfant;
    }

    public function setNomEnfant($nomEnfant)
    {
        $this->nomEnfant = $nomEnfant;
        return $this;
    }

    public function getPrenomEnfant()
    {
        return $this->prenomEnfant;
    }

    public function setPrenomEnfant($prenomEnfant)
    {
        $this->prenomEnfant = $prenomEnfant;
        return $this;
    }

    public function getAgeEnfant()
    {
        return $this->ageEnfant;
    }

    public function setAgeEnfant($ageEnfant)
    {
        $this->ageEnfant = $ageEnfant;
        return $this;
    }

    public function getDateNaissanceEnfant()
    {
        return $this->dateNaissanceEnfant;
    }

    public function setDateNaissanceEnfant($dateNaissanceEnfant)
    {
        $this->dateNaissanceEnfant = $dateNaissanceEnfant;
        return $this;
    }

    public function getOrigineEnfant()
    {
        return $this->origineEnfant;
    }

    public function setOrigineEnfant($origineEnfant)
    {
        $this->origineEnfant = $origineEnfant;
        return $this;
    }

    public function getDateAjoutDossierEnfant()
    {
        return $this->dateAjoutDossierEnfant;
    }

    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getProfil()
    {
        return $this->profil;
    }

    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function setDateAjoutDossierEnfant($dateAjoutDossierEnfant)
    {
        $this->dateAjoutDossierEnfant = $dateAjoutDossierEnfant;

        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of statutEnfant
     */
    public function getStatutEnfant()
    {
        return $this->statutEnfant;
    }

    /**
     * Set the value of statutEnfant
     *
     * @return  self
     */
    public function setStatutEnfant($statutEnfant)
    {
        $this->statutEnfant = $statutEnfant;

        return $this;
    }

    /**
     * Get the value of identifiant
     */
    public function getIdentifiantEnfant()
    {
        return $this->identifiantEnfant;
    }

    /**
     * Set the value of identifiant
     *
     * @return  self
     */
    public function setIdentifiantEnfant($identifiant)
    {
        $this->identifiantEnfant = $identifiant;

        return $this;
    }

    /**
     * Get the value of dateEntree
     */
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * Set the value of dateEntree
     *
     * @return  self
     */
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * Get the value of dateSortie
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set the value of dateSortie
     *
     * @return  self
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get the value of motifSortie
     */ 
    public function getMotifSortie()
    {
        return $this->motifSortie;
    }

    /**
     * Set the value of motifSortie
     *
     * @return  self
     */ 
    public function setMotifSortie($motifSortie)
    {
        $this->motifSortie = $motifSortie;

        return $this;
    }
}
