<?php

namespace KapitchiLocation\Entity;

/**
 * http://opensocial-resources.googlecode.com/svn/spec/2.0.1/Social-Data.xml#Address
 */
class Address implements HasLatLngInterface {
    protected $id;
    protected $building;
    protected $floor;
    protected $latitude;
    protected $longitude;
    protected $postalCode;
    protected $streetAddress;
    protected $note;
    protected $divisionId;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBuilding()
    {
        return $this->building;
    }

    public function setBuilding($building)
    {
        $this->building = $building;
    }

    public function getFloor()
    {
        return $this->floor;
    }

    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getDivisionId()
    {
        return $this->divisionId;
    }

    public function setDivisionId($divisionId)
    {
        $this->divisionId = $divisionId;
    }


}