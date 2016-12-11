<?php

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\User\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;


class LoadUserData implements FixtureInterface
{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $typeObjects = Fixtures::load(__DIR__.'\..\..\Resources\fixtures\orm\user\user.yml', $manager);
    }
}