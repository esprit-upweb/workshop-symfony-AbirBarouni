<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    /**
     * @Route("/listStudent", name="studentList")
     */
    public function listStudent()
    {
        $students=$this->getDoctrine()->getRepository(Student::class)->findAll(); # tableau dynmaique
        return $this->render("Student/list.html.twig",array("tabStudent"=>$students));

    }
    /**
     * @Route("/deleteStudent/{id}", name="studentDelete")
     */
public function deleteStudent($id)
{
    $student=$this->getDoctrine()->
    getRepository(Student::class)->find($id);
    $em=$this->getDoctrine()->getManager();
    $em->remove($student);
    $em->flush();
    return $this->redirectToRoute("studentList");

}
    #comm
    #remove tkoul rani andi ma nfasakh
    #l fct flash ma tfasakh shy taamel coté maj de la bd

}
