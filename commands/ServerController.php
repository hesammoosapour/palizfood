<?php
namespace app\commands;

use app\classes\EchoServer;
use yii\console\Controller;
use consik\yii2websocket\WebSocketServer;

class ServerController extends Controller
{
    public function actionStart()
    {
        $server = new WebSocketServer();
        $server->port = 80; //This port must be busy by WebServer and we handle an error

        $server->on(WebSocketServer::EVENT_WEBSOCKET_OPEN_ERROR, function($e) use($server) {
            echo "Error opening port " . $server->port . "\n";
            $server->port += 1; //Try next port to open
            $server->start();
        });

        $server->on(WebSocketServer::EVENT_WEBSOCKET_OPEN, function($e) use($server) {
            echo "Server started at port " . $server->port;
        });

        $server->start();
    }
}

?>

