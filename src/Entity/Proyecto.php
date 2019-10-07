<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto", indexes={@ORM\Index(name="fk_proyecto_producto1_idx", columns={"producto_id"}), @ORM\Index(name="fk_proyecto_localidad1_idx", columns={"localidad_id"})})
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
     * @ORM\Column(name="codigo_bip", type="string", length=255, nullable=true)
     */
    private $codigoBip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipologia_accion", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="programa", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="fecha_aprobacion", type="date", nullable=true)
     */
    private $fechaAprobacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="archivos_adjuntos", type="integer", nullable=true)
     */
    private $archivosAdjuntos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="plazo_elaboracion", type="integer", nullable=true)
     */
    private $plazoElaboracion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="plazo_ejecucion", type="integer", nullable=true)
     */
    private $plazoEjecucion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="aporte_municipal", type="string", length=255, nullable=true)
     */
    private $aporteMunicipal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="aporte_terceros", type="string", length=255, nullable=true)
     */
    private $aporteTerceros;

    /**
     * @var string|null
     *
     * @ORM\Column(name="aporte_subdere", type="string", length=255, nullable=true)
     */
    private $aporteSubdere;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profesional_a_cargo", type="string", length=255, nullable=true)
     */
    private $profesionalACargo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="correo_electronico", type="string", length=255, nullable=true)
     */
    private $correoElectronico;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefonos", type="string", length=255, nullable=true)
     */
    private $telefonos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obervaciones", type="text", length=0, nullable=true)
     */
    private $obervaciones;

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
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     * })
     */
    private $producto;

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

    public function getFechaAprobacion(): ?\DateTimeInterface
    {
        return $this->fechaAprobacion;
    }

    public function setFechaAprobacion(?\DateTimeInterface $fechaAprobacion): self
    {
        $this->fechaAprobacion = $fechaAprobacion;

        return $this;
    }

    public function getArchivosAdjuntos(): ?int
    {
        return $this->archivosAdjuntos;
    }

    public function setArchivosAdjuntos(?int $archivosAdjuntos): self
    {
        $this->archivosAdjuntos = $archivosAdjuntos;

        return $this;
    }

    public function getPlazoElaboracion(): ?int
    {
        return $this->plazoElaboracion;
    }

    public function setPlazoElaboracion(?int $plazoElaboracion): self
    {
        $this->plazoElaboracion = $plazoElaboracion;

        return $this;
    }

    public function getPlazoEjecucion(): ?int
    {
        return $this->plazoEjecucion;
    }

    public function setPlazoEjecucion(?int $plazoEjecucion): self
    {
        $this->plazoEjecucion = $plazoEjecucion;

        return $this;
    }

    public function getAporteMunicipal(): ?string
    {
        return $this->aporteMunicipal;
    }

    public function setAporteMunicipal(?string $aporteMunicipal): self
    {
        $this->aporteMunicipal = $aporteMunicipal;

        return $this;
    }

    public function getAporteTerceros(): ?string
    {
        return $this->aporteTerceros;
    }

    public function setAporteTerceros(?string $aporteTerceros): self
    {
        $this->aporteTerceros = $aporteTerceros;

        return $this;
    }

    public function getAporteSubdere(): ?string
    {
        return $this->aporteSubdere;
    }

    public function setAporteSubdere(?string $aporteSubdere): self
    {
        $this->aporteSubdere = $aporteSubdere;

        return $this;
    }

    public function getProfesionalACargo(): ?string
    {
        return $this->profesionalACargo;
    }

    public function setProfesionalACargo(?string $profesionalACargo): self
    {
        $this->profesionalACargo = $profesionalACargo;

        return $this;
    }

    public function getCorreoElectronico(): ?string
    {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico(?string $correoElectronico): self
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    public function getTelefonos(): ?string
    {
        return $this->telefonos;
    }

    public function setTelefonos(?string $telefonos): self
    {
        $this->telefonos = $telefonos;

        return $this;
    }

    public function getObervaciones(): ?string
    {
        return $this->obervaciones;
    }

    public function setObervaciones(?string $obervaciones): self
    {
        $this->obervaciones = $obervaciones;

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

    public function getProducto(): ?Producto
    {
        return $this->producto;
    }

    public function setProducto(?Producto $producto): self
    {
        $this->producto = $producto;

        return $this;
    }


}
