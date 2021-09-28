<?php
class Activity {
    private $id;
    private $user_id;
    private $date;
    private $description;
    private $start_time;
    private $duration;
    private $distance;
    private $freq_min;
    private $freq_max;
    private $freq_avg;

    public function __construct() {}

    public function init($id, $user_id, $date, $description, $start_time, $duration, $distance, $freq_min, $freq_max, $freq_avg) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->date = $date;
        $this->description = $description;
        $this->start_time = $start_time;
        $this->duration = $duration;
        $this->distance = $distance;
        $this->freq_min = $freq_min;
        $this->freq_max = $freq_max;
        $this->freq_avg = $freq_avg;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStartTime() {
        return $this->start_time;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function setDistance($distance): void {
        $this->distance = $distance;
    }

    public function getFreqmin() {
        return $this->freq_min;
    }

    public function getFreqmax() {
        return $this->freq_max;
    }

    public function getFreqavg() {
        return $this->freq_avg;
    }

    public function __toString() {
        return $this->id . " " . $this->user_id . " " . $this->date . " " . $this->description . " " . $this->start_time . " " . $this->duration . " " . $this->freq_min . " " . $this->freq_max . " " . $this->freq_avg;
    }
}
?>