<?php

namespace AdminBundle\Entity;

trait IdTrait
{
    /**
     * @var int
     */
    private $id;
    
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

}