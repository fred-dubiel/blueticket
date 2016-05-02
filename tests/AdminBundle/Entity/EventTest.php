<?php
namespace Tests\AdminBundle\Entity;

use PHPUnit_Framework_TestCase;
use \AdminBundle\Entity\Event;

class EventTest extends PHPUnit_Framework_TestCase{
    
    /**
     * @expectedException AdminBundle\Entity\Exception\InvalidDate
     */
    public function testDateOccursInvalid()
    {
        $event = new Event();
        $event->setOccursAt(new \DateTime());
    }
    
    public function testDateOccursValid()
    {
        $event = new Event();
        $event->setOccursAt(new \DateTime("Tomorrow"));
        $this->assertEquals(new \DateTime("Tomorrow"), $event->getOccursAt());        
    }
}
