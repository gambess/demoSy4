<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Propietario
 *
 * @ORM\Table(name="propietario")
 * @ORM\Entity
 */
class Propietario
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido1", type="string", length=255, nullable=true)
     */
    private $apellido1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido2", type="string", length=255, nullable=true)
     */
    private $apellido2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo_documento", type="string", length=255, nullable=true)
     */
    private $tipoDocumento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_documento", type="string", length=255, nullable=true)
     */
    private $numeroDocumento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=0, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vivienda", mappedBy="propietario")
     */
    private $viviendas;

    public function __construct()
    {
        $this->viviendas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido1(): ?string
    {
        return $this->apellido1;
    }

    public function setApellido1(?string $apellido1): self
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    public function getApellido2(): ?string
    {
        return $this->apellido2;
    }

    public function setApellido2(?string $apellido2): self
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    public function getTipoDocumento(): ?string
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(?string $tipoDocumento): self
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getNumeroDocumento(): ?string
    {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento(?string $numeroDocumento): self
    {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Vivienda[]
     */
    public function getViviendas(): Collection
    {
        return $this->viviendas;
    }

    public function addVivienda(Vivienda $vivienda): self
    {
        if (!$this->viviendas->contains($vivienda)) {
            $this->viviendas[] = $vivienda;
            $vivienda->setPropietario($this);
        }

        return $this;
    }

    public function removeVivienda(Vivienda $vivienda): self
    {
        if ($this->viviendas->contains($vivienda)) {
            $this->viviendas->removeElement($vivienda);
            // set the owning side to null (unless already changed)
            if ($vivienda->getPropietario() === $this) {
                $vivienda->setPropietario(null);
            }
        }

        return $this;
    }


}
