<?php

namespace Base\TemplateBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Template
 * @ORM\Entity(repositoryClass="Base\TemplateBundle\Repository\TemplateRepository")
 * @ORM\Table(name="template")
 */
class Template
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
    private $creation_user_id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="modification_user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $modification_user_id;

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
    private $part_package_id;

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
     * @return Template
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
     * @return Template
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
     * @return Template
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
     * @return Template
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
     * @return Template
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
     * @return Template
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
     * Set creation_user_id
     *
     * @param \Core\UserBundle\Entity\User $creationUserId
     * @return Template
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
     * @return Template
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
     * Set part_package_id
     *
     * @param \Core\PackageBundle\Entity\PartPackage $partPackageId
     * @return Article
     */
    public function setPartPackageId(\Core\PackageBundle\Entity\PartPackage $partPackageId = null)
    {
        $this->part_package_id = $partPackageId;

        return $this;
    }

    /**
     * Get part_package_id
     *
     * @return \Core\PackageBundle\Entity\PartPackage 
     */
    public function getPartPackageId()
    {
        return $this->part_package_id;
    }
}
