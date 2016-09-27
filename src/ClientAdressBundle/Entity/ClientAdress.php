<?php

namespace ClientAdressBundle\Entity;

/**
 * ClientAdress
 */
class ClientAdress
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $adress;

    /**
     * @var string
     */
    private $phone;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ClientAdress
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return ClientAdress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return ClientAdress
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * @var \ClientBundle\Entity\Client
     */
    private $client;


    /**
     * Set client
     *
     * @param \ClientBundle\Entity\Client $client
     *
     * @return ClientAdress
     */
    public function setClient(\ClientBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \ClientBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
