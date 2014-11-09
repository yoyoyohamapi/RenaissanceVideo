<?php

namespace Video\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="video_token", type="string", length=255)
     */
    private $videoToken;

    /**
     * @var integer
     *
     * @ORM\Column(name="course_id", type="integer")
     */
    private $courseId;


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
     * Set videoToken
     *
     * @param string $videoToken
     * @return Customer
     */
    public function setVideoToken($videoToken)
    {
        $this->videoToken = $videoToken;

        return $this;
    }

    /**
     * Get videoToken
     *
     * @return string 
     */
    public function getVideoToken()
    {
        return $this->videoToken;
    }

    /**
     * Set courseId
     *
     * @param integer $courseId
     * @return Customer
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;

        return $this;
    }

    /**
     * Get courseId
     *
     * @return integer 
     */
    public function getCourseId()
    {
        return $this->courseId;
    }
}
