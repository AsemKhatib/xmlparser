<?php

namespace Xmlparser\src\Entity;

/**
 * @Entity @Table(name="tracks")
 **/

class Track
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $trk_manr;

    /** @Column(type="string") **/
    protected $trk_track;

    /** @Column(type="string") **/
    protected $lbl_labelcode;

    /** @Column(type="string") **/
    protected $lbl_label;

    /** @Column(type="string") **/
    protected $trk_isrc;

    /** @Column(type="string") **/
    protected $trk_catalogno;

    /** @Column(type="string") **/
    protected $trk_ean;

    /** @Column(type="string") **/
    protected $trk_release_date;

    /** @Column(type="string") **/
    protected $trk_composer;

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
     * @return string
     */
    public function getTrkManr()
    {
        return $this->trk_manr;
    }

    /**
     * @param string $trk_manr
     */
    public function setTrkManr($trk_manr)
    {
        $this->trk_manr = $trk_manr;
    }

    /**
     * @return string
     */
    public function getTrkTrack()
    {
        return $this->trk_track;
    }

    /**
     * @param string $trk_track
     */
    public function setTrkTrack($trk_track)
    {
        $this->trk_track = $trk_track;
    }

    /**
     * @return string
     */
    public function getLblLabelcode()
    {
        return $this->lbl_labelcode;
    }

    /**
     * @param string $lbl_labelcode
     */
    public function setLblLabelcode($lbl_labelcode)
    {
        $this->lbl_labelcode = $lbl_labelcode;
    }

    /**
     * @return string
     */
    public function getLblLabel()
    {
        return $this->lbl_label;
    }

    /**
     * @param string $lbl_label
     */
    public function setLblLabel($lbl_label)
    {
        $this->lbl_label = $lbl_label;
    }

    /**
     * @return string
     */
    public function getTrkIsrc()
    {
        return $this->trk_isrc;
    }

    /**
     * @param string $trk_isrc
     */
    public function setTrkIsrc($trk_isrc)
    {
        $this->trk_isrc = $trk_isrc;
    }

    /**
     * @return string
     */
    public function getTrkCatalogno()
    {
        return $this->trk_catalogno;
    }

    /**
     * @param string $trk_catalogno
     */
    public function setTrkCatalogno($trk_catalogno)
    {
        $this->trk_catalogno = $trk_catalogno;
    }

    /**
     * @return string
     */
    public function getTrkEan()
    {
        return $this->trk_ean;
    }

    /**
     * @param string $trk_ean
     */
    public function setTrkEan($trk_ean)
    {
        $this->trk_ean = $trk_ean;
    }

    /**
     * @return string
     */
    public function getTrkReleaseDate()
    {
        return $this->trk_release_date;
    }

    /**
     * @param string $trk_release_date
     */
    public function setTrkReleaseDate($trk_release_date)
    {
        $this->trk_release_date = $trk_release_date;
    }

    /**
     * @return string
     */
    public function getTrkComposer()
    {
        return $this->trk_composer;
    }

    /**
     * @param string $trk_composer
     */
    public function setTrkComposer($trk_composer)
    {
        $this->trk_composer = $trk_composer;
    }

}