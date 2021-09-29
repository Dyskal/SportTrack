<?php
require("CalculDistance.php");
class CalculDistanceImpl implements CalculDistance {

    /**
     * @inheritDoc
     */
    public function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2) : float {
        return 6378137 * acos(sin(deg2rad($lat2)) * sin(deg2rad($lat1)) + cos(deg2rad($lat2)) * cos(deg2rad($lat1)) * cos(deg2rad($long2) - deg2rad($long1)));
    }

    /**
     * @inheritDoc
     */
    public function calculDistanceTrajet(array $parcours) : float {
        $ret = 0.0;
        for ($i = 1; $i < sizeof($parcours); $i++) {
            $ret += $this->calculDistance2PointsGPS($parcours[$i-1]['latitude'], $parcours[$i-1]['longitude'], $parcours[$i]['latitude'], $parcours[$i]['longitude']);
        }
        return round($ret, 1);
    }

    public function json_cut(string $array): array {
        $narray = [];
        $array = json_decode($array, true);
        for ($i = 0; $i < sizeof($array); $i++) {
            $narray += array($i => array('latitude' => $array[$i]['latitude'], 'longitude' => $array[$i]['longitude']));
        }
        return $narray;
    }
}
?>