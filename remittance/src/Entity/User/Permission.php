<?php

namespace Monks\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="permissions")
 */
class Permission
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=100,unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;
}
