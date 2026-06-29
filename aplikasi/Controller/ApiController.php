<?php

namespace Aplikasi\Controller;

use Aplikasi\Exception\ValidationException;
use Aplikasi\Service\ReservationService;

class ApiController
{
    private ReservationService $service;

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
    }

    public function handle(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $method = $_SERVER['REQUEST_METHOD'];
            $action = $_GET['action'] ?? 'list';

            if ($method === 'GET') {
                $this->json($this->service->list());
                return;
            }

            $payload = json_decode(file_get_contents('php://input'), true) ?: [];

            if ($method === 'POST' && $action === 'create') {
                $this->json($this->service->create($payload));
                return;
            }

            if ($method === 'POST' && $action === 'update-status') {
                $this->service->updateStatus($payload);
                $this->json(['message' => 'Status berhasil diubah.']);
                return;
            }

            http_response_code(404);
            $this->json(['message' => 'Endpoint tidak ditemukan.']);
        } catch (ValidationException $exception) {
            http_response_code(422);
            $this->json(['message' => $exception->getMessage()]);
        }
    }

    private function json(array $data): void
    {
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
