<?php

require_once "Student.php";
//require_once "../functions.php";
class Grade
{
    private ?int $id;
    private ?int $room_id;
    private ?string $name;
    private ?DateTime $year;

public function __construct(
        ?int $id = null,
        ?int $room_id = null,
        ?string $name = null,
        ?DateTime $year = null
    ) {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }


    // ----------------------------------//
    // -------------- GETTERS & SETTERS -//
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
     * @return int|null
     */
    public function getRoomId(): ?int
    {
        return $this->room_id;
    }

    /**
     * @param int|null $room_id
     */
    public function setRoomId(?int $room_id): void
    {
        $this->room_id =
            $room_id;
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
     * @return DateTime|null
     */
    public function getYear(): ?DateTime
    {
        return $this->year;
    }

    /**
     * @param DateTime|null $year
     */
    public function setYear(?DateTime $year): void
    {
        $this->year =
            $year;
    }

    //-----------------------------------//
    // -------------- OTHER METHODS -----//

    private function getConnect(): PDO
    {
        return getConnect();
    }
    public function getStudents(): ?array
    {
        $conn = $this->getConnect();
        $sql = "SELECT * FROM `student` WHERE grade_id = :id";
        $select = $conn->prepare($sql);
        $select->execute([':id' => $this->id]);
        $result = $select->fetchAll(PDO::FETCH_ASSOC);
        $students = [];

        foreach ($result as $student) {
            $students[] = new Student($student["id"], $student["grade_id"], $student["email"], $student["fullname"],
            new DateTime($student["birthdate"]),
            $student["gender"]);
        }
        return $students;
    }

}