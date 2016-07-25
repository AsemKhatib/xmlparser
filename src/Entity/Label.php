<?php

namespace Xmlparser\src\Entity;

/**
 * @Entity @Table(name="labels")
 **/

class Label
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $gvlId;

    /** @Column(type="string") **/
    protected $labelCode;

    /** @Column(type="string") **/
    protected $labelName;

    /** @Column(type="string") **/
    protected $labelShortName;

    /** @Column(type="string") **/
    protected $gvlMandant;

    /** @Column(type="string") **/
    protected $musikHerkunft;

    /** @Column(type="string") **/
    protected $gvlUseLimits;

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
    public function getGvlId()
    {
        return $this->gvlId;
    }

    /**
     * @param mixed $gvlId
     */
    public function setGvlId($gvlId)
    {
        $this->gvlId = $gvlId;
    }

    /**
     * @return mixed
     */
    public function getLabelCode()
    {
        return $this->labelCode;
    }

    /**
     * @param mixed $labelCode
     */
    public function setLabelCode($labelCode)
    {
        $this->labelCode = $labelCode;
    }

    /**
     * @return mixed
     */
    public function getLabelName()
    {
        return $this->labelName;
    }

    /**
     * @param mixed $labelName
     */
    public function setLabelName($labelName)
    {
        $this->labelName = $labelName;
    }

    /**
     * @return mixed
     */
    public function getLabelShortName()
    {
        return $this->labelShortName;
    }

    /**
     * @param mixed $labelShortName
     */
    public function setLabelShortName($labelShortName)
    {
        $this->labelShortName = $labelShortName;
    }

    /**
     * @return mixed
     */
    public function getGvlMandant()
    {
        return $this->gvlMandant;
    }

    /**
     * @param mixed $gvlMandant
     */
    public function setGvlMandant($gvlMandant)
    {
        $this->gvlMandant = $gvlMandant;
    }

    /**
     * @return mixed
     */
    public function getMusikHerkunft()
    {
        return $this->musikHerkunft;
    }

    /**
     * @param mixed $musikHerkunft
     */
    public function setMusikHerkunft($musikHerkunft)
    {
        $this->musikHerkunft = $musikHerkunft;
    }

    /**
     * @return mixed
     */
    public function getGvlUseLimits()
    {
        return $this->gvlUseLimits;
    }

    /**
     * @param mixed $gvlUseLimits
     */
    public function setGvlUseLimits($gvlUseLimits)
    {
        $this->gvlUseLimits = $gvlUseLimits;
    }
}