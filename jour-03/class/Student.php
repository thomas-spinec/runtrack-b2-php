<?php

class Student
{
    private ?int $id;
    private ?int $grade_id;
    private ?string $email;
    private ?string $fullname;
    private ?DateTime $birthdate;
    private ?string $gender;

    public function __construct(
        ?int $id = null,
        ?int $grade_id = null,
        ?string $email = null,
        ?string $fullname = null,
        ?DateTime $birthdate = null,
        ?string $gender = null
    ) {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
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
     * @return int|null
     */
    public function getGradeId(): ?int
    {
        return $this->grade_id;
    }

    /**
     * @param int|null $grade_id
     */
    public function setGradeId(?int $grade_id): void
    {
        $this->grade_id =
            $grade_id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email =
            $email;
    }

    /**
     * @return string|null
     */
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    /**
     * @param string|null $fullname
     */
    public function setFullname(?string $fullname): void
    {
        $this->fullname =
            $fullname;
    }

    /**
     * @return DateTime|null
     */
    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }

    /**
     * @param DateTime|null $birthdate
     */
    public function setBirthdate(?DateTime $birthdate): void
    {
        $this->birthdate =
            $birthdate;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     */
    public function setGender(?string $gender): void
    {
        $this->gender =
            $gender;
    }




}