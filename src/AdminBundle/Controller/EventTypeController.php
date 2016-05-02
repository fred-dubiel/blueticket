<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\EventType;
use AdminBundle\Form\EventTypeType;

/**
 * EventType controller.
 *
 */
class EventTypeController extends Controller
{
    /**
     * Lists all EventType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eventTypes = $em->getRepository('AdminBundle:EventType')->findAll();

        return $this->render('eventtype/index.html.twig', array(
            'eventTypes' => $eventTypes,
        ));
    }

    /**
     * Creates a new EventType entity.
     *
     */
    public function newAction(Request $request)
    {
        $eventType = new EventType();
        $form = $this->createForm('AdminBundle\Form\EventTypeType', $eventType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eventType);
            $em->flush();

            return $this->redirectToRoute('eventtype_show', array('id' => $eventType->getId()));
        }

        return $this->render('eventtype/new.html.twig', array(
            'eventType' => $eventType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EventType entity.
     *
     */
    public function showAction(EventType $eventType)
    {
        $deleteForm = $this->createDeleteForm($eventType);

        return $this->render('eventtype/show.html.twig', array(
            'eventType' => $eventType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EventType entity.
     *
     */
    public function editAction(Request $request, EventType $eventType)
    {
        $deleteForm = $this->createDeleteForm($eventType);
        $editForm = $this->createForm('AdminBundle\Form\EventTypeType', $eventType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eventType);
            $em->flush();

            return $this->redirectToRoute('eventtype_edit', array('id' => $eventType->getId()));
        }

        return $this->render('eventtype/edit.html.twig', array(
            'eventType' => $eventType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a EventType entity.
     *
     */
    public function deleteAction(Request $request, EventType $eventType)
    {
        $form = $this->createDeleteForm($eventType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eventType);
            $em->flush();
        }

        return $this->redirectToRoute('eventtype_index');
    }

    /**
     * Creates a form to delete a EventType entity.
     *
     * @param EventType $eventType The EventType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EventType $eventType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eventtype_delete', array('id' => $eventType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
