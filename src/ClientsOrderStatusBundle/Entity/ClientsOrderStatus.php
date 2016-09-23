<?php

namespace ClientsOrderStatusBundle\Entity;

/**
 * ClientsOrderStatus
 */
class ClientsOrderStatus
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $desctiption;


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
     * Set title
     *
     * @param string $title
     *
     * @return ClientsOrderStatus
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set desctiption
     *
     * @param string $desctiption
     *
     * @return ClientsOrderStatus
     */
    public function setDesctiption($desctiption)
    {
        $this->desctiption = $desctiption;

        return $this;
    }

    /**
     * Get desctiption
     *
     * @return string
     */
    public function getDesctiption()
    {
        return $this->desctiption;
    }
}

