<?php
// Configuración de la URL del API y el token de autorización
$url = 'https://api.apis.net.pe/v2/sbs/tipo-cambio?date=' . date('Y-m-d');
$token = 'Bearer apis-token-8225.271OeJQ39f9LNNH60xhhSSEstOy6iwTk';

// Inicialización de cURL
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: $token"
    ],
]);

// Ejecución de la solicitud y cierre de la conexión
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo json_encode(['error' => 'Error al conectar con la APIiiii']);
} else {
    echo $response; // Enviar la respuesta como JSON al cliente
}
curl_close($ch);
?>
