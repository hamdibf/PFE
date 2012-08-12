<?php

namespace cnct\facpBundle\Entity;

use cnct\facpBundle\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;

/**
 * cnct\facpBundle\Entity\Processus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="cnct\facpBundle\Entity\ProcessusRepository")
 */
class Processus
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
     * @var string $code_pro
     *
     * @ORM\Column(name="code_pro", type="string", length=25)
     */
    private $code_pro;

    /**
     * @var string $libelle
     *
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Utilisateur" )
     * @ORM\JoinColumn(name="pilote_id", referencedColumnName="id")
     */
    private $pilote;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(name="interime_id", referencedColumnName="id")
     */
    private $interime;


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
     * Set code_pro
     *
     * @param string $codePro
     */
    public function setCodePro($codePro)
    {
        $this->code_pro = $codePro;
    }

    /**
     * Get code_pro
     *
     * @return string 
     */
    public function getCodePro()
    {
        return $this->code_pro;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
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
    public function __toString(){
        return $this->code_pro.' '.$this->libelle;
    }
}