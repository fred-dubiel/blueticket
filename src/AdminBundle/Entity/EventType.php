<?php

namespace AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * EventType
 */
class EventType
{
    use IdTrait;
   
    /**
     * @var string
     */
    private $name;
    
    /**
     *
     * @var ArrayCollection
     */
    private $events;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return EventType
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
    
    public function getEvents() {
        return $this->events;
    }
    
    public function addEvents(Event $event)
    {
        $this->events->add($event);
    }
    
    public function removeEvents(Event $event)
    {
        $this->events->removeElement($event);
    }
    
    public function setEvents(ArrayCollection $events) {
        $this->events = $events;
    }


}

