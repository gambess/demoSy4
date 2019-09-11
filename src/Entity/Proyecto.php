<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto", indexes={@ORM\Index(name="fk_proyecto_subsector1_idx", columns={"subsector_id"})})
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
     * @var \Subsector
     *
     * @ORM\ManyToOne(targetEntity="Subsector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subsector_id", referencedColumnName="id")
     * })
     */
    private $subsector;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Producto", inversedBy="proyecto")
     * @ORM\JoinTable(name="producto_proyecto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     *   }
     * )
     */
    private $producto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->producto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Producto[]
     */
    public function getProducto(): Collection
    {
        return $this->producto;
    }

    public function addProducto(Producto $producto): self
    {
        if (!$this->producto->contains($producto)) {
            $this->producto[] = $producto;
        }

        return $this;
    }

    public function removeProducto(Producto $producto): self
    {
        if ($this->producto->contains($producto)) {
            $this->producto->removeElement($producto);
        }

        return $this;
    }

}
