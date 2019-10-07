<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PanelSolar
 *
 * @ORM\Table(name="panel_solar")
 * @ORM\Entity
 */
class PanelSolar
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
