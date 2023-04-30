<?php
// src/Entity/Product.php
namespace App\Entity;

use App\Repository\TodoSqlRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TodoSqlRepository::class)]
class Todo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameOfSkill = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;




    /**
     * @return string|null
     */
    public function getNameOfSkill(): ?string
    {
        return $this->nameOfSkill;
    }

    /**
     * @param string|null $nameOfSkill
     */
    public function setNameOfSkill(?string $nameOfSkill): void
    {
        $this->nameOfSkill = $nameOfSkill;
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
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }


}
