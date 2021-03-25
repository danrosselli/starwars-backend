<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\People;
use App\Repository\PeopleRepository;
use Doctrine\ORM\EntityManagerInterface;


class PeopleController extends AbstractController
{
    
    private $peopleRepository;
    
    public function __construct(PeopleRepository $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }
	
	/**
     * @Route("/people", name="people", methods={"GET"})
     */
    public function index(): Response
    {
		$repository = $this->getDoctrine()->getRepository(People::class);
        
        // look for *all* People objects
		$peoples = $repository->findAll();
		
		// fill array
        $array = [];
        foreach($peoples as $people) {
			$array[] = $people->getDoc();
		}
        
        return $this->json($array);
        
    }
    
	/**
     * @Route("/people/{id}", name="getone_people", methods={"GET"})
     */
    public function getOne($id): Response
    {
        return $this->json([
            'message' => 'Not implemented yet!',
            'path' => 'src/Controller/PeopleController.php',
        ]);
        
        
    }
    
    /**
     * @Route("/people", name="update_people", methods={"PUT", "POST"})
     */
    public function put(Request $request): Response
    {	
		
		
		$data = json_decode($request->getContent(), true);
        
        // return object of class People
		$people = $this->peopleRepository->findByIdx((int)$data["id"]);
		if (empty($people)) {
			
			// create new people row in database
			$people = new People();
			$people->setIdx((int)$data["id"]);
			$people->setDoc($data);
			
		} else {
			
			// update people row in database
			$people->setDoc($data);
		}

		$this->peopleRepository->update($people);
		
        return $this->json($data);
    }
    
    /**
     * @Route("/people/{id}", name="delete_people", methods={"DELETE"})
     */
    public function delete($id): Response
    {
        
        $people = $this->peopleRepository->findByIdx((int)$id);
        
        $message = 'Row ' . $id . ' not exist'; 
        if (!empty($people)) {
			
			$this->peopleRepository->remove($people);
			$message = 'Row ' . $id . ' removed'; 
		}
        
        return $this->json([
            'message' => $message,
            'path' => 'src/Controller/PeopleController.php',
        ]);
    }
    
}
