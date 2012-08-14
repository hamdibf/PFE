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
    public static $num;

    /**
     * @var string $origine
     *
     * @ORM\Column(name="origine", type="string", length=255)
     */
    private $origine;

    /**
     * @var string $non_conformite
     *
     * @ORM\Column(name="non_conformite", type="string", length=25)
     */
    private $non_conformite;

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
    private $detecteur;

    /**
     * @var string $etat
     *
     * @ORM\Column(name="etat", type="string", length=50)
     */
    private $etat;
    
    
    
    public function __construct()
    {
        $this->date_non_conformite = new \Datetime();
        $this->etat = "En attente de correction";
        
        if (is_null(self::$num)) 
            self::$num=1;
        else
            self::$num++;
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


    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum()
    {
        return self::$num;
    }

    /**
     * Set non_conformite
     *
     * @param string $nonConformite
     */
    public function setNonConformite($nonConformite)
    {
        $this->non_conformite = $nonConformite;
    }

    /**
     * Get non_conformite
     *
     * @return string 
     */
    public function getNonConformite()
    {
        return $this->non_conformite;
    }
    /**
     * Set etat
     *
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }
    /**
     * Set detecteur
     *
     * @param cnct\facpBundle\Entity\Utilisateur $detecteur
     */
    public function setDetecteur(\cnct\facpBundle\Entity\Utilisateur $detecteur)
    {
        $this->detecteur = $detecteur;
    }

    /**
     * Get detecteur
     *
     * @return cnct\facpBundle\Entity\Utilisateur 
     */
    public function getDetecteur()
    {
        return $this->detecteur;
    }
}