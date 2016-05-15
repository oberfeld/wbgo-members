<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MemberRepository")
 */
class Member
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="vorname", type="string", length=255)
     */
    private $vorname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="geburtsdatum", type="date", nullable=true)
     */
    private $geburtsdatum;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=20, nullable=true)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Zuordnung", mappedBy="member")
     */
    private $zuordnungen;

    public function __construct()
    {
        $this->zuordnungen = new ArrayCollection();
    }
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
     * Set name
     *
     * @param string $name
     *
     * @return Member
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set vorname
     *
     * @param string $vorname
     *
     * @return Member
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;

        return $this;
    }

    /**
     * Get vorname
     *
     * @return string
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Set geburtsdatum
     *
     * @param \DateTime $geburtsdatum
     *
     * @return Member
     */
    public function setGeburtsdatum($geburtsdatum)
    {
        $this->geburtsdatum = $geburtsdatum;

        return $this;
    }

    /**
     * Get geburtsdatum
     *
     * @return \DateTime
     */
    public function getGeburtsdatum()
    {
        return $this->geburtsdatum;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Member
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     *
     * @return Member
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add zuordnungen
     *
     * @param \AppBundle\Entity\Zuordnung $zuordnungen
     *
     * @return Member
     */
    public function addZuordnungen(\AppBundle\Entity\Zuordnung $zuordnungen)
    {
        $this->zuordnungen[] = $zuordnungen;

        return $this;
    }

    /**
     * Remove zuordnungen
     *
     * @param \AppBundle\Entity\Zuordnung $zuordnungen
     */
    public function removeZuordnungen(\AppBundle\Entity\Zuordnung $zuordnungen)
    {
        $this->zuordnungen->removeElement($zuordnungen);
    }

    /**
     * Get zuordnungen
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZuordnungen()
    {
        return $this->zuordnungen;
    }
}
