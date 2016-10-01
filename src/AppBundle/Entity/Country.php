<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\EntityNameProperty;
use Becklyn\RadBundle\Entity\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 * @ORM\Table(name="countries")
 */
class Country
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
     * @var string
     * @ORM\Column(name="code", length=2, unique=true)
     */
    private $code;


    /**
     * @var string
     * @ORM\Column(name="long_code", length=3, unique=true)
     */
    private $longCode;


    /**
     * @var Film[]|ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Film", inversedBy="countries")
     * @ORM\JoinTable(
     *     name="countries_films_mapping",
     *     joinColumns={@ORM\JoinColumn(name="country_id", referencedColumnName="country_id")},
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
     * @return string
     */
    public function getCode ()
    {
        return $this->code;
    }



    /**
     * @param string $code
     */
    public function setCode (string $code = null)
    {
        $this->code = $code;
    }



    /**
     * @return string
     */
    public function getLongCode ()
    {
        return $this->longCode;
    }



    /**
     * @param string $longCode
     */
    public function setLongCode (string $longCode = null)
    {
        $this->longCode = $longCode;
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
