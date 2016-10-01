<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\EntityTimeProperty;
use Becklyn\RadBundle\Entity\Traits\IdTrait;
use Becklyn\RadBundle\Entity\Traits\TimestampsTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 * @ORM\Table(name="ratings")
 */
class Rating
{
    //region Traits
    use IdTrait;
    use TimestampsTrait;
    //endregion


    //region Fields
    /**
     * @var int
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;


    /**
     * @var string|null
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;


    /**
     * @var float|null
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;


    /**
     * @var \DateTime|null
     * @ORM\Column(name="date_seen", type="date", nullable=true)
     */
    private $dateSeen;


    /**
     * @var Film
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Film", inversedBy="ratings")
     * @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     */
    private $film;


    /**
     * @var Location
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Location", inversedBy="ratings")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="location_id")
     */
    private $location;
    //endregion



    /**
     * @param Film $film
     */
    public function __construct (Film $film)
    {
        $this->film = $film;
        $this->timeCreated = new \DateTime();
    }



    //region Accessors
    /**
     * @return int
     */
    public function getRating ()
    {
        return $this->rating;
    }



    /**
     * @param int $rating
     */
    public function setRating (int $rating = null)
    {
        $this->rating = $rating;
    }



    /**
     * @return null|string
     */
    public function getComment ()
    {
        return $this->comment;
    }



    /**
     * @param null|string $comment
     */
    public function setComment (string $comment = null)
    {
        $this->comment = $comment;
    }



    /**
     * @return float|null
     */
    public function getPrice ()
    {
        return $this->price;
    }



    /**
     * @param float|null $price
     */
    public function setPrice (float $price = null)
    {
        $this->price = $price;
    }



    /**
     * @return \DateTime|null
     */
    public function getDateSeen ()
    {
        return $this->dateSeen;
    }



    /**
     * @param \DateTime|null $dateSeen
     */
    public function setDateSeen (\DateTime $dateSeen = null)
    {
        $this->dateSeen = $dateSeen;
    }



    /**
     * @return Film
     */
    public function getFilm () : Film
    {
        return $this->film;
    }



    /**
     * @return Location
     */
    public function getLocation ()
    {
        return $this->location;
    }



    /**
     * @param Location $location
     */
    public function setLocation (Location $location = null)
    {
        $this->location = $location;
    }
    //endregion
}
