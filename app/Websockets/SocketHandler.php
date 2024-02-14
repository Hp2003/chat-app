<?php
namespace App\Websockets;

use BeyondCode\LaravelWebSockets\WebSockets\WebSocketHandler;
use Ratchet\WebSocket\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use BeyondCode\LaravelWebSockets\Apps\App;
use BeyondCode\LaravelWebSockets\QueryParameters;
use BeyondCode\LaravelWebSockets\WebSockets\Exceptions\UnknownAppKey;
use Illuminate\Support\Facades\Auth;

abstract class SocketHandler implements MessageComponentInterface
{
    public function onOpen(ConnectionInterface $connection)
    {
        $this
            ->verifyAppKey($connection)
            ->generateSocketId($connection)
            ->validateRequest($connection);
    }

    public function onClose(ConnectionInterface $connection)
    {
        dump('close');
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        dump('error');
    }

    protected function verifyAppKey(ConnectionInterface $connection)
    {
        $appKey = QueryParameters::create($connection->httpRequest)->get('appKey');

        if (! $app = App::findByKey($appKey)) {
            throw new UnknownAppKey($appKey);
        }

        $connection->app = $app;

        return $this;
    }

    protected function generateSocketId(ConnectionInterface $connection)
    {
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));

        $connection->socketId = $socketId;

        return $this;
    }

    protected function validateRequest(ConnectionInterface $connection)
    {
        $secretToken = QueryParameters::create($connection->httpRequest)->get('secret_token');
        dump(session()->get('RkSjR2WqQCJQLOTZsWuiQAfC5HR6Se5HWhgoXcKV'));
        if(!$secretToken === session('secret_token')){
            $connection->close(403);
            return;
        }
    }
}
