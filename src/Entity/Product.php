<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    
    const TYPE_HIGH_TECH = 'HIGH_TECH';
    const TYPE_KITCHEN = "KITCHEN";
    const TYPE_APPLIANCE = "APPLIANCE";
    const TYPE_GAME = "GAME";
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $discountedPrice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;
    
    public function __toString()
    {
        return $this->getName();
    }
    
    public function getTypeName($type)
    {
        switch ($type)
        {
            case self::TYPE_APPLIANCE:  
                return 'Electromenager';
                
            case self::TYPE_KITCHEN:
                return 'Cuisine';
                
            case self::TYPE_GAME:
                return 'Jeux';
                
            case self::TYPE_HIGH_TECH:
                return 'High Tech';
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDiscountedPrice()
    {
        return $this->discountedPrice;
    }

    public function setDiscoutedPrice($discountedPrice): self
    {
        $this->discountedPrice = $discountedPrice;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
