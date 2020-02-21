<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionsRepository")
 */
class Questions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="array")
     */
    private $otherAnswers = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Themes", mappedBy="question", orphanRemoval=true)
     */
    private $theme;

    public function __construct()
    {
        $this->theme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getOtherAnswers(): ?array
    {
        return $this->otherAnswers;
    }

    public function setOtherAnswers(array $otherAnswers): self
    {
        $this->otherAnswers = $otherAnswers;

        return $this;
    }

    /**
     * @return Collection|Themes[]
     */
    public function getTheme(): Collection
    {
        return $this->theme;
    }

    public function addTheme(Themes $theme): self
    {
        if (!$this->theme->contains($theme)) {
            $this->theme[] = $theme;
            $theme->setQuestion($this);
        }

        return $this;
    }

    public function removeTheme(Themes $theme): self
    {
        if ($this->theme->contains($theme)) {
            $this->theme->removeElement($theme);
            // set the owning side to null (unless already changed)
            if ($theme->getQuestion() === $this) {
                $theme->setQuestion(null);
            }
        }

        return $this;
    }
}
