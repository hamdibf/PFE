<?php

namespace cnct\facpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cnct\facpBundle\Entity\FacpGlob
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="cnct\facpBundle\Entity\FacpGlobRepository")
 */
class FacpGlob
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $num
     *
     * @ORM\Column(name="num", type="integer")
     */
    private $num;

    /**
     * @var string $origine
     *
     * @ORM\Column(name="origine", type="string", length=255)
     */
    private $origine;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=25)
     */
    private $type;

    /**
     * @var datetime $date_non_conformite
     *
     * @ORM\Column(name="date_non_conformite", type="datetime")
     */
    private $date_non_conformite;

    /**
     * @var string $enonce
     *
     * @ORM\Column(name="enonce", type="string", length=255)
     */
    private $enonce;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Utilisateur")
     */
    private $resp_concerne;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Utilisateur")
     */
    private $pilote;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Utilisateur")
     */
    private $interime;

    public function __construct()
    {
        $this->date = new \Datetime();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set num
     *
     * @param integer $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }

    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set origine
     *
     * @param string $origine
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;
    }

    /**
     * Get origine
     *
     * @return string 
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set enonce
     *
     * @param string $enonce
     */
    public function setEnonce($enonce)
    {
        $this->enonce = $enonce;
    }

    /**
     * Get enonce
     *
     * @return string 
     */
    public function getEnonce()
    {
        return $this->enonce;
    }


    /**
     * Set resp_concerne
     *
     * @param cnct\facpBundle\Entity\Utilisateur $respConcerne
     */
    public function setRespConcerne(\cnct\facpBundle\Entity\Utilisateur $respConcerne)
    {
        $this->resp_concerne = $respConcerne;
    }

    /**
     * Get resp_concerne
     *
     * @return cnct\facpBundle\Entity\Utilisateur 
     */
    public function getRespConcerne()
    {
        return $this->resp_concerne;
    }

    /**
     * Set pilote
     *
     * @param cnct\facpBundle\Entity\Utilisateur $pilote
     */
    public function setPilote(\cnct\facpBundle\Entity\Utilisateur $pilote)
    {
        $this->pilote = $pilote;
    }

    /**
     * Get pilote
     *
     * @return cnct\facpBundle\Entity\Utilisateur 
     */
    public function getPilote()
    {
        return $this->pilote;
    }

    /**
     * Set interime
     *
     * @param cnct\facpBundle\Entity\Utilisateur $interime
     */
    public function setInterime(\cnct\facpBundle\Entity\Utilisateur $interime)
    {
        $this->interime = $interime;
    }

    /**
     * Get interime
     *
     * @return cnct\facpBundle\Entity\Utilisateur 
     */
    public function getInterime()
    {
        return $this->interime;
    }

    /**
     * Set date_non_conformite
     *
     * @param datetime $dateNonConformite
     */
    public function setDateNonConformite($dateNonConformite)
    {
        $this->date_non_conformite = $dateNonConformite;
    }

    /**
     * Get date_non_conformite
     *
     * @return datetime 
     */
    public function getDateNonConformite()
    {
        return $this->date_non_conformite;
    }
}