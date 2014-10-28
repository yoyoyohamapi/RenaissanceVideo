<?php

namespace Video\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Video
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
     * @var integer
     *
     * @ORM\Column(name="video_index", type="integer")
     */
    private $videoIndex;

    /**
     * @var string
     *
     * @ORM\Column(name="video_name", type="string", length=40)
     */
    private $videoName;

    /**
     * @var string
     *
     * @ORM\Column(name="video_url", type="string", length=160)
     */
    private $videoUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="video_uptime", type="datetime")
     */
    private $videoUptime;

    /**
     * @var string
     *
     * @ORM\Column(name="video_size", type="string", length=40)
     */
    private $videoSize;

    /**
     * @var string
     *
     * @ORM\Column(name="video_type", type="string", length=20)
     */
    private $videoType;

    /**
     * @var string
     *
     * @ORM\Column(name="video_cover", type="string", length=160)
     */
    private $videoCover;

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
     * Set videoIndex
     *
     * @param integer $videoIndex
     * @return Video
     */
    public function setVideoIndex($videoIndex)
    {
        $this->videoIndex = $videoIndex;

        return $this;
    }

    /**
     * Get videoIndex
     *
     * @return integer
     */
    public function getVideoIndex()
    {
        return $this->videoIndex;
    }

    /**
     * Set videoName
     *
     * @param string $videoName
     * @return Video
     */
    public function setVideoName($videoName)
    {
        $this->videoName = $videoName;

        return $this;
    }

    /**
     * Get videoName
     *
     * @return string 
     */
    public function getVideoName()
    {
        return $this->videoName;
    }

    /**
     * Set videoUrl
     *
     * @param string $videoUrl
     * @return Video
     */
    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

    /**
     * Get videoUrl
     *
     * @return string 
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * Set videoUptime
     *
     * @param \DateTime $videoUptime
     * @return Video
     */
    public function setVideoUptime($videoUptime)
    {
        $this->videoUptime = $videoUptime;

        return $this;
    }

    /**
     * Get videoUptime
     *
     * @return \DateTime 
     */
    public function getVideoUptime()
    {
        return $this->videoUptime;
    }

    /**
     * Set videoSize
     *
     * @param string $videoSize
     * @return Video
     */
    public function setVideoSize($videoSize)
    {
        $this->videoSize = $videoSize;

        return $this;
    }

    /**
     * Get videoSize
     *
     * @return string 
     */
    public function getVideoSize()
    {
        return $this->videoSize;
    }

    /**
     * Set videoType
     *
     * @param string $videoType
     * @return Video
     */
    public function setVideoType($videoType)
    {
        $this->videoType = $videoType;

        return $this;
    }

    /**
     * Get videoType
     *
     * @return string 
     */
    public function getVideoType()
    {
        return $this->videoType;
    }
    /**
     * Set videoCover
     *
     * @param string $videoCover
     * @return Video
     */
    public function setVideoCover($videoCover)
    {
        $this->videoCover = $videoCover;

        return $this;
    }

    /**
     * Get videoCover
     *
     * @return string 
     */
    public function getVideoCover()
    {
        return $this->videoCover;
    }
}
