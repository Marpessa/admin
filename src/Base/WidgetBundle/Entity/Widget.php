<?php

namespace Base\WidgetBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Widget
 * @ORM\Entity(repositoryClass="Base\WidgetBundle\Repository\WidgetRepository")
 * @ORM\Table(name="widget")
 */
class Widget
{
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
     *      max = "250",
     *      minMessage = "Votre description doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre description ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $description;

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
     * @var datetime $created
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var datetime $updated
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @var PartPackage
     *
     * @ORM\ManyToOne(targetEntity="Core\PackageBundle\Entity\PartPackage")
     * @ORM\JoinColumn(name="part_package_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $partPackageId;


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
     * @return Widget
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
     * @return Widget
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
     * @return Widget
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Widget
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
     * @return Widget
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
     * Set slug
     *
     * @param string $slug
     * @return Widget
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
     * Set creationUserId
     *
     * @param \Core\UserBundle\Entity\User $creationUserId
     * @return Widget
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
     * @return Widget
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
     * Set partPackageId
     *
     * @param \Core\PackageBundle\Entity\PartPackage $partPackageId
     * @return Widget
     */
    public function setPartPackageId(\Core\PackageBundle\Entity\PartPackage $partPackageId = null)
    {
        $this->partPackageId = $partPackageId;

        return $this;
    }

    /**
     * Get partPackageId
     *
     * @return \Core\PackageBundle\Entity\PartPackage 
     */
    public function getPartPackageId()
    {
        return $this->partPackageId;
    }
}
