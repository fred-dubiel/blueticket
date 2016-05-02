<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AdminBundle\Repository\EventTypeRepository;
//use AdminBundle\Entity\EventType;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ["label" => "Nome"])
            ->add('occursAt', null, ["label" => "Data do evento"])
            ->add('description', null, ["label" => "Descrição"])
            ->add("maximumCapacity", null, ["label" => "Capacidade do evento"])
            ->add("eventType", null, [
                'choices' => [
                    "Balada" => 1,
                    ],
                'choices_as_values' => true,
                'choice_label' => 'displayName'
                );
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Event'
        ));
    }
    
    //@TODO Refactor!! This method belongs to another resposability
    private function getArrayOfEntities()
    {
        /**
         * @var $repository EventTypeRepository
         */
        $repository = $this->getem->getRepository('AdminBundle:EventType');
        $eventTypes = $repository->findAll();
        $list = array();
        
        /**
         * @var $eventType EventType
         */
        foreach ($eventTypes as $eventType) {
            $list[] = $eventType;            
        }
        
        return $list;
    } 
}
