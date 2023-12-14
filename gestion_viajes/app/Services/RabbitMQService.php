<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Illuminate\Support\Facades\Log;

class RabbitMQService
{
    protected $connection;

    public function __construct()
    {
        try {
            $this->connection = new AMQPStreamConnection(
                env('RABBITMQ_HOST'),
                env('RABBITMQ_PORT'),
                env('RABBITMQ_USERNAME'),
                env('RABBITMQ_PASSWORD'),
                env('RABBITMQ_VHOST')
            );
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getCode());
        }
    }

    public function sendMessage($queueName, $message)
    {
        try {
            $channel = $this->connection->channel();

            $channel->queue_declare($queueName, false, true, false, false);

            $msg = new AMQPMessage($message);

            $channel->basic_publish($msg, '', $queueName);

            $channel->close();
            $this->connection->close();

            Log::info('Datos enviados a RabbitMQ correctamente.');
        } catch (\Exception $exception) {
            Log::error('Error al enviar datos a RabbitMQ: ' . $exception->getMessage());
        }
    }
}
