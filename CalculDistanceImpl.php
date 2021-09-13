<?php
class CalculDistanceImpl implements CalculDistance {

    /* racine carree de (xa-xb)^2 + (yb-ya)^2 */
    /**
     * @inheritDoc
     */
    public function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float {
        // TODO: Implement calculDistance2PointsGPS() method.
        $r = 6378.137;
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $long1 = deg2rad($long1);
        $long2 = deg2rad($long2);

        $d = $r * arccos(sin($lat2)*sin($lat1)+cos($lat2)*cos($lat1)*cos($long2-$long1));
        return $d;
    }

    /**
     * @inheritDoc
     */
    public function calculDistanceTrajet(array $parcours): float {
        // TODO: Implement calculDistanceTrajet() method.
    }
}