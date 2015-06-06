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
     * @ORM\Column(name="is_published")
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
     */
    private $isPublished;

    /**
     * @var User
     *
     * @ORM\Column(name="creation_user_id")
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="creation_user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $creationUserId;

    /**
     * @var User
     *
     * @ORM\Column(name="modification_user_id")
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="modification_user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $modificationUserId;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(name="entity_name", type="string", length=128, nullable=false)
     * @Assert\NotBlank()
     */
    private $entityName;
    
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
     * @ORM\Column(name="package_group_id")
     * @ORM\ManyToOne(targetEntity="Core\PackageBundle\Entity\PackageGroup")
     * @ORM\JoinColumn(name="package_group_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $packageGroupId;

    /**
     * @ORM\Column(name="options")
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
     * Set isPublished
     *
     * @param boolean $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * Get isPublished
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->isPublished;
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
     * Set entityName
     *
     * @param string $entityName
     */
    public function setEntityName($entityName)
    {
        $this->entityName = $entityName;
    }

    /**
     * Get entityName
     *
     * @return string 
     */
    public function getEntityName()
    {
        return $this->entityName;
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
     * Set creationUserId
     *
     * @param Core\UserBundle\Entity\User $creationUserId
     */
    public function setCreationUserId(\Core\UserBundle\Entity\User $creationUserId)
    {
        $this->creationUserId = $creationUserId;
    }

    /**
     * Get creationUserId
     *
     * @return Core\UserBundle\Entity\User 
     */
    public function getCreationUserId()
    {
        return $this->creationUserId;
    }

    /**
     * Set modificationUserId
     *
     * @param Core\UserBundle\Entity\User $modificationUserId
     */
    public function setModificationUserId(\Core\UserBundle\Entity\User $modificationUserId)
    {
        $this->modificationUserId = $modificationUserId;
    }

    /**
     * Get modificationUserId
     *
     * @return Core\UserBundle\Entity\User 
     */
    public function getModificationUserId()
    {
        return $this->modificationUserId;
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
     * Set packageGroupId
     *
     * @param \Core\PackageBundle\Entity\PackageGroup $packageGroupId
     * @return Package
     */
    public function setPackageGroupId(\Core\PackageBundle\Entity\PackageGroup $packageGroupId = null)
    {
        $this->packageGroupId = $packageGroupId;

        return $this;
    }

    /**
     * Get packageGroupId
     *
     * @return \Core\PackageBundle\Entity\PackageGroup 
     */
    public function getPackageGroupId()
    {
        return $this->packageGroupId;
    }
}
