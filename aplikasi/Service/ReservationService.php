<?php

namespace Aplikasi\Service;

use Aplikasi\Config\AppConfig;
use Aplikasi\Domain\Reservation;
use Aplikasi\Exception\ValidationException;
use Aplikasi\Repository\ReservationRepository;

class ReservationService
{
    private ReservationRepository $repository;

    public function __construct(ReservationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(): array
    {
        return array_map(fn (Reservation $reservation) => $reservation->toArray(), $this->repository->findAll());
    }

    public function create(array $data): array
    {
        $this->validateReservation($data);

        $reservation = new Reservation([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'date' => $data['date'],
            'time' => $data['time'],
            'guests' => (int) $data['guests'],
            'tableNumber' => (int) $data['tableNumber'],
            'status' => 'pending',
        ]);

        return $this->repository->save($reservation)->toArray();
    }

    public function updateStatus(array $data): void
    {
        $id = (string) ($data['id'] ?? '');
        $status = (string) ($data['status'] ?? '');

        if ($id === '' || !in_array($status, ['confirmed', 'cancelled'], true)) {
            throw new ValidationException('Status tidak valid.');
        }

        $this->repository->updateStatus($id, $status);
    }

    private function validateReservation(array $data): void
    {
        foreach (['name', 'phone', 'date', 'time', 'guests', 'tableNumber'] as $field) {
            if (!isset($data[$field]) || $data[$field] === '') {
                throw new ValidationException('Data reservasi belum lengkap.');
            }
        }

        $guests = (int) $data['guests'];
        $tableNumber = (int) $data['tableNumber'];
        $capacity = AppConfig::tableCapacity();

        if ($guests < 1 || $guests > 6) {
            throw new ValidationException('Jumlah tamu harus 1 sampai 6 orang.');
        }

        if (!isset($capacity[$tableNumber]) || $capacity[$tableNumber] < $guests) {
            throw new ValidationException('Meja tidak sesuai dengan jumlah tamu.');
        }
    }
}
