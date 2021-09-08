--User(email(1),password(NN),lname(NN),fname(NN),date(NN),sex(NN),height(NN),weight(NN))
--Activity(id(1),user_id=@User.email(NN),date(NN),description(NN))
--ActivityData(activity_id=@Activity.id(NN),time(NN),cardio_frequency(NN),latitude(NN),longitude(NN),altitude(NN))

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
	user_id INTEGER NOT NULL
		CONSTRAINT Activity_User_fk
			REFERENCES User(email),
	date TEXT NOT NULL,
	description TEXT NOT NULL
);

CREATE TABLE ActivityData (
    activity_id INTEGER NOT NULL
        CONSTRAINT ActivityData_Activity_fk 
			REFERENCES Activity(id),
    time TEXT NOT NULL,
    cardio_frequency INTEGER NOT NULL,
    latitude INTEGER NOT NULL,
    longitude INTEGER NOT NULL,
    altitude INTEGER NOT NULL
);
