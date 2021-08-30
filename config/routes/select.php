<?php
//includes Medoo + Slim Framework, and added PHP standard reccomended http Responde and Request Interfaces 
use Medoo\Medoo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;


//all the Select routes are here
//TODO: might have to add some :(
return function (App $app) {
    //routing to get all menu items example
    $app->get('/menu', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
        $data = $this->get('database')->select( //medoo syntax to get all messages with value
            'menu',
            [
                'ItemID',
                'Name'
            ]
        );
        $response->getBody()->write(json_encode($data));
        return $response;
    });

//

};
