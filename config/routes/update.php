<?php
//includes Medoo + Slim Framework, and added PHP standard reccomended http Responde and Request Interfaces 
use Medoo\Medoo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

//all routes to Update are here :D
return function (App $app) {
    //route with the usage updating the name of a menu item as an example
    $app->post('/menu/update', function (ServerRequestInterface $request, ResponseInterface $response) {

        $data = $request->getParsedBody(); //gets an Array of all the Values like: userid message and so on
        if (isset($data['Name']) && isset($data['NameNew']) ) { // validate and check if values set
            $this->get('database')->update(
                'menu',
                [
                    'Name' => $data['NameNew']
                            
                ],
                [
                    'Name' =>$data['Name'] //use Logged in User for Change Name
                ]

            );
            //for Testing: //$response->getBody()->write("succes");
        } else {
            //for testing:
            // $response->getBody()->write("im missing smt");
            //var_dump($data);
        }
        return $response;
    });
    
};
