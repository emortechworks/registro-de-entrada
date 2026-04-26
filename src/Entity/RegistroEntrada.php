<?php

namespace App\Entity;

use App\Repository\RegistroEntradaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegistroEntradaRepository::class)]
class RegistroEntrada
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $fecha_entrada = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $hora_entrada = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $apellido = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $identificacion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $persona_que_visita = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $departamento_que_visita = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motivo_de_visita = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $fecha_salida = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTime $hora_salida = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaEntrada(): ?\DateTime
    {
        return $this->fecha_entrada;
    }

    public function setFechaEntrada(\DateTime $fecha_entrada): static
    {
        $this->fecha_entrada = $fecha_entrada;

        return $this;
    }

    public function getHoraEntrada(): ?\DateTime
    {
        return $this->hora_entrada;
    }

    public function setHoraEntrada(\DateTime $hora_entrada): static
    {
        $this->hora_entrada = $hora_entrada;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getIdentificacion(): ?string
    {
        return $this->identificacion;
    }

    public function setIdentificacion(string $identificacion): static
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    public function getPersonaQueVisita(): ?string
    {
        return $this->persona_que_visita;
    }

    public function setPersonaQueVisita(?string $persona_que_visita): static
    {
        $this->persona_que_visita = $persona_que_visita;

        return $this;
    }

    public function getDepartamentoQueVisita(): ?string
    {
        return $this->departamento_que_visita;
    }

    public function setDepartamentoQueVisita(?string $departamento_que_visita): static
    {
        $this->departamento_que_visita = $departamento_que_visita;

        return $this;
    }

    public function getMotivoDeVisita(): ?string
    {
        return $this->motivo_de_visita;
    }

    public function setMotivoDeVisita(string $motivo_de_visita): static
    {
        $this->motivo_de_visita = $motivo_de_visita;

        return $this;
    }

    public function getFechaSalida(): ?\DateTime
    {
        return $this->fecha_salida;
    }

    public function setFechaSalida(?\DateTime $fecha_salida): static
    {
        $this->fecha_salida = $fecha_salida;

        return $this;
    }

    public function getHoraSalida(): ?\DateTime
    {
        return $this->hora_salida;
    }

    public function setHoraSalida(?\DateTime $hora_salida): static
    {
        $this->hora_salida = $hora_salida;

        return $this;
    }
}
