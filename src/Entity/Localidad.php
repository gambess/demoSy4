<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Localidad
 *
 * @ORM\Table(name="localidad", uniqueConstraints={@ORM\UniqueConstraint(name="code_UNIQUE", columns={"codigo"})}, indexes={@ORM\Index(name="fk_localidad_subsector1_idx", columns={"subsector_id"})})
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
     * @var string|null
     *
     * @ORM\Column(name="codigo", type="string", length=255, nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="personas", type="integer", nullable=true)
     */
    private $personas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="casas", type="integer", nullable=true)
     */
    private $casas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pararrayos", type="integer", nullable=true)
     */
    private $pararrayos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prioridad", type="string", length=255, nullable=true)
     */
    private $prioridad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alumbrado_publico", type="string", length=255, nullable=true)
     */
    private $alumbradoPublico;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motivo", type="string", length=255, nullable=true)
     */
    private $motivo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="altura", type="string", length=255, nullable=true)
     */
    private $altura;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitud", type="string", length=255, nullable=true)
     */
    private $latitud;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitud", type="string", length=255, nullable=true)
     */
    private $longitud;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=0, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="Subsector", inversedBy="localidades")
     */
    private $subsector;

    /**
     * @ORM\OneToMany(targetEntity="Proyecto", mappedBy="localidad")
     */
    private $proyectos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vivienda", mappedBy="localidad")
     */
    private $viviendas;

    public function __construct()
    {
        $this->proyectos = new ArrayCollection();
        $this->viviendas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
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

    public function getPersonas(): ?int
    {
        return $this->personas;
    }

    public function setPersonas(?int $personas): self
    {
        $this->personas = $personas;

        return $this;
    }

    public function getCasas(): ?int
    {
        return $this->casas;
    }

    public function setCasas(?int $casas): self
    {
        $this->casas = $casas;

        return $this;
    }

    public function getPararrayos(): ?int
    {
        return $this->pararrayos;
    }

    public function setPararrayos(?int $pararrayos): self
    {
        $this->pararrayos = $pararrayos;

        return $this;
    }

    public function getPrioridad(): ?string
    {
        return $this->prioridad;
    }

    public function setPrioridad(?string $prioridad): self
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

    public function getAltura(): ?string
    {
        return $this->altura;
    }

    public function setAltura(?string $altura): self
    {
        $this->altura = $altura;

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

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

    /**
     * @return Collection|Proyecto[]
     */
    public function getProyectos(): Collection
    {
        return $this->proyectos;
    }

    public function addProyecto(Proyecto $proyecto): self
    {
        if (!$this->proyectos->contains($proyecto)) {
            $this->proyectos[] = $proyecto;
            $proyecto->setLocalidad($this);
        }

        return $this;
    }

    public function removeProyecto(Proyecto $proyecto): self
    {
        if ($this->proyectos->contains($proyecto)) {
            $this->proyectos->removeElement($proyecto);
            // set the owning side to null (unless already changed)
            if ($proyecto->getLocalidad() === $this) {
                $proyecto->setLocalidad(null);
            }
        }

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
            $vivienda->setLocalidad($this);
        }

        return $this;
    }

    public function removeVivienda(Vivienda $vivienda): self
    {
        if ($this->viviendas->contains($vivienda)) {
            $this->viviendas->removeElement($vivienda);
            // set the owning side to null (unless already changed)
            if ($vivienda->getLocalidad() === $this) {
                $vivienda->setLocalidad(null);
            }
        }

        return $this;
    }


}
