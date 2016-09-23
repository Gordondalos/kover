<?php

namespace ProductPropertiesValueBundle\Entity;

/**
 * ProductPropertiesValue
 */
class ProductPropertiesValue
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $propertiesValue;

    /**
     * @var integer
     */
    private $properties;

    /**
     * @var integer
     */
    private $product;


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
     * Set propertiesValue
     *
     * @param string $propertiesValue
     *
     * @return ProductPropertiesValue
     */
    public function setPropertiesValue($propertiesValue)
    {
        $this->propertiesValue = $propertiesValue;

        return $this;
    }

    /**
     * Get propertiesValue
     *
     * @return string
     */
    public function getPropertiesValue()
    {
        return $this->propertiesValue;
    }

    /**
     * Set properties
     *
     * @param integer $properties
     *
     * @return ProductPropertiesValue
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Get properties
     *
     * @return integer
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Set product
     *
     * @param integer $product
     *
     * @return ProductPropertiesValue
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return integer
     */
    public function getProduct()
    {
        return $this->product;
    }
}

