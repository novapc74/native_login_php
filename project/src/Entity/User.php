<?php

namespace App\Entity;

class User
{
    private ?int $id = null;
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?int $oldYear = null;
    private ?string $login = null;
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getOldYear(): ?int
    {
        return $this->oldYear;
    }

    public function setOldYear(?int $oldYear): self
    {
        $this->oldYear = $oldYear;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'oldYear' => $this->getOldYear(),
            'login' => $this->getLogin(),
            'password' => $this->getPassword(),
        ];
    }

}