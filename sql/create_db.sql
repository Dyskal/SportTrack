--User(email (1), password (NN), lname (NN), fname (NN), date (NN), sex (NN), height (NN), weight (NN))
--Activity(id (1), user_id=@User.email (NN), date (NN), description (NN))
--ActivityData(activity_id=@Activity.id (NN), time (NN), cardio_frequency (NN), latitude (NN), longitude (NN), altitude (NN))

PRAGMA foreign_keys = ON;
DROP TABLE IF EXISTS ActivityData;
DROP TABLE IF EXISTS Activity;
DROP TABLE IF EXISTS User;

CREATE TABLE User (
	email TEXT NOT NULL PRIMARY KEY
	    CHECK(email LIKE '%_@__%.__%'),
	password TEXT NOT NULL
        CHECK(length(password) >= 8),
	lname TEXT NOT NULL
        CHECK(lname NOT LIKE ''),
	fname TEXT NOT NULL
        CHECK(fname NOT LIKE ''),
	date TEXT NOT NULL
        CHECK(date NOT LIKE ''),
	sex TEXT NOT NULL
        CHECK(sex IN ('M', 'W', 'O')),
	height INTEGER NOT NULL
        CHECK(height > 0),
	weight INTEGER NOT NULL
        CHECK(height > 0)
);

CREATE TABLE Activity (
	id INTEGER PRIMARY KEY,
	user_id TEXT NOT NULL,
	date TEXT NOT NULL
        CHECK(date NOT LIKE ''),
	description TEXT NOT NULL
        CHECK(description NOT LIKE ''),
    FOREIGN KEY(user_id) REFERENCES User(email)
);

CREATE TABLE ActivityData (
    activity_id INTEGER NOT NULL,
    time TEXT NOT NULL
        CHECK(time NOT LIKE ''),
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
