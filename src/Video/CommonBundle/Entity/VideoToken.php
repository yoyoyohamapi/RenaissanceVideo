<?php

namespace Video\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoToken
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class VideoToken
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
     * @return VideoToken
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
}
