<?php

$data = $_POST;

$nombre = $data['nombre'];

// Ver rápidamente los datos recibidos
print(json_encode($data));
