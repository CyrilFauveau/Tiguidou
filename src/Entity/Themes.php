<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemesRepository")
 */
class Themes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Questions", mappedBy="theme")
     */
    private $question;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="theme", orphanRemoval=true)
     */
    private $log;

    /**
     * Themes constructor
     */
    public function __construct()
    {
        $this->question = new ArrayCollection();
        $this->classement = new ArrayCollection();
        $this->log = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuestion(): ?Questions
    {
        return $this->question;
    }

    public function setQuestion(?Questions $question): self
    {
        $this->question = $question;

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
            $log->setTheme($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->log->contains($log)) {
            $this->log->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getTheme() === $this) {
                $log->setTheme(null);
            }
        }

        return $this;
    }
}
