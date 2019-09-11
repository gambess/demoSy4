<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicioAgua
 *
 * @ORM\Table(name="servicio_agua", indexes={@ORM\Index(name="fk_servicio_agua_casa1_idx", columns={"casa_id"})})
 * @ORM\Entity
 */
class ServicioAgua
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
     * @var \Casa
     *
     * @ORM\ManyToOne(targetEntity="Casa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="casa_id", referencedColumnName="id")
     * })
     */
    private $casa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCasa(): ?Casa
    {
        return $this->casa;
    }

    public function setCasa(?Casa $casa): self
    {
        $this->casa = $casa;

        return $this;
    }


}
