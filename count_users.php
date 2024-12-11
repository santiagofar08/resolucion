<?php
session_start();

// Guardar la sesión del usuario actual en un archivo temporal
$file = 'active_sessions.txt';

// Leer todas las sesiones activas desde el archivo
$sessions = file_exists($file) ? file($file, FILE_IGNORE_NEW_LINES) : [];

// Obtener el ID de sesión actual
$currentSessionId = session_id();

// Verificar si la sesión actual ya está almacenada
if (!in_array($currentSessionId, $sessions)) {
    $sessions[] = $currentSessionId;
    file_put_contents($file, implode(PHP_EOL, $sessions));
}

// Limpiar sesiones inactivas (simulación básica)
// Nota: Este es un enfoque simplificado, en producción podrías necesitar una forma más avanzada de limpiar las sesiones
$valid_sessions = [];
foreach ($sessions as $session) {
    if (session_id() !== $session) {
        $valid_sessions[] = $session;
    }
}
file_put_contents($file, implode(PHP_EOL, $valid_sessions));

// Enviar el número de usuarios conectados al cliente
echo count($valid_sessions);
?>
