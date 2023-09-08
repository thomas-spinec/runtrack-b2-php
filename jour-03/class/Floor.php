<?php

require_once "Room.php";
class Floor
{
    private ?int $id;
    private ?string $name;
    private ?int $level;

    public function __construct(
        ?int $id = null,
        ?string $name = null,
        ?int $level = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id =
            $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name =
            $name;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @param int|null $level
     */
    public function setLevel(?int $level): void
    {
        $this->level =
            $level;
    }

    private function getConnect(): PDO
    {
        return getConnect();
    }

    public function getRooms(): ?array
    {
        $conn = $this->getConnect();
        $sql = "SELECT * FROM `room` WHERE floor_id = :id";
        $select = $conn->prepare($sql);
        $select->execute([':id' => $this->getId()]);
        $result = $select->fetchAll(PDO::FETCH_ASSOC);
        $rooms = [];
        foreach ($result as $room) {
            $rooms[] = new Room($room["id"], $room["floor_id"], $room["name"], $room["capacity"]);
        }
        return $rooms;
    }
}