<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eigenschaft
 *
 * @ORM\Table(name="eigenschaft")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EigenschaftRepository")
 */
class Eigenschaft
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="bezeichnung", type="string", length=255)
     */
    private $bezeichnung;

    /**
     * @var string
     *
     * @ORM\Column(name="beschreibung", type="string", length=255, nullable=true)
     */
    private $beschreibung;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bezeichnung
     *
     * @param string $bezeichnung
     *
     * @return Eigenschaft
     */
    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    /**
     * Get bezeichnung
     *
     * @return string
     */
    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    /**
     * Set beschreibung
     *
     * @param string $beschreibung
     *
     * @return Eigenschaft
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;

        return $this;
    }

    /**
     * Get beschreibung
     *
     * @return string
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }
}
