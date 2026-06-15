<?php

header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');

$action = $_GET['action'] ?? 'hello';

switch ($action) {
    case 'cpu':
        function fibonacci($n) {
            if ($n <= 1) return $n;
            return fibonacci($n - 1) + fibonacci($n - 2);
        }
        $result = fibonacci(35);
        echo json_encode(['status' => 'ok', 'result' => $result]);
        break;

    case 'io':
        $file = sys_get_temp_dir() . '/test.tmp';
        file_put_contents($file, 'Bu bir I/O testidir. Zaman: ' . microtime(true));
        $content = file_get_contents($file);
        unlink($file);
        echo json_encode(['status' => 'ok', 'content_length' => strlen($content)]);
        break;

    case 'hello':
    default:
        $serverSoftware = isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : 'FrankenPHP/Caddy';
        echo json_encode(['message' => 'Hello World from ' . $serverSoftware]);
        break;
}