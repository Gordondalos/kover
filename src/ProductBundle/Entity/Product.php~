<?php

namespace ProductBundle\Entity;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $properties;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $producer;

    /**
     * @var string
     */
    private $photoProduct;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set properties
     *
     * @param string $properties
     *
     * @return Product
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * Get properties
     *
     * @return string
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
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
     * Set title
     *
     * @param string $title
     *
     * @return Product
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
     * Set producer
     *
     * @param string $producer
     *
     * @return Product
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;

        return $this;
    }

    /**
     * Get producer
     *
     * @return string
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * Set photoProduct
     *
     * @param string $photoProduct
     *
     * @return Product
     */
    public function setPhotoProduct($photoProduct)
    {
        $this->photoProduct = $photoProduct;

        return $this;
    }

    /**
     * Get photoProduct
     *
     * @return string
     */
    public function getPhotoProduct()
    {
        return $this->photoProduct;
    }

    /**
     * Add category
     *
     * @param \CategoryBundle\Entity\Category $category
     *
     * @return Product
     */
    public function addCategory(\CategoryBundle\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \CategoryBundle\Entity\Category $category
     */
    public function removeCategory(\CategoryBundle\Entity\Category $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param \CategoryBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory(\CategoryBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Add producer
     *
     * @param \ProducerBundle\Entity\Producer $producer
     *
     * @return Product
     */
    public function addProducer(\ProducerBundle\Entity\Producer $producer)
    {
        $this->producer[] = $producer;

        return $this;
    }

    /**
     * Remove producer
     *
     * @param \ProducerBundle\Entity\Producer $producer
     */
    public function removeProducer(\ProducerBundle\Entity\Producer $producer)
    {
        $this->producer->removeElement($producer);
    }
}
