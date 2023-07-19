<?php

declare(strict_types=1);

namespace app\entities\banner;

use app\libraries\DateUtils;
use app\libraries\Core;
use app\models\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class BannerImage
 * @package app\entities
 * @ORM\Entity(repositoryClass="\app\repositories\banner\BannerImageRepository")
 * @ORM\Table(name="banner_images")
 */
class BannerImage {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(type="datetimetz")
     * @var \DateTime
     */
    protected $release_date;

    /**
     * @ORM\Column(type="datetimetz")
     * @var \DateTime
     */

    protected $closing_date;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $extra_info;


    public function __construct(string $name, string $extra_info_name) {


        $dateString = "2023-07-18 12:45:30+0500";

        // Create a DateTime object from the string using DateTime constructor
        $dateTime = new DateTime($dateString);

        // Get the timezone offset part from the string (e.g., "+0500")
        $timezoneOffset = substr($dateString, -5);

        // Create a DateTimeZone object from the timezone offset
        $dateTimeZone = new DateTimeZone($timezoneOffset);

        $this->setName($name);
        $this->setExtraInfo($extra_info_name);
    }


    public function setReleaseDate(\DateTime $release_date): void {
        // Convert the DateTime object to a string in the correct format
        $this->release_date = $release_date->format('Y-m-d H:i:sO');
    }

    public function setClosingDate(\DateTime $closing_date): void {
        // Convert the DateTime object to a string in the correct format
        $this->closing_date = $closing_date->format('Y-m-d H:i:sO');
    }

    public function setName(string $name): void {
        $this->name = $name;
    }
    public function setExtraInfo(string $name): void {
        $this->extra_info = $name;
    }
}