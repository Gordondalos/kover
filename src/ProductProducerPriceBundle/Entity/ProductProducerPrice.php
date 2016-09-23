<?php

namespace ProductProducerPriceBundle\Entity;

/**
 * ProductProducerPrice
 */
class ProductProducerPrice
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $Product;

    /**
     * @var integer
     */
    private $Producer;

    /**
     * @var integer
     */
    private $price;


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
     * Set product
     *
     * @param integer $product
     *
     * @return ProductProducerPrice
     */
    public function setProduct($product)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return integer
     */
    public function getProduct()
    {
        return $this->Product;
    }

    /**
     * Set producer
     *
     * @param integer $producer
     *
     * @return ProductProducerPrice
     */
    public function setProducer($producer)
    {
        $this->Producer = $producer;

        return $this;
    }

    /**
     * Get producer
     *
     * @return integer
     */
    public function getProducer()
    {
        return $this->Producer;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return ProductProducerPrice
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }
}

