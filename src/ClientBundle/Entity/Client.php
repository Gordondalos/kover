<?php

namespace ClientBundle\Entity;

/**
 * Client
 */
class Client
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var \ClientAdressBundle\Entity\ClientAdress
     */
    private $adress;

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
     * Set name
     *
     * @param string $name
     *
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Client
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Client
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
     * Set adress
     *
     * @param \ClientAdressBundle\Entity\ClientAdress $adress
     *
     * @return Client
     */
    public function setAdress(\ClientAdressBundle\Entity\ClientAdress $adress = null)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return \ClientAdressBundle\Entity\ClientAdress
     */
    public function getAdress()
    {
        return $this->adress;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adress = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add adress
     *
     * @param \ClientAdressBundle\Entity\ClientAdress $adress
     *
     * @return Client
     */
    public function addAdress(\ClientAdressBundle\Entity\ClientAdress $adress)
    {
        $this->adress[] = $adress;

        return $this;
    }

    /**
     * Remove adress
     *
     * @param \ClientAdressBundle\Entity\ClientAdress $adress
     */
    public function removeAdress(\ClientAdressBundle\Entity\ClientAdress $adress)
    {
        $this->adress->removeElement($adress);
    }
}
