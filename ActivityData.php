<?php
class ActivityData {
    private $activity_id;
    private $time;
    private $cardio_frequency;
    private $latitude;
    private $longitude;
    private $altitude;

    public function __construct() {}

    public function init($activity_id, $time, $cardio_frequency, $latitude, $longitude, $altitude) {
        $this->activity_id = $activity_id;
        $this->time = $time;
        $this->cardio_frequency = $cardio_frequency;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
    }

    public function getActivityId() {
        return $this->activity_id;
    }

    public function getTime() {
        return $this->time;
    }

    public function getCardiofrequency() {
        return $this->cardio_frequency;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }

    public function getAltitude() {
        return $this->altitude;
    }

    public function __toString() {
        return $this->activity_id . " " . $this->time . " " . $this->cardio_frequency . " " . $this->latitude . " " . $this->longitude . " " . $this->altitude;
    }
}

?>