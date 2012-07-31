<?php

namespace cnct\facpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cnct\facpBundle\Entity\Sous_direction
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Sous_direction
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
     * @var string $code_s_dir
     *
     * @ORM\Column(name="code_s_dir", type="string", length=25)
     */
    private $code_s_dir;

    /**
     * @var string $libelle
     *
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    /**
     * @var string $direction
     *
     * @ORM\Column(name="direction", type="string", length=50)
     */
    private $direction;


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
     * Set code_s_dir
     *
     * @param string $codeSDir
     */
    public function setCodeSDir($codeSDir)
    {
        $this->code_s_dir = $codeSDir;
    }

    /**
     * Get code_s_dir
     *
     * @return string 
     */
    public function getCodeSDir()
    {
        return $this->code_s_dir;
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
     * Set direction
     *
     * @param string $direction
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    /**
     * Get direction
     *
     * @return string 
     */
    public function getDirection()
    {
        return $this->direction;
    }
}