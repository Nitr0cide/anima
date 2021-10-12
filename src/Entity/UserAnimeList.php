<?php

namespace App\Entity;

use App\Repository\UserAnimeListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserAnimeListRepository::class)
 */
class UserAnimeList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="AnimeList")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Anime::class, mappedBy="watchers")
     */
    private $anime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastEpisodeSeen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $episodeTimer;


    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->anime = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Anime[]
     */
    public function getAnime(): Collection
    {
        return $this->anime;
    }

    public function addAnime(Anime $anime): self
    {
        if (!$this->anime->contains($anime)) {
            $this->anime[] = $anime;
            $anime->setWatchers($this);
        }

        return $this;
    }

    public function removeAnime(Anime $anime): self
    {
        if ($this->anime->removeElement($anime)) {
            // set the owning side to null (unless already changed)
            if ($anime->getWatchers() === $this) {
                $anime->setWatchers(null);
            }
        }

        return $this;
    }

    public function getLastEpisodeSeen(): ?string
    {
        return $this->lastEpisodeSeen;
    }

    public function setLastEpisodeSeen(?string $lastEpisodeSeen): self
    {
        $this->lastEpisodeSeen = $lastEpisodeSeen;

        return $this;
    }

    public function getEpisodeTimer(): ?string
    {
        return $this->episodeTimer;
    }

    public function setEpisodeTimer(?string $episodeTimer): self
    {
        $this->episodeTimer = $episodeTimer;

        return $this;
    }

}
