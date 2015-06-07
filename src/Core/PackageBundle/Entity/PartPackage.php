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
    private $partId;

    /**
     * @var Package
     *
     * @ORM\ManyToOne(targetEntity="Core\PackageBundle\Entity\Package")
     * @ORM\JoinColumn(name="package_id", referencedColumnName="id")
     */
    private $packageId;

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
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="creation_user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $creationUserId;

    /**
     * @var User
     *
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
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return PartPackage
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
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
     * Set partId
     *
     * @param \Core\PartBundle\Entity\Part $partId
     * @return PartPackage
     */
    public function setPartId(\Core\PartBundle\Entity\Part $partId = null)
    {
        $this->partId = $partId;

        return $this;
    }

    /**
     * Get partId
     *
     * @return \Core\PartBundle\Entity\Part 
     */
    public function getPartId()
    {
        return $this->partId;
    }

    /**
     * Set packageId
     *
     * @param \Core\PackageBundle\Entity\Package $packageId
     * @return PartPackage
     */
    public function setPackageId(\Core\PackageBundle\Entity\Package $packageId = null)
    {
        $this->packageId = $packageId;

        return $this;
    }

    /**
     * Get package_id
     *
     * @return \Core\PackageBundle\Entity\Package 
     */
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * Set creationUserId
     *
     * @param \Core\UserBundle\Entity\User $creationUserId
     * @return PartPackage
     */
    public function setCreationUserId(\Core\UserBundle\Entity\User $creationUserId = null)
    {
        $this->creationUserId = $creationUserId;

        return $this;
    }

    /**
     * Get creationUserId
     *
     * @return \Core\UserBundle\Entity\User 
     */
    public function getCreationUserId()
    {
        return $this->creationUserId;
    }

    /**
     * Set modificationUserId
     *
     * @param \Core\UserBundle\Entity\User $modificationUserId
     * @return PartPackage
     */
    public function setModificationUserId(\Core\UserBundle\Entity\User $modificationUserId = null)
    {
        $this->modificationUserId = $modificationUserId;

        return $this;
    }

    /**
     * Get modificationUserId
     *
     * @return \Core\UserBundle\Entity\User 
     */
    public function getModificationUserId()
    {
        return $this->modificationUserId;
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
