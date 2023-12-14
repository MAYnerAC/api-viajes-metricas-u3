<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
//
use Prometheus\CollectorRegistry;
use Prometheus\Storage\InMemory;
//
use Prometheus\Storage\Redis;
//use Illuminate\Support\Facades\Redis;
// USE PARA RABBIT
use Illuminate\Support\Facades\Log;

/* use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage; */

class PrometheusMetricsMiddleware
{
    private $collectorRegistry;

    public function __construct()
    {
        // Adaptador de almacenamiento en memoria:
        //$this->collectorRegistry = new CollectorRegistry(new InMemory());

        // Adaptador de almacenamiento persistente(Redis):
        $this->collectorRegistry = new CollectorRegistry(new Redis(['host' => 'redis-metricas', 'port' => 6379,])); // 'password' => '123',

    }

    /* public static function sendRabbit($method, $endpoint, $message) {
        try {
            // Configuración de conexión a RabbitMQ
            $connection = new AMQPStreamConnection('161.132.37.246', 5672, 'guest', 'guest');
            $channel = $connection->channel();
        
            // Publicar un mensaje en la cola
            $channel->queue_declare('cola1', false, true, false, false);
            
            $msg = new AMQPMessage($message);
            $channel->basic_publish($msg, '', $endpoint);
        
            // Cerrar conexión y canal al finalizar
            $channel->close();
            $connection->close();
        } catch (\Exception $e) {
            Log::error('Error al enviar mensaje a RabbitMQ: ' . $e->getMessage());
        }
    } */

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);

        $response = $next($request);

        $latency = microtime(true) - $start;
        $status = $response->getStatusCode();
        $method = $request->method();
        $endpoint = $request->path();

        /* Log::info('SE ENVIO REGISTRO A RABBIT');
        self::sendRabbit('POST', '/endpoint', 'Hola, mundo desde RabbitMQ!'); */

        // Buckets Personalizados
        $buckets = [0.001, 0.005, 0.01, 0.025, 0.05, 0.075, 0.1, 0.25, 0.5, 1.0, 2.0, 5.0];

        // Contador de respuestas HTTP
        $counter = $this->collectorRegistry->getOrRegisterCounter('api', 'http_responses', 'HTTP Responses', ['method', 'endpoint', 'status']);
        $counter->inc([$method, $endpoint, strval($status)]);

        // Histograma de latencias
        $histogram = $this->collectorRegistry->getOrRegisterHistogram('api', 'request_latency', 'Request latency', ['method', 'endpoint'], $buckets);
        $histogram->observe($latency, [$method, $endpoint]);

        return $response;
    }
    
}
