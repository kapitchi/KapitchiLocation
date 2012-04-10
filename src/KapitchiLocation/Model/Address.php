<?php

namespace KapitchiLocation\Model;

use ZfcBase\Model\ModelAbstract;

/**
 * http://opensocial-resources.googlecode.com/svn/spec/2.0.1/Social-Data.xml#Address
 */
class Address extends ModelAbstract {
    protected $id;
    protected $building;
    protected $country;
    protected $floor;
    protected $latitude;
    protected $longitude;
    protected $locality;
    protected $postalCode;
    protected $region;
    protected $streetAddress;
    //protected $type;//The address type or label. Examples include 'work', 'home'.
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getBuilding() {
        return $this->building;
    }

    public function setBuilding($building) {
        $this->building = $building;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        //check country code here!
        $this->country = $country;
    }

    public function getFloor() {
        return $this->floor;
    }

    public function setFloor($floor) {
        $this->floor = $floor;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    public function getLocality() {
        return $this->locality;
    }

    public function setLocality($locality) {
        $this->locality = $locality;
    }

    public function getPostalCode() {
        return $this->postalCode;
    }

    public function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;
    }

    public function getRegion() {
        return $this->region;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    public function getStreetAddress() {
        return $this->streetAddress;
    }

    public function setStreetAddress($streetAddress) {
        $this->streetAddress = $streetAddress;
    }

//    public function getType() {
//        return $this->type;
//    }
//
//    public function setType($type) {
//        $this->type = $type;
//    }


}