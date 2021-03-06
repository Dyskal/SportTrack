const deg2rad = deg => (deg * Math.PI) / 180.0;

export function calculDistance2PointsGPS(lat1, long1, lat2, long2) {
    return 6378137 * Math.acos(Math.sin(deg2rad(lat2)) * Math.sin(deg2rad(lat1)) + Math.cos(deg2rad(lat2)) * Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(long2) - deg2rad(long1)));
}

export function calculDistanceTrajet(parcours) {
    let ret = 0.0;
    for (let i = 1; i < parcours.length; i++) {
        ret += calculDistance2PointsGPS(parcours[i-1]['latitude'], parcours[i-1]['longitude'], parcours[i]['latitude'], parcours[i]['longitude']);
    }
    return ret.toFixed(1);
}

export let array = [
    {"time": "13:00:00", "cardio_frequency": 99, "latitude": 47.644795, "longitude": -2.776605, "altitude": 18},
    {"time": "13:00:05", "cardio_frequency": 100, "latitude": 47.646870, "longitude": -2.778911, "altitude": 18},
    {"time": "13:00:10", "cardio_frequency": 102, "latitude": 47.646197, "longitude": -2.780220, "altitude": 18},
    {"time": "13:00:15", "cardio_frequency": 100, "latitude": 47.646992, "longitude": -2.781068, "altitude": 17},
    {"time": "13:00:20", "cardio_frequency": 98, "latitude": 47.647867, "longitude": -2.781744, "altitude": 16},
    {"time": "13:00:25", "cardio_frequency": 103, "latitude": 47.648510, "longitude": -2.780145, "altitude": 16}
]
