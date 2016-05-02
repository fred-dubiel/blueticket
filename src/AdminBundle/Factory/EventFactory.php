<?php
namespace AdminBundle\Factory;

use \AdminBundle\Entity\Event;

class EventFactory {
    
    public function createEvent(array $data, $obj = null) {
        $event = $obj?:new Event();
        
        $event->setName($data["name"]);
        $event->setDescription($data["description"]);
        $event->setOccursAt(
                \DateTime::createFromFormat('d/m/Y H:i:s', $data["occursAt"])
                );
        $event->setCreatedAt(new \DateTime());
        $event->setUpdatedAt(new \DateTime());
        return $event;        
    }
}
