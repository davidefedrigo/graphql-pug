<?php

namespace App\Controller;

use App\Domain\User;
use App\GraphQL\Context;
use App\GraphQL\Schema;
use App\GraphQL\Type\Book;
use App\GraphQL\Type\Movie;
use GraphQL\Error\Debug;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GraphqlController extends AbstractController
{
    /**
     * @Route("/graphql-inline", name="graphql_minimal")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function inline(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);
            $result = GraphQL::executeQuery($this->getSchema(), $data['query'], null, null, null);
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

    /**
     * @return \GraphQL\Type\Schema
     */
    private function getSchema()
    {
        $movieType = new ObjectType([
            'name' => 'Movie',
            'description' => 'Hi, I\'m a movie',
            'fields' => [
                'id' => Type::nonNull(Type::int()),
                'title' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'Movie title'
                ]
            ]
        ]);

        $queryType = new ObjectType([
            'name' => 'Query',
            'fields' => [
                'randomMovie' => [
                    'type' => $movieType,
                    'description' => 'Just give me a movie for tonight',
                    'resolve' => function () {
                        $movies = [
                            ['id' => 1, 'title' => 'Back to the Future'],
                            ['id' => 2, 'title' => 'Spider-Man'],
                            ['id' => 3, 'title' => 'Avengers: Endgame'],
                            null
                        ];

                        return $movies[rand(0, 3)];
                    }
                ]
            ],
        ]);

        return new \GraphQL\Type\Schema([
            'query' => $queryType
        ]);
    }

    /**
     * @Route("/graphql", name="graphql")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $variables = isset($data['variables']) ? $data['variables'] : null;

        try {
            $context = new Context(new User());
            $result = GraphQL::executeQuery(new Schema(), $data['query'], null, $context, $variables);
            $debug = Debug::INCLUDE_DEBUG_MESSAGE | Debug::INCLUDE_TRACE;
            $output = $result->toArray($debug);
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
