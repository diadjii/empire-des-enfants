<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="consultation_medicale")
 */

class ConsultationMedicale{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id",type="integer")
     */
    private $idConsultation;

    /**
     * @ORM\ManyToOne(targetEntity = DossierMedicale::class,cascade={"remove"})
     */
    private $idDossierMedicale;

    /**
     * @ORM\Column(type="string")
     */
    private $typeConsultation;

    /**
     * @ORM\Column(type="string")
     */
    private $prescription;

    /**
     * @ORM\Column(type="string")
     */
    private $analyseComplementaire;

    /**
     * @ORM\Column(type="string")
     */
    private $diagnostique;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $dateVisite;


    public function getDateVisite()
    {
        return $this->dateVisite;
    }


    public function setDateVisite($dateVisite): void
    {
        $this->dateVisite = $dateVisite;
    }

    public function getIdConsultation()
    {
        return $this->idConsultation;
    }


    public function setIdConsultation($idConsultation)
    {
        $this->idConsultation = $idConsultation;

        return $this;
    }


    public function getIdDossierMedicale()
    {
        return $this->idDossierMedicale;
    }


    public function setIdDossierMedicale($idDossierMedicale)
    {
        $this->idDossierMedicale = $idDossierMedicale;

        return $this;
    }


    public function getTypeConsultation()
    {
        return $this->typeConsultation;
    }


    public function setTypeConsultation($typeConsultation)
    {
        $this->typeConsultation = $typeConsultation;

        return $this;
    }


    public function getPrescription()
    {
        return $this->prescription;
    }


    public function setPrescription($prescription)
    {
        $this->prescription = $prescription;

        return $this;
    }


    public function getAnalyseComplementaire()
    {
        return $this->analyseComplementaire;
    }


    public function setAnalyseComplementaire($analyseComplementaire)
    {
        $this->analyseComplementaire = $analyseComplementaire;

        return $this;
    }

    public function getDiagnostique()
    {
        return $this->diagnostique;
    }


    public function setDiagnostique($diagnostique)
    {
        $this->diagnostique = $diagnostique;

        return $this;
    }

    public function __toString(){
        // to show the name of the Category in the select
        return "consultation : "+$this->typeConsultation;
        // to show the id of the Category in the select
        // return $this->id;
    }

}