<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields = {"username"}, message="Ce nom d'utilisateur est déjà utilisé")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire au moins 8 caractères")
     */
    private $password;

    /**
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire au moins 8 caractères")
     * @Assert\EqualTo(propertyPath="password")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $solde;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Bonus", inversedBy="user")
     */
    private $bonus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Quantity", mappedBy="user", orphanRemoval=true)
     */
    private $quantity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Classement", mappedBy="user", orphanRemoval=true)
     */
    private $classement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="user", orphanRemoval=true)
     */
    private $log;

    public function __construct()
    {
        $this->bonus = new ArrayCollection();
        $this->quantity = new ArrayCollection();
        $this->classement = new ArrayCollection();
        $this->log = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(?int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * @return Collection|Bonus[]
     */
    public function getBonus(): Collection
    {
        return $this->bonus;
    }

    public function addBonus(Bonus $bonus): self
    {
        if (!$this->bonus->contains($bonus)) {
            $this->bonus[] = $bonus;
        }

        return $this;
    }

    public function removeBonus(Bonus $bonus): self
    {
        if ($this->bonus->contains($bonus)) {
            $this->bonus->removeElement($bonus);
        }

        return $this;
    }

    /**
     * @return Collection|Quantity[]
     */
    public function getQuantity(): Collection
    {
        return $this->quantity;
    }

    public function addQuantity(Quantity $quantity): self
    {
        if (!$this->quantity->contains($quantity)) {
            $this->quantity[] = $quantity;
            $quantity->setUser($this);
        }

        return $this;
    }

    public function removeQuantity(Quantity $quantity): self
    {
        if ($this->quantity->contains($quantity)) {
            $this->quantity->removeElement($quantity);
            // set the owning side to null (unless already changed)
            if ($quantity->getUser() === $this) {
                $quantity->setUser(null);
            }
        }

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return Collection|Classement[]
     */
    public function getClassement(): Collection
    {
        return $this->classement;
    }

    public function addClassement(Classement $classement): self
    {
        if (!$this->classement->contains($classement)) {
            $this->classement[] = $classement;
            $classement->setUser($this);
        }

        return $this;
    }

    public function removeClassement(Classement $classement): self
    {
        if ($this->classement->contains($classement)) {
            $this->classement->removeElement($classement);
            // set the owning side to null (unless already changed)
            if ($classement->getUser() === $this) {
                $classement->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Log[]
     */
    public function getLog(): Collection
    {
        return $this->log;
    }

    public function addLog(Log $log): self
    {
        if (!$this->log->contains($log)) {
            $this->log[] = $log;
            $log->setUser($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->log->contains($log)) {
            $this->log->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getUser() === $this) {
                $log->setUser(null);
            }
        }

        return $this;
    }

}
