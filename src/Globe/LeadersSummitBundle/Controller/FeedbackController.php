<?php

namespace Globe\LeadersSummitBundle\Controller;

use Globe\LeadersSummitBundle\Entity\Feedback;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Feedback controller.
 *
 */
class FeedbackController extends Controller
{
    /**
     * Lists all feedback entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $feedbacks = $em->getRepository('LSBundle:Feedback')->findAll();

        return $this->render('LSBundle:Feedback:index.html.twig', array(
            'feedbacks' => $feedbacks,
        ));
    }

    /**
     * Creates a new feedback entity.
     *
     */
    public function newAction(Request $request)
    {
        $feedback = new Feedback();
        $form = $this->createForm('Globe\LeadersSummitBundle\Form\FeedbackType', $feedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $feedback->setCreatedAt(new \DateTime());
            $feedback->setCreatedBy($this->getUser());
            $em->persist($feedback);
            $em->flush($feedback);

            return $this->redirectToRoute('feedback_index');
        }

        return $this->render('LSBundle:Feedback:new.html.twig', array(
            'feedback' => $feedback,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a feedback entity.
     *
     */
    public function showAction(Feedback $feedback)
    {
        $deleteForm = $this->createDeleteForm($feedback);

        return $this->render('LSBundle:Feedback:show.html.twig', array(
            'feedback' => $feedback,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing feedback entity.
     *
     */
    public function editAction(Request $request, Feedback $feedback)
    {
        $deleteForm = $this->createDeleteForm($feedback);
        $editForm = $this->createForm('Globe\LeadersSummitBundle\Form\FeedbackType', $feedback);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $feedback->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('feedback_index', array('id' => $feedback->getId()));
        }

        return $this->render('LSBundle:Feedback:edit.html.twig', array(
            'feedback' => $feedback,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a feedback entity.
     *
     */
    public function deleteAction(Request $request, Feedback $feedback)
    {
        $form = $this->createDeleteForm($feedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $feedback->setDeletedAt(new \DateTime());
            //$em->remove($feedback);
            $em->flush($feedback);
        }

        return $this->redirectToRoute('feedback_index');
    }

    /**
     * Creates a form to delete a feedback entity.
     *
     * @param Feedback $feedback The feedback entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Feedback $feedback)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('feedback_delete', array('id' => $feedback->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
