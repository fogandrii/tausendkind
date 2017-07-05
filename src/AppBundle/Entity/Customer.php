<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="customer")
 */
class Customer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="customer_number", length=100)
     */
    private $customerNumber;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prefix;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastname;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="customer", cascade={"persist", "remove", "merge"}, orphanRemoval=true))
     */
    private $addresses;

    /**
     * @ORM\Column(type="datetime", name="created_at", options={"default"=0})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at", options={"default"=0})
     */
    private $updatedAt;

    public function __construct() {
        $this->addresses = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue() {
        $this->setUpdatedAt(new \DateTime());
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
     * Set customerNumber
     *
     * @param string $customerNumber
     *
     * @return Customer
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;

        return $this;
    }

    /**
     * Get customerNumber
     *
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     *
     * @return Customer
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set firsname
     *
     * @param string $firstname
     *
     * @return Customer
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firsname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Customer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Customer
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
     *
     * @return Customer
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
     * Add address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Customer
     */
    public function addAddress(\AppBundle\Entity\Address $address)
    {
        $this->addresses[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \AppBundle\Entity\Address $address
     */
    public function removeAddress(\AppBundle\Entity\Address $address)
    {
        $this->addresses->removeElement($address);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

//    /**
//     * Triggered on insert
//     * @ORM\PrePersist
//     */
//    public function onPrePersist()
//    {
//        $this->createdAt = new \DateTime("now");
//    }
//    /**
//     * Triggered on update
//     * @ORM\PreUpdate
//     */
//    public function onPreUpdate()
//    {
//        $this->updatedAt = new \DateTime("now");
//    }
}
