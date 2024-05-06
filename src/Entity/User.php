<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource()]
#[UniqueEntity('email', message: "Bu {{ value }} oldin ro'yhatdan o'tgan")]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Email bo'sh bo'lisligi kerak")]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Parol bo'sh bo'lisligi kerak")]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Assert\Range(min: 15, max: 255)]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(choices: ['erkak', 'ayol',], message: "Qabul qilishi bo'lgan jins: erkak yoki ayol")]
    private ?string $gender = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 9, max: 15)]
    private ?string $phone = null;

    #[ORM\Column]
    private array $roles = ["ROLE_USER"];

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }

}
