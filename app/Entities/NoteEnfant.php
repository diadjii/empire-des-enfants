<?php

namespace App\Entities;

use  Doctrine\ORM\Mapping AS ORM;


/**
* @ORM\Entity
* @ORM\Table(name="note_enfant")
*/
class NoteEnfant
{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(name="id",type="integer")
  */
  private $idNote;

  /**
  * @ORM\ManyToOne(targetEntity = DossierEnfant::class)
  */
  private $idDossierEnfant;

  /**
   * @ORM\Column(type="string")
   */
  private $objet;

  /**
   * @ORM\Column(type="string")
   */
  private $note;

  /**
   * @ORM\Column(type="string")
   */
  private $dateAjoutNote;

  /**
  * @ORM\ManyToOne(targetEntity = User::class)
  */
  private $idUser;
  /**
   * Get the value of idNote
   */
  public function getIdNote()
  {
    return $this->idNote;
  }

  /**
   * Set the value of idNote
   *
   * @return  self
   */
  public function setIdNote($idNote)
  {
    $this->idNote = $idNote;

    return $this;
  }

  /**
   * Get the value of idDossierEnfant
   */
  public function getIdDossierEnfant()
  {
    return $this->idDossierEnfant;
  }

  /**
   * Set the value of idDossierEnfant
   *
   * @return  self
   */
  public function setIdDossierEnfant($idDossierEnfant)
  {
    $this->idDossierEnfant = $idDossierEnfant;

    return $this;
  }

  /**
   * Get the value of note
   */
  public function getNote()
  {
    return $this->note;
  }

  /**
   * Set the value of note
   *
   * @return  self
   */
  public function setNote($note)
  {
    $this->note = $note;

    return $this;
  }

  /**
   * Get the value of dateAjoutNote
   */
  public function getDateAjoutNote()
  {
    return $this->dateAjoutNote;
  }

  /**
   * Set the value of dateAjoutNote
   *
   * @return  self
   */
  public function setDateAjoutNote($dateAjoutNote)
  {
    $this->dateAjoutNote = $dateAjoutNote;

    return $this;
  }

  /**
   * Get the value of objet
   */
  public function getObjet()
  {
    return $this->objet;
  }

  /**
   * Set the value of objet
   *
   * @return  self
   */
  public function setObjet($objet)
  {
    $this->objet = $objet;

    return $this;
  }

    /**
     * Get the value of Id User
     *
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of Id User
     *
     * @param mixed idUser
     *
     * @return self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

}
