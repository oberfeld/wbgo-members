<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Eigenschaft;
use AppBundle\Form\EigenschaftType;

/**
 * Eigenschaft controller.
 *
 * @Route("/eigenschaft")
 */
class EigenschaftController extends Controller
{
    /**
     * Lists all Eigenschaft entities.
     *
     * @Route("/", name="eigenschaft_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eigenschafts = $em->getRepository('AppBundle:Eigenschaft')->findAll();

        return $this->render('eigenschaft/index.html.twig', array(
            'eigenschafts' => $eigenschafts,
        ));
    }

    /**
     * Creates a new Eigenschaft entity.
     *
     * @Route("/new", name="eigenschaft_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $eigenschaft = new Eigenschaft();
        $form = $this->createForm('AppBundle\Form\EigenschaftType', $eigenschaft);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eigenschaft);
            $em->flush();

            return $this->redirectToRoute('eigenschaft_show', array('id' => $eigenschaft->getId()));
        }

        return $this->render('eigenschaft/new.html.twig', array(
            'eigenschaft' => $eigenschaft,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Eigenschaft entity.
     *
     * @Route("/{id}", name="eigenschaft_show")
     * @Method("GET")
     */
    public function showAction(Eigenschaft $eigenschaft)
    {
        $deleteForm = $this->createDeleteForm($eigenschaft);

        return $this->render('eigenschaft/show.html.twig', array(
            'eigenschaft' => $eigenschaft,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Eigenschaft entity.
     *
     * @Route("/{id}/edit", name="eigenschaft_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Eigenschaft $eigenschaft)
    {
        $deleteForm = $this->createDeleteForm($eigenschaft);
        $editForm = $this->createForm('AppBundle\Form\EigenschaftType', $eigenschaft);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eigenschaft);
            $em->flush();

            return $this->redirectToRoute('eigenschaft_edit', array('id' => $eigenschaft->getId()));
        }

        return $this->render('eigenschaft/edit.html.twig', array(
            'eigenschaft' => $eigenschaft,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Eigenschaft entity.
     *
     * @Route("/{id}", name="eigenschaft_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Eigenschaft $eigenschaft)
    {
        $form = $this->createDeleteForm($eigenschaft);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eigenschaft);
            $em->flush();
        }

        return $this->redirectToRoute('eigenschaft_index');
    }

    /**
     * Creates a form to delete a Eigenschaft entity.
     *
     * @param Eigenschaft $eigenschaft The Eigenschaft entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Eigenschaft $eigenschaft)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eigenschaft_delete', array('id' => $eigenschaft->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
