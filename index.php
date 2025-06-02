<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents("php://input"), true);
$mensaje = $input['mensaje'] ?? 'Hola, soy Mario de Todologistica. ¿Qué novedades logísticas hay en LATAM?';

$data = [
  "model" => "gpt-4o",
  "messages" => [
    [
      "role" => "user",
      "content" => $mensaje
    ]
  ]
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Authorization: Bearer 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",
  "Content-Type: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
