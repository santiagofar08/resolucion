<?php
require 'vendor/autoload.php'; // Cargar las dependencias de Ratchet

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ActiveUsers implements MessageComponentInterface {
    protected $clients;
    protected $users;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->users = [];
    }

    public function onOpen(ConnectionInterface $conn) {
        // Agregar nueva conexión
        $this->clients->attach($conn);
        $this->users[$conn->resourceId] = true;
        $this->notifyActiveUsers();
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Aquí podrías manejar mensajes entre clientes si lo deseas.
    }

    public function onClose(ConnectionInterface $conn) {
        // Quitar la conexión cuando un usuario se desconecte
        $this->clients->detach($conn);
        unset($this->users[$conn->resourceId]);
        $this->notifyActiveUsers();
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
    }

    private function notifyActiveUsers() {
        $activeUsers = count($this->users);

        foreach ($this->clients as $client) {
            $client->send(json_encode(['activeUsers' => $activeUsers]));
        }
    }
}

// Crear una instancia de Ratchet\App sin usar 'factory()'
$server = new Ratchet\App('localhost', 8080); // 'localhost' y el puerto 8080
$server->route('/users', new ActiveUsers, ['*']);
$server->run();
