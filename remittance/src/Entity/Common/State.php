<?php

namespace Monks\Entity\Common;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="states")
 */
class State
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Monks\Entity\Common\Country")
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(name="short_name", type="string", length=10)
     *
     * @var string
     */
    protected $shortName;

    /* @todo (name it proper)
     * @ORM\Column(name="?", type="integer")
     */
    protected $payoutTime;
}
