<?php

namespace Core\PackageBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Core\PackageBundle\Repository\PartPackageRepository")
 * @ORM\Table(name="part_package")
 */
class PartPackage {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Part
     *
     * @ORM\ManyToOne(targetEntity="Core\PartBundle\Entity\Part")
     * @ORM\JoinColumn(name="part_id", referencedColumnName="id")
     */
    private $part_id;

    /**
     * @var Package
     *
     * @ORM\ManyToOne(targetEntity="Core\PackageBundle\Entity\Package")
     * @ORM\JoinColumn(name="package_id", referencedColumnName="id")
     */
    private $package_id;

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
     * @ORM\Column(name="position", type="integer")
     */
    private $position;


    /**
     * Set version
     *
     * @param string $version
     * @return PartPackage
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
     * @return PartPackage
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
     * @return PartPackage
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
     * Set is_published
     *
     * @param boolean $isPublished
     * @return PartPackage
     */
    public function setIsPublished($isPublished)
    {
        $this->is_published = $isPublished;

        return $this;
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
     * @return PartPackage
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
     * @return PartPackage
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
     * @return PartPackage
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
     * Set position
     *
     * @param integer $position
     * @return PartPackage
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
     * Set part_id
     *
     * @param \Core\PartBundle\Entity\Part $partId
     * @return PartPackage
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
     * Set package_id
     *
     * @param \Core\PackageBundle\Entity\Package $packageId
     * @return PartPackage
     */
    public function setPackageId(\Core\PackageBundle\Entity\Package $packageId = null)
    {
        $this->package_id = $packageId;

        return $this;
    }

    /**
     * Get package_id
     *
     * @return \Core\PackageBundle\Entity\Package 
     */
    public function getPackageId()
    {
        return $this->package_id;
    }

    /**
     * Set creation_user_id
     *
     * @param \Core\UserBundle\Entity\User $creationUserId
     * @return PartPackage
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
     * @return PartPackage
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
