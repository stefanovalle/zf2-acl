<?php

namespace Conferences\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Permissions\Acl\Resource\ResourceInterface;

/**
 * Conferences\Entity\Conference
 *
 * @ORM\Table(name="conference")
 * @ORM\Entity(repositoryClass="Conferences\Entity\Repository\ConferenceRepository")
 *
 */
class Conference implements ResourceInterface {

	/**
	 * @var integer $id
	 *
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="SEQUENCE")
	 * @ORM\SequenceGenerator(sequenceName="conference_id_seq", allocationSize=1, initialValue=1)
	 */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string $abstract
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $abstract;

    /**
     * @var \DateTime $datefrom
     *
     * @ORM\Column(type="date", nullable=false)
     */
    private $datefrom;

    /**
     * @var \DateTime $dateto
     *
     * @ORM\Column(type="date", nullable=false)
     */
    private $dateto;
    
    /**
     * @var string $city
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var \Application\Entity\Systemuser
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Systemuser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner_id", referencedColumnName="id", nullable=false)
     * })
     */
    protected $owner;
    

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
     * @return Conference
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
     * Set abstract
     *
     * @param string $abstract
     * @return Conference
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string 
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set datefrom
     *
     * @param \DateTime $datefrom
     * @return Conference
     */
    public function setDatefrom($datefrom)
    {
        $this->datefrom = $datefrom;

        return $this;
    }

    /**
     * Get datefrom
     *
     * @return \DateTime 
     */
    public function getDatefrom()
    {
        return $this->datefrom;
    }

    /**
     * Set dateto
     *
     * @param \DateTime $dateto
     * @return Conference
     */
    public function setDateto($dateto)
    {
        $this->dateto = $dateto;

        return $this;
    }

    /**
     * Get dateto
     *
     * @return \DateTime 
     */
    public function getDateto()
    {
        return $this->dateto;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Conference
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Set owner
     *
     * @param Systemuser $owner
     * @return Conference
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return Systemuser
     */
    public function getOwner()
    {
        return $this->owner;
    }
    
    // Needed by ResourceInterface interface
    public function getResourceId(){
        return 'Conference';
    }
    
}
