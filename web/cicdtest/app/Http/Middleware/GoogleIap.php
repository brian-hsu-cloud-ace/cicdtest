<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

use Google\Auth\ApplicationDefaultCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class GoogleIap
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    /**
     * Make a request to an application protected by Identity-Aware Proxy.
     *
     * @param string $url The Identity-Aware Proxy-protected URL to fetch.
     * @param string $clientId The client ID used by Identity-Aware Proxy.
     */
    public function handle(Request $request, Closure $next): Response
    {
        #dd(Storage::get('keyfile/iap/client_secret_2_904092944562-htndbps0tod6qih91d7b2lmhuo10uk8l.apps.googleusercontent.com.json'));
        $clientId = "904092944562-htndbps0tod6qih91d7b2lmhuo10uk8l.apps.googleusercontent.com";
        // create middleware, using the client ID as the target audience for IAP
        $middleware = ApplicationDefaultCredentials::getIdTokenMiddleware($clientId);

        $stack = HandlerStack::create();
        $stack->push($middleware);

        // create the HTTP client
        $client = new Client([
            'handler' => $stack,
            'auth' => 'google_auth'
        ]);
        dd($middleware);
        // make the request
        $response = $client->get($url);
        print('Printing out response body:');
        print($response->getBody());
        return $next($request);
    }
}
