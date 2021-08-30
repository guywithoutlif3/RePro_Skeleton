<?php
//includes Medoo + Slim Framework, and added PHP standard reccomended http Responde and Request Interfaces 
use Medoo\Medoo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;


//all the Select routes are here
//TODO: might have to add some :(
return function (App $app) {
    //routing to get all messages sent to clicked user from Logged in User
    $app->get('/menu', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
        // $session =  new \SlimSession\Helper();
        // $userid = $session->get("user");
        // $recieverID = $args['recieverID'];
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
