<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity
 */
class Alumno
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellidop", type="string", length=50, nullable=true)
     */
    private $apellidop;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellidos", type="string", length=50, nullable=true)
     */
    private $apellidos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="edad", type="string", length=3, nullable=true)
     */
    private $edad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidop(): ?string
    {
        return $this->apellidop;
    }

    public function setApellidop(?string $apellidop): self
    {
        $this->apellidop = $apellidop;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEdad(): ?string
    {
        return $this->edad;
    }

    public function setEdad(?string $edad): self
    {
        $this->edad = $edad;

        return $this;
    }


}
