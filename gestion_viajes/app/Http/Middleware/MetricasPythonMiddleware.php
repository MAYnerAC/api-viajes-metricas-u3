<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class MetricasPythonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true); // Inicia el temporizador

        $response = $next($request); // Procesa la solicitud y obtiene la respuesta

        $latency = microtime(true) - $start; // Calcula la latencia

        // Prepara los datos a enviar
        $httpData = [
            'method' => $request->method(),
            'endpoint' => $request->path(),
            'status' => $response->getStatusCode(),
            'latency' => $latency,
        ];

        // Instancia el cliente Guzzle
        $client = new Client();

        // Intenta enviar los datos a FastAPI
        try {
            $client->post('http://metricu2.sytes.net:5000/metrics', [
                'json' => $httpData
            ]);
        } catch (GuzzleException $e) {
            // Fallo
        }

        return $response; // Retorna la respuesta
    }
}
