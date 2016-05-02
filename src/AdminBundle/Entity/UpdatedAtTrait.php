<?php

namespace AdminBundle\Entity;

trait UpdatedAtTrait
{
    /**
     * @var \DateTime
     */
    private $updatedAt;
    
    function getUpdatedAt() {
        return $this->updatedAt;
    }
    
    function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
    }
}