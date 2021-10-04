
import { calculDistance2PointsGPS } from './fonctions.js';
import { calculDistanceTrajet } from './fonctions.js';

function CalculDistance() {};

CalculDistance.prototype.calculDistance2PointsGPS = function (lat1,long1,lat2,long2) {
    calculDistance2PointsGPS(lat1,long1,lat2,long2)
};
CalculDistance.prototype.calculDistanceTrajet = function (parcours) {
    calculDistanceTrajet();
};


console.log(calculDistanceTrajet(array))