<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\RabbitMQService;
use Carbon\Carbon;

class LogHttpRequests
{
    protected $rabbitMQService;

    public function __construct(RabbitMQService $rabbitMQService)
    {
        $this->rabbitMQService = $rabbitMQService;
    }

    public function handle(Request $request, Closure $next)
    {
        Log::info('Middleware LogHttpRequests está ejecutándose...');
        $fechaHoraActual = Carbon::now();
        $formatoPersonalizado = 'Y-m-d H:i:s';
        $fechaHoraFormateada = $fechaHoraActual->format($formatoPersonalizado);

        $logData = [
            'date' => $fechaHoraFormateada,
            'event' => $request->method(),
            'text' => $request->path(),
        ];
        try {
            $this->rabbitMQService->sendMessage('cola1', json_encode($logData));
        } catch (\Exception $e) {
            Log::error('Error al enviar el mensaje a RabbitMQ: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
        }

        return $next($request);
    }
}
