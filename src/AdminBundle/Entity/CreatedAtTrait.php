<?php

namespace AdminBundle\Entity;

trait CreatedAtTrait
{
    /**
     * @var \DateTime
     */
    private $createdAt;
    
    
    function getCreatedAt() {
        return $this->createdAt;
    }

    function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $createdAt;
    }

}