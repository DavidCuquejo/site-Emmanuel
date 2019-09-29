<?php

namespace App\Entity;

use App\Entity\Membre;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembreRepository")
 * @UniqueEntity(
 * fields={"email"},
 * message="l'email est dejà utilisé!")
 * 
 */
class Membre implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     * @Assert\Length(min="5", minMessage="Must be greater than 5 characters")
	 *  
     */
    private $password;

   

        /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     * 
     */
    private $prenom;
	

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     *
     */
    private $nom;

    /**
     * @var string
	 *
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=false)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
	 *
     *
     * @ORM\Column(name="role", type="string", length=60, nullable=false)
     */
    private $role = 'ROLE_USER';

    /**
     * @var string
	 *
     *
     * @ORM\Column(name="salt", type="string", length=60, nullable=true)
     */
    private $salt = NULL;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $username;






    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }



    public function getRole()
    {
        return $this->roles;
    }
    public function setRole($role){
        $this -> role = $role; 
        return $this; 
    }

    public function getRoles()
    {
        return $this->roles=[$this -> role];
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function SetSalt()
    {
        $this->salt=$salt;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }





}


