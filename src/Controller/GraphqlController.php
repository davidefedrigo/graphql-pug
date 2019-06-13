<?php

namespace App\Controller;

use App\GraphQL\Type\Reservation;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GraphqlController extends AbstractController
{
    /**
     * @Route("/graphql", name="graphql")
     */
    public function index()
    {
        $query = "query {
  echo(message: \"Hello World\")
  reservations{id}
}";

        $variableValues = null;

        $queryType = new ObjectType([
            'name' => 'Query',
            'fields' => [
                'echo' => [
                    'type' => Type::string(),
                    'args' => [
                        'message' => Type::nonNull(Type::string()),
                    ],
                    'resolve' => function ($root, $args) {
                        return $root['prefix'] . $args['message'];
                    }
                ],
                'reservations' => [
                    'type' => Type::listOf(new Reservation()),
                    'resolve' => function($a) {
                        return [
                            [
                                'id' => 1
                            ],
                            [
                                'id' => 2
                            ]
                        ];
                    }
                ]
            ],
        ]);

        $schema = new Schema([
            'query' => $queryType
        ]);

        try {
            $rootValue = ['prefix' => 'You said: '];
            $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
            $output = $result->toArray();
        } catch (\Exception $e) {
            $output = [
                'errors' => [
                    [
                        'message' => $e->getMessage()
                    ]
                ]
            ];
        }


        return $this->json($output);
    }
}
