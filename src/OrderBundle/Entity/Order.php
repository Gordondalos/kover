<?php

namespace OrderBundle\Entity;

/**
 * Order
 */
class Order
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @var \DateTime
     */
    private $dateFinish;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var string
     */
    private $products;

    /**
     * @var string
     */
    private $price_total;

    /**
     * @var integer
     */
    private $client;

    /**
     * @var integer
     */
    private $clientAdress;

    /**
     * @var integer
     */
    private $man_created;

    /**
     * @var integer
     */
    private $man_doit;

    /**
     * @var \ClientsOrderStatusBundle\Entity\ClientsOrderStatus
     */
    private $clientsOrderStatus;


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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Order
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateFinish
     *
     * @param \DateTime $dateFinish
     *
     * @return Order
     */
    public function setDateFinish($dateFinish)
    {
        $this->dateFinish = $dateFinish;

        return $this;
    }

    /**
     * Get dateFinish
     *
     * @return \DateTime
     */
    public function getDateFinish()
    {
        return $this->dateFinish;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Order
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
     * Set status
     *
     * @param integer $status
     *
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set products
     *
     * @param string $products
     *
     * @return Order
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return string
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set priceTotal
     *
     * @param string $priceTotal
     *
     * @return Order
     */
    public function setPriceTotal($priceTotal)
    {
        $this->price_total = $priceTotal;

        return $this;
    }

    /**
     * Get priceTotal
     *
     * @return string
     */
    public function getPriceTotal()
    {
        return $this->price_total;
    }

    /**
     * Set client
     *
     * @param integer $client
     *
     * @return Order
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return integer
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set clientAdress
     *
     * @param integer $clientAdress
     *
     * @return Order
     */
    public function setClientAdress($clientAdress)
    {
        $this->clientAdress = $clientAdress;

        return $this;
    }

    /**
     * Get clientAdress
     *
     * @return integer
     */
    public function getClientAdress()
    {
        return $this->clientAdress;
    }

    /**
     * Set manCreated
     *
     * @param integer $manCreated
     *
     * @return Order
     */
    public function setManCreated($manCreated)
    {
        $this->man_created = $manCreated;

        return $this;
    }

    /**
     * Get manCreated
     *
     * @return integer
     */
    public function getManCreated()
    {
        return $this->man_created;
    }

    /**
     * Set manDoit
     *
     * @param integer $manDoit
     *
     * @return Order
     */
    public function setManDoit($manDoit)
    {
        $this->man_doit = $manDoit;

        return $this;
    }

    /**
     * Get manDoit
     *
     * @return integer
     */
    public function getManDoit()
    {
        return $this->man_doit;
    }

    /**
     * Set clientsOrderStatus
     *
     * @param \ClientsOrderStatusBundle\Entity\ClientsOrderStatus $clientsOrderStatus
     *
     * @return Order
     */
    public function setClientsOrderStatus(\ClientsOrderStatusBundle\Entity\ClientsOrderStatus $clientsOrderStatus = null)
    {
        $this->clientsOrderStatus = $clientsOrderStatus;

        return $this;
    }

    /**
     * Get clientsOrderStatus
     *
     * @return \ClientsOrderStatusBundle\Entity\ClientsOrderStatus
     */
    public function getClientsOrderStatus()
    {
        return $this->clientsOrderStatus;
    }
}
