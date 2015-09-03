<?php

namespace Monks\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255,unique=true)
     */
    protected $username;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    protected $middlename;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $address;

    /**
     * @ORM\ManyToOne(targetEntity="models\Common\City")
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $mobile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email;
}
