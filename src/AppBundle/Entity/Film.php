<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\EntityTimeProperty;
use Becklyn\RadBundle\Entity\Traits\IdTrait;
use Becklyn\RadBundle\Entity\Traits\TimestampsTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="films")
 */
class Film
{
    use IdTrait;
    use TimestampsTrait;


    //region Fields
    /**
     * @var string|null
     * @ORM\Column(name="story", type="text", nullable=true)
     */
    private $story;


    /**
     * @var int|null
     * @ORM\Column(name="year", type="integer", nullable=true)
     */
    private $year;


    /**
     * @var int|null
     * @ORM\Column(name="runtime", type="integer", nullable=true)
     */
    private $runtime;


    /**
     * @var string|null
     * @ORM\Column(name="imdb_id", type="string", length=50, nullable=true)
     */
    private $imdbId;


    /**
     * @var \DateTime|null
     * @ORM\Column(name="theatrical_release", type="date", nullable=true)
     */
    private $theatricalRelease;


    /**
     * @var bool|null
     * @ORM\Column(name="no_theatrical_release", type="boolean")
     */
    private $noTheatricalRelease;


    /**
     * @var ArrayCollection|Title[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Title", mappedBy="film")
     * @ORM\OrderBy({"mainTitle"="desc", "originalTitle"="desc", "title"="asc"})
     */
    private $titles;


    /**
     * @var ArrayCollection|Rating[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Rating", mappedBy="film")
     * @ORM\OrderBy({"dateSeen"="desc"})
     */
    private $ratings;


    /**
     * @var ArrayCollection|Country[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Country", mappedBy="films")
     */
    private $countries;


    /**
     * @var ArrayCollection|Genre[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Genre", mappedBy="films")
     * @ORM\OrderBy({"name"="asc"})
     */
    private $genres;
    //endregion


    //region Cached related fields
    /**
     * @var string
     * @ORM\Column(name="main_title", type="string", length=1000)
     */
    private $mainTitle;


    /**
     * @var int|null
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $averagedRating;


    /**
     * @var \DateTime|null
     * @ORM\Column(name="date_last_seen", type="date", nullable=true)
     */
    private $dateLastSeen;
    //endregion


    /**
     */
    public function __construct ()
    {
        $this->titles = new ArrayCollection();
        $this->ratings = new ArrayCollection();
        $this->countries = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->timeCreated = new \DateTime();
    }


    //region Accessors
    /**
     * @return null|string
     */
    public function getStory ()
    {
        return $this->story;
    }



    /**
     * @param null|string $story
     */
    public function setStory (string $story = null)
    {
        $this->story = $story;
    }



    /**
     * @return int|null
     */
    public function getYear ()
    {
        return $this->year;
    }



    /**
     * @param int|null $year
     */
    public function setYear (int $year = null)
    {
        $this->year = $year;
    }



    /**
     * @return int|null
     */
    public function getRuntime ()
    {
        return $this->runtime;
    }



    /**
     * @param int|null $runtime
     */
    public function setRuntime (int $runtime = null)
    {
        $this->runtime = $runtime;
    }



    /**
     * @return null|string
     */
    public function getImdbId ()
    {
        return $this->imdbId;
    }



    /**
     * @param null|string $imdbId
     */
    public function setImdbId (string $imdbId = null)
    {
        $this->imdbId = $imdbId;
    }



    /**
     * @return \DateTime|null
     */
    public function getTheatricalRelease ()
    {
        return $this->theatricalRelease;
    }



    /**
     * @param \DateTime|null $theatricalRelease
     */
    public function setTheatricalRelease (\DateTime $theatricalRelease = null)
    {
        $this->theatricalRelease = $theatricalRelease;
    }



    /**
     * @return bool
     */
    public function getNoTheatricalRelease ()
    {
        return $this->noTheatricalRelease;
    }



    /**
     * @param bool $noTheatricalRelease
     */
    public function setNoTheatricalRelease (bool $noTheatricalRelease)
    {
        $this->noTheatricalRelease = $noTheatricalRelease;
    }



    /**
     * @return int|null
     */
    public function getAveragedRating ()
    {
        return $this->averagedRating;
    }



    /**
     * @param int|null $averagedRating
     */
    public function setAveragedRating (int $averagedRating = null)
    {
        $this->averagedRating = $averagedRating;
    }



    /**
     * @return \DateTime|null
     */
    public function getDateLastSeen ()
    {
        return $this->dateLastSeen;
    }



    /**
     * @param \DateTime|null $dateLastSeen
     */
    public function setDateLastSeen (\DateTime $dateLastSeen = null)
    {
        $this->dateLastSeen = $dateLastSeen;
    }



    /**
     * @return Title[]|ArrayCollection
     */
    public function getTitles () : ArrayCollection
    {
        return $this->titles;
    }



    /**
     * @return Rating[]|ArrayCollection
     */
    public function getRatings () : ArrayCollection
    {
        return $this->ratings;
    }



    /**
     * @return Country[]|ArrayCollection
     */
    public function getCountries () : ArrayCollection
    {
        return $this->countries;
    }



    /**
     * @return Genre[]|ArrayCollection
     */
    public function getGenres () : ArrayCollection
    {
        return $this->genres;
    }
    //endregion



    /**
     * Returns the imdb url
     *
     * @return null|string
     */
    public function getImdbUrl ()
    {
        return null !== $this->getImdbId()
            ? sprintf("http://www.imdb.com/title/%s/", $this->getImdbId())
            : null;
    }
}
