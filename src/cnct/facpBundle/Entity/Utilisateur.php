<?php

namespace cnct\facpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * cnct\facpBundle\Entity\Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="cnct\facpBundle\Entity\UtilisateurRepository")
 */
class Utilisateur
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
     * @var string $matricule
     *
     * @ORM\Column(name="matricule", type="string", length=50)
     * @Assert\MinLength(3)
     */
    private $matricule;

    /**
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string $adresse_ip
     * @Assert\Ip()
     * @ORM\Column(name="adresse_ip", type="string", length=40)
     */
    private $adresse_ip;

    /**
     * @var string $categorie
     * 
     * @ORM\Column(name="categorie", type="string", length=10)
     */
    private $categorie;

    /**
     * @var string $etat
     *
     * @ORM\Column(name="etat", type="string", length=10)
     */
    private $etat;

    /**
     * @var string $grade
     *
     * @ORM\Column(name="grade", type="string", length=20)
     */
    private $grade;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Processus")
     */
    private $processus;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Direction")
     */
    private $direction;

    /**
     * @ORM\OneToOne(targetEntity="cnct\facpBundle\Entity\Sous_direction")
     */
    private $sous_direction;
    
    /**
     * @ORM\OneToOne(targetEntity="cnct\UserBundle\Entity\User", cascade={"remove"})
     */
    private $auth;

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
     * Set matricule
     *
     * @param string $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse_ip
     *
     * @param string $adresseIp
     */
    public function setAdresseIp($adresseIp)
    {
        $this->adresse_ip = $adresseIp;
    }

    /**
     * Get adresse_ip
     *
     * @return string 
     */
    public function getAdresseIp()
    {
        return $this->adresse_ip;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie()
    {
        return $this->categorie;
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
     * Set grade
     *
     * @param string $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * Get grade
     *
     * @return string 
     */
    public function getGrade()
    {
        return $this->grade;
    }


    
    public function __toString(){
        return $this->matricule.' '.$this->nom.' '.$this->prenom;
    }

    /**
     * Set processus
     *
     * @param cnct\facpBundle\Entity\Processus $processus
     */
    public function setProcessus(\cnct\facpBundle\Entity\Processus $processus)
    {
        $this->processus = $processus;
    }

    /**
     * Get processus
     *
     * @return cnct\facpBundle\Entity\Processus 
     */
    public function getProcessus()
    {
        return $this->processus;
    }

    /**
     * Set direction
     *
     * @param cnct\facpBundle\Entity\Direction $direction
     */
    public function setDirection(\cnct\facpBundle\Entity\Direction $direction)
    {
        $this->direction = $direction;
    }

    /**
     * Get direction
     *
     * @return cnct\facpBundle\Entity\Direction 
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set sous_direction
     *
     * @param cnct\facpBundle\Entity\Sous_direction $sousDirection
     */
    public function setSousDirection(\cnct\facpBundle\Entity\Sous_direction $sousDirection)
    {
        $this->sous_direction = $sousDirection;
    }

    /**
     * Get sous_direction
     *
     * @return cnct\facpBundle\Entity\Sous_direction 
     */
    public function getSousDirection()
    {
        return $this->sous_direction;
    }

    /**
     * Set authentificationObject
     *
     * @param cnct\UserBundle\Entity\User $authentificationObject
     */
    public function setAuthentificationObject(\cnct\UserBundle\Entity\User $authentificationObject)
    {
        $this->auth = $authentificationObject;
    }

    /**
     * Get authentificationObject
     *
     * @return cnct\UserBundle\Entity\User 
     */
    public function getAuthentificationObject()
    {
        return $this->auth;
    }
}