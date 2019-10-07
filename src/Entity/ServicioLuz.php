<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicioLuz
 *
 * @ORM\Table(name="servicio_luz")
 * @ORM\Entity
 */
class ServicioLuz
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }


}
