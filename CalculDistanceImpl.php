<?php
class CalculDistanceImpl implements CalculDistance {

    /**
     * @inheritDoc
     */
    public function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float {
        $r = 6378.137;
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $long1 = deg2rad($long1);
        $long2 = deg2rad($long2);

        return $r * acos(sin($lat2)*sin($lat1)+cos($lat2)*cos($lat1)*cos($long2-$long1));
    }

    /**
     * @inheritDoc
     */
    public function calculDistanceTrajet(array $parcours): float {
        $ret = 0.0;
        for ($i = 0; $i <= count($parcours) - 3; $i++) {
            $ret += $this->calculDistance2PointsGPS($parcours[0+$i], $parcours[1+$i], $parcours[2+$i], $parcours[3+$i]);
        }
        return $ret;
    }
}