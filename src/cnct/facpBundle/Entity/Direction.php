<?php

namespace cnct\facpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cnct\facpBundle\Entity\Direction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="cnct\facpBundle\Entity\DirectionRepository")
 */
class Direction
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
     * @var string $code_dir
     *
     * @ORM\Column(name="code_dir", type="string", length=25)
     */
    private $code_dir;

    /**
     * @var string $libelle
     *
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(name="directeur_id", referencedColumnName="id")
     */
    private $directeur;


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
     * Set code_dir
     *
     * @param string $codeDir
     */
    public function setCodeDir($codeDir)
    {
        $this->code_dir = $codeDir;
    }

    /**
     * Get code_dir
     *
     * @return string 
     */
    public function getCodeDir()
    {
        return $this->code_dir;
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
     * Set directeur
     *
     * @param cnct\facpBundle\Entity\Utilisateur $directeur
     */
    public function setDirecteur(\cnct\facpBundle\Entity\Utilisateur $directeur)
    {
        $this->directeur = $directeur;
    }

    /**
     * Get directeur
     *
     * @return cnct\facpBundle\Entity\Utilisateur 
     */
    public function getDirecteur()
    {
        return $this->directeur;
    }

    public function __toString(){
        return $this->code_dir.' '.$this->libelle;
    }
}