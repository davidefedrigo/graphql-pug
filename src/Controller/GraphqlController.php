<?php

namespace App\Controller;

use App\GraphQL\Schema;
use App\GraphQL\Type\Book;
use App\GraphQL\Type\Movie;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GraphqlController extends AbstractController
{
    /**
     * @Route("/graphql/minimal", name="graphql_minimal")
     */
    public function minimal()
    {
        $query = "query {
            randomMovieTitle
        }";

        $variableValues = null;

        $queryType = new ObjectType([
            'name' => 'Query',
            'fields' => [
                'randomMovieTitle' => [
                    'type' => Type::string(),
                    'resolve' => function ($root, $args) {
                        return 'Back to the future';
                    }
                ],
                'movies' => [
                    'type' => Type::listOf(new Movie()),
//                    'args' => [
//                        'title' => Type::nonNull(Type::string()),
//                    ],
                    'resolve' => function($a, $args) {
                        // $args['title']
                        return [
                            [
                                'id' => 1,
                            ],
                            [
                                'id' => 2
                            ]
                        ];
                    }
                ]
            ],
        ]);

        $schema = new \GraphQL\Type\Schema([
            'query' => $queryType
        ]);

        try {
            $rootValue = ['user' => 'user 1'];
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

    /**
     * @Route("/graphql", name="graphql")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(Request $request)
    {
//        $query = "query {
//  me {
//    firstName
//    watchList {
//    id
//    title
//    }
//  }
//  movies{id, title}
//}";
        $data = json_decode($request->getContent(), true);
        $query = $data['query'];
        //var_dump($query);
        //die;
// movies(title: "back"){id}

//        me {
//            watchList {
//                title
//            }
//        }
//        actors
//        movies
//        search() {
//            ... on Movie {
//
//            }
//            ... on Actor {
//
//            }
//            ... on Director {
//
//            }
//    }
//        }

        $variableValues = null;

//        $queryType = new ObjectType([
//            'name' => 'Query',
//            'fields' => [
//                'me' => [
//                    'type' => Type::string(),
//                    'resolve' => function ($root, $args) {
//                        return $root['user'];
//                    }
//                ],
//                'movies' => [
//                    'type' => Type::listOf(new Movie()),
////                    'args' => [
////                        'title' => Type::nonNull(Type::string()),
////                    ],
//                    'resolve' => function($a, $args) {
//                        // $args['title']
//                        return [
//                            [
//                                'id' => 1,
//                            ],
//                            [
//                                'id' => 2
//                            ]
//                        ];
//                    }
//                ]
//            ],
//        ]);

        try {
            $rootValue = ['user_first_name' => 'Davide'];
            $result = GraphQL::executeQuery(new Schema(), $data['query'], $rootValue, null, $variableValues);
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
