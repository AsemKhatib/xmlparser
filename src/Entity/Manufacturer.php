<?php

namespace Xmlparser\src\Entity;

/**
 * @Entity @Table(name="manufacturers")
 **/

class Manufacturers
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $gvlCode;

    /** @Column(type="string") **/
    protected $name1;

    /** @Column(type="string") **/
    protected $name2;

    /** @Column(type="string") **/
    protected $name3;

    /** @Column(type="string") **/
    protected $street;

    /** @Column(type="string") **/
    protected $countryCode;

    /** @Column(type="string") **/
    protected $zip;

    /** @Column(type="string") **/
    protected $location;

    /** @Column(type="string") **/
    protected $postBox;

    /** @Column(type="string") **/
    protected $phone;

    /** @Column(type="string") **/
    protected $fax;

    /** @Column(type="string") **/
    protected $IfpiAccount;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGvlCode()
    {
        return $this->gvlCode;
    }

    /**
     * @param mixed $gvlCode
     */
    public function setGvlCode($gvlCode)
    {
        $this->gvlCode = $gvlCode;
    }

    /**
     * @return mixed
     */
    public function getName1()
    {
        return $this->name1;
    }

    /**
     * @param mixed $name1
     */
    public function setName1($name1)
    {
        $this->name1 = $name1;
    }

    /**
     * @return mixed
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * @param mixed $name2
     */
    public function setName2($name2)
    {
        $this->name2 = $name2;
    }

    /**
     * @return mixed
     */
    public function getName3()
    {
        return $this->name3;
    }

    /**
     * @param mixed $name3
     */
    public function setName3($name3)
    {
        $this->name3 = $name3;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param mixed $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getPostBox()
    {
        return $this->postBox;
    }

    /**
     * @param mixed $postBox
     */
    public function setPostBox($postBox)
    {
        $this->postBox = $postBox;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return mixed
     */
    public function getIfpiAccount()
    {
        return $this->IfpiAccount;
    }

    /**
     * @param mixed $IfpiAccount
     */
    public function setIfpiAccount($IfpiAccount)
    {
        $this->IfpiAccount = $IfpiAccount;
    }
}