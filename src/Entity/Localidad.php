<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localidad
 *
 * @ORM\Table(name="localidad", uniqueConstraints={@ORM\UniqueConstraint(name="code_UNIQUE", columns={"codigo"})}, indexes={@ORM\Index(name="fk_localidad_comuna1_idx", columns={"comuna_id"}), @ORM\Index(name="fk_Localidad_sector1_idx", columns={"sector_id"}), @ORM\Index(name="fk_Localidad_subsector1_idx", columns={"subsector_id"})})
 * @ORM\Entity
 */
class Localidad
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
     * @ORM\Column(name="codigo", type="string", length=100, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="altura", type="string", length=45, nullable=false)
     */
    private $altura;

    /**
     * @var int
     *
     * @ORM\Column(name="personas", type="integer", nullable=false)
     */
    private $personas;

    /**
     * @var int
     *
     * @ORM\Column(name="casas", type="integer", nullable=false)
     */
    private $casas;

    /**
     * @var int
     *
     * @ORM\Column(name="pararrayos", type="integer", nullable=false)
     */
    private $pararrayos;

    /**
     * @var string
     *
     * @ORM\Column(name="prioridad", type="string", length=10, nullable=false)
     */
    private $prioridad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alumbrado_publico", type="text", length=0, nullable=true)
     */
    private $alumbradoPublico;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motivo", type="string", length=100, nullable=true)
     */
    private $motivo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=0, nullable=true)
     */
    private $descripcion;

    /**
     * @var \Comuna
     *
     * @ORM\ManyToOne(targetEntity="Comuna")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comuna_id", referencedColumnName="id")
     * })
     */
    private $comuna;

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
     * @var \Subsector
     *
     * @ORM\ManyToOne(targetEntity="Subsector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subsector_id", referencedColumnName="id")
     * })
     */
    private $subsector;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $latitud;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longitud;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
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

    public function getAltura(): ?string
    {
        return $this->altura;
    }

    public function setAltura(string $altura): self
    {
        $this->altura = $altura;

        return $this;
    }

    public function getPersonas(): ?int
    {
        return $this->personas;
    }

    public function setPersonas(int $personas): self
    {
        $this->personas = $personas;

        return $this;
    }

    public function getCasas(): ?int
    {
        return $this->casas;
    }

    public function setCasas(int $casas): self
    {
        $this->casas = $casas;

        return $this;
    }

    public function getPararrayos(): ?int
    {
        return $this->pararrayos;
    }

    public function setPararrayos(int $pararrayos): self
    {
        $this->pararrayos = $pararrayos;

        return $this;
    }

    public function getPrioridad(): ?string
    {
        return $this->prioridad;
    }

    public function setPrioridad(string $prioridad): self
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    public function getAlumbradoPublico(): ?string
    {
        return $this->alumbradoPublico;
    }

    public function setAlumbradoPublico(?string $alumbradoPublico): self
    {
        $this->alumbradoPublico = $alumbradoPublico;

        return $this;
    }

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(?string $motivo): self
    {
        $this->motivo = $motivo;

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

    public function getComuna(): ?Comuna
    {
        return $this->comuna;
    }

    public function setComuna(?Comuna $comuna): self
    {
        $this->comuna = $comuna;

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

    public function getSubsector(): ?Subsector
    {
        return $this->subsector;
    }

    public function setSubsector(?Subsector $subsector): self
    {
        $this->subsector = $subsector;

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

    public function getLongitud(): ?string
    {
        return $this->longitud;
    }

    public function setLongitud(?string $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }


}
