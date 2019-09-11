<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasetaSanitaria
 *
 * @ORM\Table(name="caseta_sanitaria", indexes={@ORM\Index(name="fk_caseta_sanitaria_subsector1_idx", columns={"subsector_id"})})
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

    /**
     * @var \Subsector
     *
     * @ORM\ManyToOne(targetEntity="Subsector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subsector_id", referencedColumnName="id")
     * })
     */
    private $subsector;

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


}
