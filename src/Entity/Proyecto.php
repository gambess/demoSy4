<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto", indexes={@ORM\Index(name="fk_proyecto_localidad1_idx", columns={"localidad_id"})})
 * @ORM\Entity
 */
class Proyecto
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
     * @ORM\Column(name="codigo", type="string", length=45, nullable=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo_bip", type="string", length=45, nullable=true)
     */
    private $codigoBip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipologia_accion", type="text", length=0, nullable=true)
     */
    private $tipologiaAccion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="justificacion", type="text", length=0, nullable=true)
     */
    private $justificacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=0, nullable=true)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="programa", type="text", length=0, nullable=true)
     */
    private $programa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="beneficiarios_directos", type="integer", nullable=true)
     */
    private $beneficiariosDirectos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="beneficiarios_indirectos", type="integer", nullable=true)
     */
    private $beneficiariosIndirectos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="estimado_viviendas", type="integer", nullable=true)
     */
    private $estimadoViviendas;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \Localidad
     *
     * @ORM\ManyToOne(targetEntity="Localidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
     * })
     */
    private $localidad;

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

    public function getCodigoBip(): ?string
    {
        return $this->codigoBip;
    }

    public function setCodigoBip(?string $codigoBip): self
    {
        $this->codigoBip = $codigoBip;

        return $this;
    }

    public function getTipologiaAccion(): ?string
    {
        return $this->tipologiaAccion;
    }

    public function setTipologiaAccion(?string $tipologiaAccion): self
    {
        $this->tipologiaAccion = $tipologiaAccion;

        return $this;
    }

    public function getJustificacion(): ?string
    {
        return $this->justificacion;
    }

    public function setJustificacion(?string $justificacion): self
    {
        $this->justificacion = $justificacion;

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

    public function getPrograma(): ?string
    {
        return $this->programa;
    }

    public function setPrograma(?string $programa): self
    {
        $this->programa = $programa;

        return $this;
    }

    public function getBeneficiariosDirectos(): ?int
    {
        return $this->beneficiariosDirectos;
    }

    public function setBeneficiariosDirectos(?int $beneficiariosDirectos): self
    {
        $this->beneficiariosDirectos = $beneficiariosDirectos;

        return $this;
    }

    public function getBeneficiariosIndirectos(): ?int
    {
        return $this->beneficiariosIndirectos;
    }

    public function setBeneficiariosIndirectos(?int $beneficiariosIndirectos): self
    {
        $this->beneficiariosIndirectos = $beneficiariosIndirectos;

        return $this;
    }

    public function getEstimadoViviendas(): ?int
    {
        return $this->estimadoViviendas;
    }

    public function setEstimadoViviendas(?int $estimadoViviendas): self
    {
        $this->estimadoViviendas = $estimadoViviendas;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

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


}
