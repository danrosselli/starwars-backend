<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/people", name="people_rest")
     */
    public function rest()
    {
        //echo 'Olá Mundo!';
        //exit();
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM people;
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAllAssociative();
        
    }
    
    /**
     * @Route("/api/people/{id}", methods={"GET","HEAD"})
     */
    public function show(int $id): Response
    {
        // ... return a JSON response with the persona
        echo 'Show People!';
        exit();
    }

    /**
     * @Route("/api/people/{id}", methods={"PUT"})
     */
    public function edit(int $id): Response
    {
        // ... edit a persona
        // ... return a JSON response with the persona
        echo 'Edit Persona!';
        exit();
    }
    
    
}

?>
