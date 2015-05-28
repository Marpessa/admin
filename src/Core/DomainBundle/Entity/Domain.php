<?php

namespace Core\DomainBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Core\DomainBundle\Repository\DomainRepository")
 * @ORM\Table(name="domain")
 */
class Domain {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "Votre url doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre url ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $url;

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
     * @Gedmo\Slug(fields={"url"})
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
    

    public function __toString()
    {
        return $this->url;
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
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
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

}
