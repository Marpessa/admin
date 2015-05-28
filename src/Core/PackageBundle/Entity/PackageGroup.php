<?php

namespace Core\PackageBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Core\PackageBundle\Repository\PackageGroupRepository")
 * @ORM\Table(name="package_group")
 */
class PackageGroup {

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
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "Votre icône doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre icône ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $icon;

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
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

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
     * @Gedmo\SortablePosition
     * @ORM\Column(name="default_position", type="integer")
     */
    private $default_position;


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
     * Set version
     *
     * @param string $version
     * @return PackageGroup
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
     * Set title
     *
     * @param string $title
     * @return PackageGroup
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
     * Set slug
     *
     * @param string $slug
     * @return PackageGroup
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return PackageGroup
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
     * @return PackageGroup
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
     * Set creation_user_id
     *
     * @param \Core\UserBundle\Entity\User $creationUserId
     * @return PackageGroup
     */
    public function setCreationUserId(\Core\UserBundle\Entity\User $creationUserId = null)
    {
        $this->creation_user_id = $creationUserId;

        return $this;
    }

    /**
     * Get creation_user_id
     *
     * @return \Core\UserBundle\Entity\User 
     */
    public function getCreationUserId()
    {
        return $this->creation_user_id;
    }

    /**
     * Set modification_user_id
     *
     * @param \Core\UserBundle\Entity\User $modificationUserId
     * @return PackageGroup
     */
    public function setModificationUserId(\Core\UserBundle\Entity\User $modificationUserId = null)
    {
        $this->modification_user_id = $modificationUserId;

        return $this;
    }

    /**
     * Get modification_user_id
     *
     * @return \Core\UserBundle\Entity\User 
     */
    public function getModificationUserId()
    {
        return $this->modification_user_id;
    }

    /**
     * Set part_id
     *
     * @param \Core\PartBundle\Entity\Part $partId
     * @return PackageGroup
     */
    public function setPartId(\Core\PartBundle\Entity\Part $partId = null)
    {
        $this->part_id = $partId;

        return $this;
    }

    /**
     * Get part_id
     *
     * @return \Core\PartBundle\Entity\Part 
     */
    public function getPartId()
    {
        return $this->part_id;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return PackageGroup
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set default_position
     *
     * @param integer $default_position
     * @return PackageGroup
     */
    public function setDefaultPosition($default_position)
    {
        $this->default_position = $default_position;

        return $this;
    }

    /**
     * Get default_position
     *
     * @return integer 
     */
    public function getDefaultPosition()
    {
        return $this->default_position;
    }
}
