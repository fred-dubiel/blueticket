<?php

namespace AdminBundle\Entity;

use AdminBundle\Entity\Exception\InvalidDate;
use AdminBundle\Entity\Exception\InvalidCapacity;

class Event
{
    use IdTrait;
    use CreatedAtTrait;
    use UpdatedAtTrait;
    
    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $occursAt;

    /**
     * @var string
     */
    private $description;
    
    /**
     *
     * @var int
     */
    private $maximumCapacity;
    
    /**
     * @var EventType
     */
    private $eventType;
    
    /**
     * Set name
     *
     * @param string $name
     *
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set occursAt
     *
     * @param \DateTime $occursAt
     *
     * @return Event
     */
    public function setOccursAt($occursAt)
    {
        if ($occursAt <= new \DateTime()) {
            throw new InvalidDate("A data deve ser futura");
        }
        
        $this->occursAt = $occursAt;

        return $this;
    }

    /**
     * Get occursAt
     *
     * @return \DateTime
     */
    public function getOccursAt()
    {
        return $this->occursAt;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
        
    public function getMaximumCapacity() {
        return $this->maximumCapacity;
    }

    public function setMaximumCapacity($maximumCapacity) {
        if ($maximumCapacity < 1) {
            throw new InvalidCapacity("A quantidade deve ser maior que 0");
        }
        $this->maximumCapacity = $maximumCapacity;
    }
    
    public function getEventType() {
        return $this->eventType;
    }

    public function setEventType(EventType $eventType) {
        $this->eventType = $eventType;
    }


}




