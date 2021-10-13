const deg2rad = deg => (deg * Math.PI) / 180.0;

function calculDistance2PointsGPS(lat1, long1, lat2, long2) {
    return 6378137 * Math.acos(Math.sin(deg2rad(lat2)) * Math.sin(deg2rad(lat1)) + Math.cos(deg2rad(lat2)) * Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(long2) - deg2rad(long1)));
}

function calculDistanceTrajet(parcours) {
    let ret = 0.0;
    for (let i = 1; i < parcours.length; i++) {
        ret += calculDistance2PointsGPS(parcours[i-1]['latitude'], parcours[i-1]['longitude'], parcours[i]['latitude'], parcours[i]['longitude']);
    }
    return ret.toFixed(1);
}

module.exports = calculDistanceTrajet;