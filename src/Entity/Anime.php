<?php

namespace App\Entity;

use App\Repository\AnimeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeRepository::class)
 */
class Anime
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstAirDate;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $ids = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $alt_titles = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rank;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poster;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fanart;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $first_aired;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $airs = [];

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $runtime;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $overview;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $genres = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $total_episodes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $ratings = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $trailers = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $users_recommendations = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $relations = [];

    /**
     * @ORM\ManyToOne(targetEntity=UserAnimeList::class, inversedBy="user")
     */
    private $userAnimeList;

    /**
     * @ORM\ManyToOne(targetEntity=UserAnimeList::class, inversedBy="anime")
     */
    private $watchers;

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

    public function getFirstAirDate(): ?string
    {
        return $this->firstAirDate;
    }

    public function setFirstAirDate(?string $firstAirDate): self
    {
        $this->firstAirDate = $firstAirDate;

        return $this;
    }

    public function getIds(): ?array
    {
        return $this->ids;
    }

    public function setIds(?array $ids): self
    {
        $this->ids = $ids;

        return $this;
    }

    public function getAltTitles(): ?array
    {
        return $this->alt_titles;
    }

    public function setAltTitles(?array $alt_titles): self
    {
        $this->alt_titles = $alt_titles;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(?int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getFanart(): ?string
    {
        return $this->fanart;
    }

    public function setFanart(?string $fanart): self
    {
        $this->fanart = $fanart;

        return $this;
    }

    public function getFirstAired(): ?\DateTimeInterface
    {
        return $this->first_aired;
    }

    public function setFirstAired(?\DateTimeInterface $first_aired): self
    {
        $this->first_aired = $first_aired;

        return $this;
    }

    public function getAirs(): ?array
    {
        return $this->airs;
    }

    public function setAirs(?array $airs): self
    {
        $this->airs = $airs;

        return $this;
    }

    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    public function setRuntime(?int $runtime): self
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(?string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getGenres(): ?array
    {
        return $this->genres;
    }

    public function setGenres(?array $genres): self
    {
        $this->genres = $genres;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTotalEpisodes(): ?int
    {
        return $this->total_episodes;
    }

    public function setTotalEpisodes(?int $total_episodes): self
    {
        $this->total_episodes = $total_episodes;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRatings(): ?array
    {
        return $this->ratings;
    }

    public function setRatings(?array $ratings): self
    {
        $this->ratings = $ratings;

        return $this;
    }

    public function getTrailers(): ?array
    {
        return $this->trailers;
    }

    public function setTrailers(?array $trailers): self
    {
        $this->trailers = $trailers;

        return $this;
    }

    public function getUsersRecommendations(): ?array
    {
        return $this->users_recommendations;
    }

    public function setUsersRecommendations(?array $users_recommendations): self
    {
        $this->users_recommendations = $users_recommendations;

        return $this;
    }

    public function getRelations(): ?array
    {
        return $this->relations;
    }

    public function setRelations(?array $relations): self
    {
        $this->relations = $relations;

        return $this;
    }

    public function getUserAnimeList(): ?UserAnimeList
    {
        return $this->userAnimeList;
    }

    public function setUserAnimeList(?UserAnimeList $userAnimeList): self
    {
        $this->userAnimeList = $userAnimeList;

        return $this;
    }

    public function getWatchers(): ?UserAnimeList
    {
        return $this->watchers;
    }

    public function setWatchers(?UserAnimeList $watchers): self
    {
        $this->watchers = $watchers;

        return $this;
    }
}
