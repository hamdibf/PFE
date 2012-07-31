<?php

namespace cnct\facpBundle\Entity;

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
     * @var string $pilote
     *
     * @ORM\Column(name="pilote", type="string", length=50)
     */
    private $pilote;

    /**
     * @var string $interime
     *
     * @ORM\Column(name="interime", type="string", length=50)
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
     * @param string $pilote
     */
    public function setPilote($pilote)
    {
        $this->pilote = $pilote;
    }

    /**
     * Get pilote
     *
     * @return string 
     */
    public function getPilote()
    {
        return $this->pilote;
    }

    /**
     * Set interime
     *
     * @param string $interime
     */
    public function setInterime($interime)
    {
        $this->interime = $interime;
    }

    /**
     * Get interime
     *
     * @return string 
     */
    public function getInterime()
    {
        return $this->interime;
    }
}