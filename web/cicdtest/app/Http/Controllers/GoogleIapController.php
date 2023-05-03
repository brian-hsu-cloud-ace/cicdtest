<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Google\Auth\ApplicationDefaultCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class GoogleIapController extends Controller
{
    protected $Commands;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
#    public function __construct()
#    {
#        $this->Commands = new sslExpiredDay();
#    }

    public function __invoke()
    {
        // specify the path to your application credentials
        putenv("GOOGLE_APPLICATION_CREDENTIALS=/var/www/cicdtest/storage/app/keyfile/iap/iap.json");
        // define the scopes for your API call
#        printf(shell_exec('pwd'));
#        exit;
        $scopes = ['https://www.googleapis.com/auth/drive.readonly'];

        // create middleware
        $middleware = ApplicationDefaultCredentials::getMiddleware($scopes);
        $stack = HandlerStack::create();
        $stack->push($middleware);
        // create the HTTP client
        $client = new Client
        ([
            'handler' => $stack,
            'base_uri' => 'https://www.googleapis.com',
            'auth' => 'google_auth'  // authorize all requests
        ]);

        // make the request
        $response = $client->get('/');

        // show the result!
        print_r((string) $response->getBody());
    }
}
