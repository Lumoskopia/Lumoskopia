<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\EntityNameProperty;
use Becklyn\RadBundle\Entity\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 * @ORM\Table(name="location_categories")
 */
class LocationCategory
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
     * @var ArrayCollection|Location[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Location", mappedBy="category")
     */
    private $locations;
    //endregion



    /**
     */
    public function __construct ()
    {
        $this->locations = new ArrayCollection();
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
     * @return Location[]|ArrayCollection
     */
    public function getLocations () : ArrayCollection
    {
        return $this->locations;
    }
    //endregion
}
