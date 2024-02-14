<?php
namespace App\Websockets;

use App\Websockets\SocketHandler;
use Ratchet\WebSocket\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;

class SendMessageSocketHandler extends SocketHandler implements MessageComponentInterface
{

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        // dump(auth()->check());
    }
}
