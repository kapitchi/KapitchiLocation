<?php

namespace KapitchiLocation\Model;

interface HasLatLngInterface {
    public function getLatitude();
    public function getLongitude();
}