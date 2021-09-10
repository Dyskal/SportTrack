--User(email (1), password (NN), lname (NN), fname (NN), bdate (NN), gender (NN), height (NN), weight (NN))
--Activity(id (1), user_id=@User.email (NN), date (NN), description (NN), start_time, duration, distance, freq_min, freq_max, freq_avg)
--ActivityData(activity_id=@Activity.id (NN), time (NN), cardio_frequency (NN), latitude (NN), longitude (NN), altitude (NN))

PRAGMA foreign_keys = ON;
DROP TABLE IF EXISTS ActivityData;
DROP TABLE IF EXISTS Activity;
DROP TABLE IF EXISTS User;

CREATE TABLE User (
	email TEXT NOT NULL PRIMARY KEY
	    CHECK(email LIKE '%_@__%.__%'),
	password TEXT NOT NULL
        CHECK(LENGTH(password) >= 8),
	lname TEXT NOT NULL
        CHECK(lname NOT LIKE ''),
	fname TEXT NOT NULL
        CHECK(fname NOT LIKE ''),
	bdate DATE NOT NULL
        CHECK(bdate IS DATE(bdate)),
    gender TEXT NOT NULL
        CHECK(gender IN ('M', 'W', 'O')),
	height INTEGER NOT NULL
        CHECK(height > 0),
	weight INTEGER NOT NULL
        CHECK(height > 0)
);

CREATE TABLE Activity (
	id INTEGER PRIMARY KEY,
	user_id TEXT NOT NULL,
	date DATE NOT NULL
        CHECK(date IS DATE(date)),
	description TEXT NOT NULL
        CHECK(description NOT LIKE ''),
    start_time TIME
        CHECK(start_time IS TIME(start_time)),
    duration TIME
        CHECK(duration IS TIME(duration)),
    distance REAL
        CHECK(distance >= 0),
    freq_min INTEGER
          CHECK(freq_min > 0),
    freq_max INTEGER
          CHECK(freq_max > 0),
    freq_avg REAL
          CHECK(freq_avg > 0),
    FOREIGN KEY(user_id) REFERENCES User(email)
);

CREATE TABLE ActivityData (
    data_id INTEGER PRIMARY KEY,
    activity_id INTEGER NOT NULL,
    time TIME NOT NULL
        CHECK(time IS TIME(time)),
    cardio_frequency INTEGER NOT NULL
        CHECK(cardio_frequency > 0),
    latitude REAL NOT NULL
        CHECK(latitude NOT LIKE ''),
    longitude REAL NOT NULL
        CHECK(longitude NOT LIKE ''),
    altitude INTEGER NOT NULL
        CHECK(altitude NOT LIKE ''),
    FOREIGN KEY(activity_id) REFERENCES Activity(id)
);

CREATE TRIGGER cardio_frequency_values
    AFTER INSERT ON ActivityData
BEGIN
    UPDATE Activity SET freq_min = (SELECT MIN(cardio_frequency) FROM ActivityData WHERE activity_id = id);
    UPDATE Activity SET freq_max = (SELECT MAX(cardio_frequency) FROM ActivityData WHERE activity_id = id);
    UPDATE Activity SET freq_avg = (SELECT AVG(cardio_frequency) FROM ActivityData WHERE activity_id = id);
END;

CREATE TRIGGER activity_computed_values
    AFTER INSERT ON ActivityData
BEGIN
    UPDATE Activity SET start_time = (SELECT MIN(time) FROM ActivityData WHERE activity_id = id);
    UPDATE Activity SET duration = (SELECT TIME(CAST((JULIANDAY(MAX(time)) - JULIANDAY(MIN(time))) AS TIME), '12:00') FROM ActivityData WHERE activity_id = id);
    UPDATE Activity SET distance = (SELECT ROUND(6378.137 * ACOS(SIN(RADIANS(47.646870))*SIN(RADIANS(47.644795))+COS(RADIANS(47.646870))*COS(RADIANS(47.644795))*COS(RADIANS(-2.778911) - RADIANS(-2.776605))), 3) FROM ActivityData WHERE activity_id = id);
END;
