<?php

namespace Aplikasi\Repository;

use Aplikasi\Domain\Reservation;

class ReservationRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->ensureStorageExists();
    }

    public function findAll(): array
    {
        $json = file_get_contents($this->filePath);
        $data = json_decode($json, true);

        if (!is_array($data)) {
            return [];
        }

        return array_map(fn ($item) => new Reservation($item), $data);
    }

    public function save(Reservation $reservation): Reservation
    {
        $reservations = $this->findAll();
        array_unshift($reservations, $reservation);
        $this->write($reservations);

        return $reservation;
    }

    public function updateStatus(string $id, string $status): void
    {
        $reservations = $this->findAll();

        foreach ($reservations as $reservation) {
            if ($reservation->id === $id) {
                $reservation->status = $status;
                break;
            }
        }

        $this->write($reservations);
    }

    private function write(array $reservations): void
    {
        $payload = array_map(fn (Reservation $reservation) => $reservation->toArray(), $reservations);
        file_put_contents($this->filePath, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    private function ensureStorageExists(): void
    {
        $directory = dirname($this->filePath);

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, '[]');
        }
    }
}
