<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasetaSanitaria
 *
 * @ORM\Table(name="caseta_sanitaria")
 * @ORM\Entity
 */
class CasetaSanitaria
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
