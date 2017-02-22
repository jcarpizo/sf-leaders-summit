<?php

namespace Globe\LeadersSummitBundle\Controller;

use Globe\LeadersSummitBundle\Entity\Participant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Participant controller.
 *
 */
class ParticipantController extends Controller
{
    /**
     * Lists all participant entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $participants = $em->getRepository('LSBundle:Participant')->findBy([
            'deletedAt' => null
        ]);

        return $this->render('LSBundle:Participant:index.html.twig', array(
            'participants' => $participants,
        ));
    }

    /**
     * Creates a new participant entity.
     *
     */
    public function newAction(Request $request)
    {
        $participant = new Participant();
        $form = $this->createForm('Globe\LeadersSummitBundle\Form\ParticipantType', $participant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $participant->setCreatedAt(new \DateTime());
            $participant->setCreatedBy($this->getUser());
            $em->persist($participant);
            $em->flush($participant);

            //return $this->redirectToRoute('participant_show', array('id' => $participant->getId()));
            return $this->redirectToRoute('participant_index');
        }

        return $this->render('LSBundle:Participant:new.html.twig', array(
            'participant' => $participant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a participant entity.
     *
     */
    public function showAction(Participant $participant)
    {
        $deleteForm = $this->createDeleteForm($participant);

        return $this->render('LSBundle:Participant:show.html.twig', array(
            'participant' => $participant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing participant entity.
     *
     */
    public function editAction(Request $request, Participant $participant)
    {
        $deleteForm = $this->createDeleteForm($participant);
        $editForm = $this->createForm('Globe\LeadersSummitBundle\Form\ParticipantType', $participant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $participant->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            //return $this->redirectToRoute('participant_edit', array('id' => $participant->getId()));
            return $this->redirectToRoute('participant_index');
        }

        return $this->render('LSBundle:Participant:edit.html.twig', array(
            'participant' => $participant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a participant entity.
     *
     */
    public function deleteAction(Request $request, Participant $participant)
    {
        $form = $this->createDeleteForm($participant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //$em->remove($participant);
            $participant->setDeletedAt(new \DateTime());
            $em->flush($participant);
        }

        return $this->redirectToRoute('participant_index');
    }

    /**
     * Creates a form to delete a participant entity.
     *
     * @param Participant $participant The participant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Participant $participant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('participant_delete', array('id' => $participant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
