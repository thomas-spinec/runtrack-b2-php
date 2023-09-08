<?php

class Room
{

    private ?int $id;
    private ?int $floor_id;
    private ?string $name;
    private ?int $capacity;

    public function __construct(
        ?int $id = null,
        ?int $floor_id = null,
        ?string $name = null,
        ?int $capacity = null
    ) {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
    }

}