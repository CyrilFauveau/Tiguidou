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
     * @ORM\ManyToOne(targetEntity="App\Entity\Themes", inversedBy="question",)
     * @ORM\JoinColumn( name="theme_id", referencedColumnName="id")
     */
    private $theme;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $correctAnswer;

    /**
     * @var array
     * @ORM\Column(type="json")
     */
    private $otherAnswer = [];


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

    public function getCorrectAnswer(): ?string
    {
        return $this->correctAnswer;
    }

    public function setCorrectAnswer(string $correctAnswer): self
    {
        $this->correctAnswer = $correctAnswer;

        return $this;
    }

    public function getOtherAnswer(): ?array
    {
        return $this->otherAnswer;
    }

    public function setOtherAnswer(array $otherAnswer): self
    {
        $this->otherAnswer = $otherAnswer;

        return $this;
    }
}
