<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comuna
 *
 * @ORM\Table(name="comuna", uniqueConstraints={@ORM\UniqueConstraint(name="code_UNIQUE", columns={"codigo"})}, indexes={@ORM\Index(name="fk_comuna_provincia1_idx", columns={"provincia_id"})})
 * @ORM\Entity
 */
class Comuna
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
     * @ORM\ManyToOne(targetEntity="Provincia", inversedBy="comunas")
     */
    private $provincia;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sector", mappedBy="comuna")
     */
    private $sectors;

    public function __construct()
    {
        $this->sectors = new ArrayCollection();
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

    public function getProvincia(): ?Provincia
    {
        return $this->provincia;
    }

    public function setProvincia(?Provincia $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * @return Collection|Sector[]
     */
    public function getSectors(): Collection
    {
        return $this->sectors;
    }

    public function addSector(Sector $sector): self
    {
        if (!$this->sectors->contains($sector)) {
            $this->sectors[] = $sector;
            $sector->setComuna($this);
        }

        return $this;
    }

    public function removeSector(Sector $sector): self
    {
        if ($this->sectors->contains($sector)) {
            $this->sectors->removeElement($sector);
            // set the owning side to null (unless already changed)
            if ($sector->getComuna() === $this) {
                $sector->setComuna(null);
            }
        }

        return $this;
    }

}
