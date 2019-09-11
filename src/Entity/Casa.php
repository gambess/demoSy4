<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Casa
 *
 * @ORM\Table(name="casa", indexes={@ORM\Index(name="fk_casa_propietario1_idx", columns={"propietario_id"}), @ORM\Index(name="fk_casa_sector1_idx", columns={"sector_id"}), @ORM\Index(name="fk_casa_subsector1_idx", columns={"subsector_id"}), @ORM\Index(name="fk_casa_Localidad1_idx", columns={"localidad_id"})})
 * @ORM\Entity
 */
class Casa
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
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    private $nombre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="personas", type="integer", nullable=true)
     */
    private $personas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitud", type="string", length=45, nullable=true)
     */
    private $longitud;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitud", type="string", length=45, nullable=true)
     */
    private $latitud;

    /**
     * @var string|null
     *
     * @ORM\Column(name="altura", type="string", length=45, nullable=true)
     */
    private $altura;

    /**
     * @var \Localidad
     *
     * @ORM\ManyToOne(targetEntity="Localidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
     * })
     */
    private $localidad;

    /**
     * @var \Subsector
     *
     * @ORM\ManyToOne(targetEntity="Subsector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subsector_id", referencedColumnName="id")
     * })
     */
    private $subsector;

    /**
     * @var \Sector
     *
     * @ORM\ManyToOne(targetEntity="Sector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sector_id", referencedColumnName="id")
     * })
     */
    private $sector;

    /**
     * @var \Propietario
     *
     * @ORM\ManyToOne(targetEntity="Propietario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="propietario_id", referencedColumnName="id")
     * })
     */
    private $propietario;

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

    public function getPersonas(): ?int
    {
        return $this->personas;
    }

    public function setPersonas(?int $personas): self
    {
        $this->personas = $personas;

        return $this;
    }

    public function getLongitud(): ?string
    {
        return $this->longitud;
    }

    public function setLongitud(?string $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getLatitud(): ?string
    {
        return $this->latitud;
    }

    public function setLatitud(?string $latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    public function getAltura(): ?string
    {
        return $this->altura;
    }

    public function setAltura(?string $altura): self
    {
        $this->altura = $altura;

        return $this;
    }

    public function getLocalidad(): ?Localidad
    {
        return $this->localidad;
    }

    public function setLocalidad(?Localidad $localidad): self
    {
        $this->localidad = $localidad;

        return $this;
    }

    public function getSubsector(): ?Subsector
    {
        return $this->subsector;
    }

    public function setSubsector(?Subsector $subsector): self
    {
        $this->subsector = $subsector;

        return $this;
    }

    public function getSector(): ?Sector
    {
        return $this->sector;
    }

    public function setSector(?Sector $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function getPropietario(): ?Propietario
    {
        return $this->propietario;
    }

    public function setPropietario(?Propietario $propietario): self
    {
        $this->propietario = $propietario;

        return $this;
    }


}
