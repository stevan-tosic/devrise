<?php

namespace AppBundle\Service;

use AppBundle\Entity\Visitors;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class CommonService {

    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

}