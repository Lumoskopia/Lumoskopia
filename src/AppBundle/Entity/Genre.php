<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\EntityNameProperty;
use Becklyn\RadBundle\Entity\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity()
 * @ORM\Table(name="genres")
 */
class Genre
{
    use IdTrait;


    //region Fields
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=1000)
     *
     * @Assert\NotBlank(message="Bitte geben Sie einen Namen ein.")
     * @Assert\Length(
     *     max=1000,
     *     maxMessage="Der Name darf nicht länger als {{ limit }} Zeichen sein.",
     * )
     */
    private $name;


    /**
     * @var Film[]|ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Film", inversedBy="genres")
     * @ORM\JoinTable(
     *     name="genres_films_mapping",
     *     joinColumns={@ORM\JoinColumn(name="genre_id", referencedColumnName="genre_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="film_id", referencedColumnName="film_id")}
     * )
     * @ORM\OrderBy({"title"="asc"})
     */
    private $films;
    //endregion



    /**
     */
    public function __construct ()
    {
        $this->films = new ArrayCollection();
    }



    //region Accessors

    /**
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }



    /**
     * @param string $name
     */
    public function setName (string $name = null)
    {
        $this->name = $name;
    }



    /**
     * @return Film[]|ArrayCollection
     */
    public function getFilms () : ArrayCollection
    {
        return $this->films;
    }
    //endregion
}
