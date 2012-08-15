<?php

namespace KapitchiLocation\Entity;

interface HasLatLngInterface {
    public function getLatitude();
    public function getLongitude();
}