<?php
//includes Medoo + Slim Framework, and added PHP standard reccomended http Responde and Request Interfaces 
use Medoo\Medoo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

//functions for creating stuff in the DB are Here
return function (App $app) {
    //TODO: maybe this needs to be adjusted but i dont think so, have to Test
    //adds a message to the table and adds the corresponding User whom sent the message
    $app->post('/menu/add', function (ServerRequestInterface $request, ResponseInterface $response) {
        // Testing with curl:   curl -X POST -F 'userid=1' -F 'message=Hallo Welt' 'http://10.80.4.43/messages/add'
        $data = $request->getParsedBody(); //gets an Array of all the Values like: userid message and so on
        if ( isset($data['Name'])) { //checks if all the important values are set
            $this->get('database')->insert( //Medoo Syntax for the insert of SQL with the two values we tested and the time at the Moment
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
