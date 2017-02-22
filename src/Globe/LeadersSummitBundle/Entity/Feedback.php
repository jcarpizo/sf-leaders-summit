<?php

namespace Globe\LeadersSummitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 */
class Feedback
{
    /**
     * @var integer
     */
    private $feedback;

    /**
     * @var integer
     */
    private $rating;

    /**
     * @var integer
     */
    private $relevance;

    /**
     * @var integer
     */
    private $expectation;

    /**
     * @var integer
     */
    private $quality;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set feedback
     *
     * @param integer $feedback
     * @return Feedback
     */
    public function setFeedback($feedback)
    {
        $this->feedback = $feedback;

        return $this;
    }

    /**
     * Get feedback
     *
     * @return integer 
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Feedback
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set relevance
     *
     * @param integer $relevance
     * @return Feedback
     */
    public function setRelevance($relevance)
    {
        $this->relevance = $relevance;

        return $this;
    }

    /**
     * Get relavance
     *
     * @return integer 
     */
    public function getRelevance()
    {
        return $this->relevance;
    }

    /**
     * Set expectation
     *
     * @param integer $expectation
     * @return Feedback
     */
    public function setExpectation($expectation)
    {
        $this->expectation = $expectation;

        return $this;
    }

    /**
     * Get expectation
     *
     * @return integer 
     */
    public function getExpectation()
    {
        return $this->expectation;
    }

    /**
     * Set quality
     *
     * @param integer $quality
     * @return Feedback
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return integer 
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Feedback
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Feedback
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Feedback
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Feedback
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
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
}
