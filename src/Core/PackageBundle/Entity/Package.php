<?php

namespace Core\PackageBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Core\PackageBundle\Repository\PackageRepository")
 * @ORM\Table(name="package")
 */
class Package {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8, nullable=false, options={"default":"1.0.0"})
     * @Assert\NotBlank
     */
    private $version;

    /**
     * @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "Votre titre doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre titre ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "Votre description doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre description ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
     */
    private $is_published;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="creation_user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $creation_user_id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="modification_user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $modification_user_id;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     * @Assert\NotBlank()
     */
    private $link;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $has_unique_part_package;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @var PackageGroup
     *
     * @ORM\ManyToOne(targetEntity="Core\PackageBundle\Entity\PackageGroup")
     * @ORM\JoinColumn(name="package_group_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $package_group_id;

    /**
     * @ORM\ManyToMany(targetEntity="Core\PackageBundle\Entity\PackageOption", cascade={"persist"})
     * @ORM\JoinTable(name="package_package_option")
     */
    private $options;


    public function __construct()
    {
      $this->options = new \Doctrine\Common\Collections\ArrayCollection();
    }


    public function __toString()
    {
        return $this->title;
    }

    /**
     * Set id
     *
     * @param integer
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set datetime_event
     *
     * @param datetime $datetimeEvent
     */
    public function setDatetimeEvent($datetimeEvent)
    {
        $this->datetime_event = $datetimeEvent;
    }

    /**
     * Get datetime_event
     *
     * @return datetime 
     */
    public function getDatetimeEvent()
    {
        return $this->datetime_event;
    }

    /**
     * Set is_published
     *
     * @param boolean $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->is_published = $isPublished;
    }

    /**
     * Get is_published
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->is_published;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set has_unique_part_package
     *
     * @param boolean $has_unique_part_package
     */
    public function setHasUniquePartPackage($hasUniquePartPackage)
    {
        $this->has_unique_part_package = $hasUniquePartPackage;
    }

    /**
     * Get has_unique_part_package
     *
     * @return boolean 
     */
    public function getHasUniquePartPackage()
    {
        return $this->has_unique_part_package;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set creation_user_id
     *
     * @param Core\UserBundle\Entity\User $creationUserId
     */
    public function setCreationUserId(\Core\UserBundle\Entity\User $creationUserId)
    {
        $this->creation_user_id = $creationUserId;
    }

    /**
     * Get creation_user_id
     *
     * @return Core\UserBundle\Entity\User 
     */
    public function getCreationUserId()
    {
        return $this->creation_user_id;
    }

    /**
     * Set modification_user_id
     *
     * @param Core\UserBundle\Entity\User $modificationUserId
     */
    public function setModificationUserId(\Core\UserBundle\Entity\User $modificationUserId)
    {
        $this->modification_user_id = $modificationUserId;
    }

    /**
     * Get modification_user_id
     *
     * @return Core\UserBundle\Entity\User 
     */
    public function getModificationUserId()
    {
        return $this->modification_user_id;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Package
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Package
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
     * Add options
     *
     * @param \Core\PackageBundle\Entity\PackageOption $options
     * @return Package
     */
    public function addOption(\Core\PackageBundle\Entity\PackageOption $options)
    {
        $this->options[] = $options;

        return $this;
    }

    /**
     * Remove options
     *
     * @param \Core\PackageBundle\Entity\PackageOption $options
     */
    public function removeOption(\Core\PackageBundle\Entity\PackageOption $options)
    {
        $this->options->removeElement($options);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Package
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set package_group_id
     *
     * @param \Core\PackageBundle\Entity\PackageGroup $packageGroupId
     * @return Package
     */
    public function setPackageGroupId(\Core\PackageBundle\Entity\PackageGroup $packageGroupId = null)
    {
        $this->package_group_id = $packageGroupId;

        return $this;
    }

    /**
     * Get package_group_id
     *
     * @return \Core\PackageBundle\Entity\PackageGroup 
     */
    public function getPackageGroupId()
    {
        return $this->package_group_id;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Package
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }
}