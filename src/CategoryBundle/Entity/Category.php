<?php

namespace CategoryBundle\Entity;

/**
 * Category
 */
class Category
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
    private $description;

    /**
     * @var integer
     */
    private $parentCategory;


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
     * @return Category
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
     * Set description
     *
     * @param string $description
     *
     * @return Category
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
     * Set parentCategory
     *
     * @param integer $parentCategory
     *
     * @return Category
     */
    public function setParentCategory($parentCategory)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return integer
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }
    /**
     * @var string
     */
    private $photoCategory;


    /**
     * Set photoCategory
     *
     * @param string $photoCategory
     *
     * @return Category
     */
    public function setPhotoCategory($photoCategory)
    {
        $this->photoCategory = $photoCategory;

        return $this;
    }

    /**
     * Get photoCategory
     *
     * @return string
     */
    public function getPhotoCategory()
    {
        return $this->photoCategory;
    }
}
