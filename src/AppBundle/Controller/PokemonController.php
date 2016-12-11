<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PokemonController extends Controller
{

    /**
     * @Route("/find/{id}", name="find")
     */
     public function findPokemon($id)
     {
         $pokemonBehavior = $this->get('behavior.pokemon');
         $rndPoke = $pokemonBehavior->createRandomPokemon($id);

         $em = $this->getDoctrine()->getManager();
         $em->persist($rndPoke);
         $em->flush();

         $encoders = array(new JsonEncoder());
         $normalizers = array(new ObjectNormalizer());

         $serializer = new Serializer($normalizers, $encoders);

         $json = $serializer->serialize($rndPoke, 'json');

         return new JsonResponse($json, 200, [], true);
     }


    /**
     * @Route("/capture/{id}", name="capture")
     */
    public function capturePokemon($id)
    {
        $em = $this->getDoctrine()->getManager();
        $pokemonToCatch = $em->getRepository('AppBundle:Pokemon\UserPokemonStats')->find($id);


        if(!$pokemonToCatch){
            $answer = 'no pokemon 404';

        }else{


            $chance = rand(0, 100);
            var_dump($chance);
            if($chance >30){
                $pokemonToCatch->setCatched(true);
                $em->flush();
                $answer = 'the pokemon was caught';
            }else{
                $answer = 'the pokemon escaped';
            }
        }

        return new Response($answer);
    }
    /**
     * @Route("/pokedex/{id}", name="pokedex")
     */
    public function getUserPokedex($id)
    {
        $em = $this->getDoctrine()->getManager();
        $catchedPokemon = $em->getRepository('AppBundle:Pokemon\UserPokemonStats')
            ->findBy(
                array('user' => $id, 'catched' => 1)
            )
        ;

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $json = $serializer->serialize($catchedPokemon, 'json');
        return new JsonResponse($json, 200, [], true);

    }

}
