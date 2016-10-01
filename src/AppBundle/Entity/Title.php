<?php

namespace AppBundle\Entity;

use Becklyn\RadBundle\Entity\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 * @ORM\Table(name="titles")
 */
class Title
{
    use IdTrait;


    //region Fields
    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=1000)
     *
     * @Assert\NotBlank(message="Bitte geben Sie einen Titel ein.")
     * @Assert\Length(
     *     max=1000,
     *     maxMessage="Der Titel darf nicht länger als {{ limit }} Zeichen sein.",
     * )
     */
    private $title;


    /**
     * @var bool
     * @ORM\Column(name="is_main_title", type="boolean")
     */
    private $mainTitle = false;


    /**
     * @var bool
     * @ORM\Column(name="is_original_title", type="boolean")
     */
    private $originalTitle = false;


    /**
     * @var Film
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Film", inversedBy="titles")
     * @ORM\JoinColumn(name="film_id", referencedColumnName="id")
     */
    private $film;
    //endregion



    /**
     * @param Film $film
     */
    public function __construct (Film $film)
    {
        $this->film = $film;
    }



    //region Accessors
    /**
     * @return Film
     */
    public function getFilm () : Film
    {
        return $this->film;
    }



    /**
     * @return string
     */
    public function getTitle () : string
    {
        return $this->title;
    }



    /**
     * @param string $title
     */
    public function setTitle (string $title = null)
    {
        $this->title = $title;
    }



    /**
     * @return boolean
     */
    public function isMainTitle () : bool
    {
        return $this->mainTitle;
    }



    /**
     * @param boolean $mainTitle
     */
    public function setMainTitle (bool $mainTitle)
    {
        $this->mainTitle = $mainTitle;
    }



    /**
     * @return boolean
     */
    public function isOriginalTitle () : bool
    {
        return $this->originalTitle;
    }



    /**
     * @param boolean $originalTitle
     */
    public function setOriginalTitle (bool $originalTitle)
    {
        $this->originalTitle = $originalTitle;
    }
    //endregion
}
