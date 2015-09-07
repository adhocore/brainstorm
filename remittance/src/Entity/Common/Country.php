<?php

namespace Monks\Entity\Common;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="countries")
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, unique=True)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=2)
     */
    protected $iso2;

    /**
     * @ORM\Column(type="string", length=3)
     */
    protected $iso3;

    /**
     * @ORM\Column(name="mtcn_prefix", type="string", length=6, nullable=true)
     */
    protected $mtcnPrefix = '';

    /**
     * @ORM\Column(name="dialing_code", type="string", length=10, nullable=true)
     */
    protected $dialingCode;

    /* @todo (name it proper)
     * @ORM\Column(name="?", type="integer")
     */
    protected $payoutTime;

    /**
     * @ORM\Column(name="payout_currencies", type="simple_array", nullable=true)
     */
    protected $payoutCurrencies;

    /**
     * @ORM\Column(type="text",nullable =true)
     */
    protected $image;

    /*
     * @ORM\Column(name="payout_limit", type="integer", length=11, nullable=true)
     */
    protected $payoutLimit;

    /**
     * @ORM\Column(name="payment_methods", type="simple_array", nullable=true)
     */
    protected $paymentMethods;

    /**
     * @ORM\Column(name="zip_code_mandatory", type="boolean", options={"default" = 0})
     */
    protected $zipCodeMandatory = false;

    /*
     * @ORM\Column(name="send_money_allowed", type="boolean", options={"default" = 0})
     */
    protected $sendMoneyAllowed = false;

    /* @todo
     * @ORM\ManyToOne(targetEntity="Monks\Entity\Common\Currency")
     */
    protected $currency;

    /* @todo (is it required?)
     * @ORM\ManyToOne(name="account_template", targetEntity="models\Common\CheckTemplate")
     */
    protected $accountTemplate;

    /* @todo
     * @ORM\ManyToMany(targetEntity="Monks\Entity\Common\IdDocument")
     * @ORM\JoinTable(name="country_id_docs")
     */
    protected $ids;
}
