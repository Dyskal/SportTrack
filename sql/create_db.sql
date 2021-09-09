--User(email (1), password (NN), lname (NN), fname (NN), date (NN), sex (NN), height (NN), weight (NN))
--Activity(id (1), user_id=@User.email (NN), date (NN), description (NN))
--ActivityData(activity_id=@Activity.id (NN), time (NN), cardio_frequency (NN), latitude (NN), longitude (NN), altitude (NN))

PRAGMA foreign_keys = ON;
DROP TABLE IF EXISTS ActivityData;
DROP TABLE IF EXISTS Activity;
DROP TABLE IF EXISTS User;

CREATE TABLE User (
	email TEXT NOT NULL
		CONSTRAINT User_pk
			PRIMARY KEY
		CONSTRAINT email_ck 
			CHECK(email LIKE '%_@__%.__%'),
	password TEXT NOT NULL,
	lname TEXT NOT NULL,
	fname TEXT NOT NULL,
	date TEXT NOT NULL,
	sex TEXT NOT NULL,
	height INTEGER NOT NULL,
	weight INTEGER NOT NULL
);

CREATE TABLE Activity (
	id INTEGER
		CONSTRAINT Activity_pk
			PRIMARY KEY,
	user_id INTEGER NOT NULL,
	date TEXT NOT NULL,
	description TEXT NOT NULL,
    FOREIGN KEY(user_id) REFERENCES User(email)
);

CREATE TABLE ActivityData (
    activity_id INTEGER NOT NULL,
    time TEXT NOT NULL,
    cardio_frequency INTEGER NOT NULL,
    latitude REAL NOT NULL,
    longitude REAL NOT NULL,
    altitude INTEGER NOT NULL,
    FOREIGN KEY(activity_id) REFERENCES Activity(id)
);
