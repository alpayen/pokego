<?php

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\User\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;


class LoadPokemonData implements FixtureInterface
{

/**
* Load data fixtures with the passed EntityManager
*
* @param ObjectManager $manager
*/
public function load(ObjectManager $manager)
{
$typeObjects = Fixtures::load(__DIR__.'\..\..\Resources\fixtures\orm\pokemon\type.yml', $manager);
$typeObjects = Fixtures::load(__DIR__.'\..\..\Resources\fixtures\orm\pokemon\pokemon.yml', $manager);
}
}