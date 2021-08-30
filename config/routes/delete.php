<?php
//includes Medoo + Slim Framework, and added PHP standard reccomended http Responde and Request Interfaces 
use Medoo\Medoo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;


//functions for deleting stuff in the DB are Here
return function (App $app) {

    //deleteing an menu item with name example
    $app->get('/menu/delete/{Name}', function (ServerRequestInterface $request, ResponseInterface $response, array $args) { //takes a parameter for deleting with {}

        $Name = $args['Name']; // to get the argument from the GET which is named Name
        if ( isset($Name)) { //checks the parameter
        $this->get('database')->delete("menu",  //medoo Syntax with paramter as values
             [
                'Name' => $Name,
             ]);

            $response->getBody()->write("user has been deleted"); //for testing
            return $response;
            }
    });
    
};
