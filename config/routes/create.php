<?php
//includes Medoo + Slim Framework, and added PHP standard reccomended http Responde and Request Interfaces 
use Medoo\Medoo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

//functions for creating stuff in the DB are Here
return function (App $app) {
    //example route : adds a menu Item with Name as post parameter
    $app->post('/menu/add', function (ServerRequestInterface $request, ResponseInterface $response) {
        $data = $request->getParsedBody(); //gets an Array of all the Values like: parameters
        if ( isset($data['Name'])) { //checks if all the important values are set && other checks also can be implemented here
            $this->get('database')->insert( //Medoo Syntax for the insert of SQL with the value
                'menu',
                [
                    'Name' => $data['Name'],
                ]

            );
            $response->getBody()->write("succes"); //for Testing purposes if the insert was succeful
        } else {
            $response->getBody()->write("im missing smt"); //for Testing purposes if the insert was succeful
        }
        return $response;
    });

};
