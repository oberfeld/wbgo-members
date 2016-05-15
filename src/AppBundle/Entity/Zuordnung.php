<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zuordnung
 *
 * @ORM\Table(name="zuordnung")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ZuordnungRepository")
 */
class Zuordnung
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
     * @ORM\Column(name="auspraegung", type="string", length=255, nullable=true)
     */
    private $auspraegung;


    /**
     * @ORM\ManyToOne(targetEntity="Eigenschaft")
     * @ORM\JoinColumn(name="eigenschaft_id", referencedColumnName="id")
     */
    private $eigenschaft;

    /**
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="zuordnung")
     * @ORM\JoinColumn(name="member_id", referencedColumnName="id")
     */
    private $member;

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
     * Set auspraegung
     *
     * @param string $auspraegung
     *
     * @return Zuordnung
     */
    public function setAuspraegung($auspraegung)
    {
        $this->auspraegung = $auspraegung;

        return $this;
    }

    /**
     * Get auspraegung
     *
     * @return string
     */
    public function getAuspraegung()
    {
        return $this->auspraegung;
    }

    /**
     * Set eigenschaft
     *
     * @param \AppBundle\Entity\Eigenschaft $eigenschaft
     *
     * @return Zuordnung
     */
    public function setEigenschaft(\AppBundle\Entity\Eigenschaft $eigenschaft = null)
    {
        $this->eigenschaft = $eigenschaft;

        return $this;
    }

    /**
     * Get eigenschaft
     *
     * @return \AppBundle\Entity\Eigenschaft
     */
    public function getEigenschaft()
    {
        return $this->eigenschaft;
    }

    /**
     * Set member
     *
     * @param \AppBundle\Entity\Member $member
     *
     * @return Zuordnung
     */
    public function setMember(\AppBundle\Entity\Member $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \AppBundle\Entity\Member
     */
    public function getMember()
    {
        return $this->member;
    }
}
