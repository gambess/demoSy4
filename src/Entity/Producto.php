<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity
 */
class Producto
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proyecto", mappedBy="producto")
     */
    private $proyecto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proyecto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Proyecto[]
     */
    public function getProyecto(): Collection
    {
        return $this->proyecto;
    }

    public function addProyecto(Proyecto $proyecto): self
    {
        if (!$this->proyecto->contains($proyecto)) {
            $this->proyecto[] = $proyecto;
            $proyecto->addProducto($this);
        }

        return $this;
    }

    public function removeProyecto(Proyecto $proyecto): self
    {
        if ($this->proyecto->contains($proyecto)) {
            $this->proyecto->removeElement($proyecto);
            $proyecto->removeProducto($this);
        }

        return $this;
    }

}
