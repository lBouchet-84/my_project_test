<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiscountRuleRepository")
 */
class DiscountRule
{
    
    const RULE_MORE = ">"; 
    const RULE_MORE_OR_EQUAL = ">="; 
    const RULE_LOWER= "<"; 
    const RULE_LOWER_OR_EQUAL = "<="; 
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ruleExpression;

    /**
     * @ORM\Column(type="integer")
     */
    private $discountPercent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priceLimit;
    
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRuleExpression(): ?string
    {
        return $this->ruleExpression;
    }

    public function setRuleExpression(string $ruleExpression): self
    {
        $this->ruleExpression = $ruleExpression;

        return $this;
    }

    public function getDiscountPercent(): ?int
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(int $discountPercent): self
    {
        $this->discountPercent = $discountPercent;

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

    public function getPriceLimit(): ?int
    {
        return $this->priceLimit;
    }

    public function setPriceLimit(?int $priceLimit): self
    {
        $this->priceLimit = $priceLimit;

        return $this;
    }
}
