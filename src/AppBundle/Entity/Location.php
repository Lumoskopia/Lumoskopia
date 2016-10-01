<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\EntityNameProperty;
use Becklyn\RadBundle\Entity\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="locations")
 */
class Location
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
     * @var LocationCategory
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LocationCategory", inversedBy="locations")
     * @ORM\JoinColumn(name="location_category_id", referencedColumnName="location_category_id")
     */
    private $category;


    /**
     * @var ArrayCollection|Rating[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Rating", mappedBy="location")
     */
    private $ratings;
    //endregion



    /**
     */
    public function __construct ()
    {
        $this->ratings = new ArrayCollection();
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
     * @return LocationCategory
     */
    public function getCategory ()
    {
        return $this->category;
    }



    /**
     * @param LocationCategory $category
     */
    public function setCategory (LocationCategory $category = null)
    {
        $this->category = $category;
    }



    /**
     * @return Rating[]|ArrayCollection
     */
    public function getRatings () : ArrayCollection
    {
        return $this->ratings;
    }
    //endregion
}
