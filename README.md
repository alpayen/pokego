pokemon-go
==========

Faire un composer update

Créer une base de donnée config dans App/config/parameter.yml
bin/console doctrine:database:create
bin/console doctrine:schema:update --force

Pour mettre a jour les fixtures:

bin/console doctrine:fixtures:load

si vous n'etes pas en php 7 mettre dans le composer.json alice en version 2.1 et mettre ce code dans le LoadPokemonData

*** Export PHP ***
*******************
```<?php

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\User\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;


/**
 * Created by PhpStorm.
 * User: shuwen
 * Date: 30/11/2016
 * Time: 15:51
 */
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
```

faire un ``` bin/console doctrine:generate:entities AppBundle:User/User
 ```
### pour lancer lappli
bin/console server:run
ou
bin/console server:start

# Exo
Coder une fixture d’un user


Faire un call api/find qui créer un pokemon avec des stats random et le lier avec votre user.
Faire un call capture avec l’id du userPokemonStats comme paramètre, ce call essaiera de capturer le pokemon (attention il manque quelque chose dans l’entité userPokemonStats pour savoir si le pokemon est capturé ou non)
Faire un call /pokedex pour savoir tous les pokemons que vous possédez
# pokego
# pokegocheat
