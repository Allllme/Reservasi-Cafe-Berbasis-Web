<?php

namespace Aplikasi\Domain;

class Reservation
{
    public string $id;
    public string $name;
    public string $phone;
    public string $date;
    public string $time;
    public int $guests;
    public int $tableNumber;
    public string $status;

    public function __construct(array $data)
    {
        $this->id = (string) ($data['id'] ?? round(microtime(true) * 1000));
        $this->name = trim((string) ($data['name'] ?? ''));
        $this->phone = trim((string) ($data['phone'] ?? ''));
        $this->date = (string) ($data['date'] ?? '');
        $this->time = (string) ($data['time'] ?? '');
        $this->guests = (int) ($data['guests'] ?? 0);
        $this->tableNumber = (int) ($data['tableNumber'] ?? 0);
        $this->status = (string) ($data['status'] ?? 'pending');
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'date' => $this->date,
            'time' => $this->time,
            'guests' => $this->guests,
            'tableNumber' => $this->tableNumber,
            'status' => $this->status,
        ];
    }
}
