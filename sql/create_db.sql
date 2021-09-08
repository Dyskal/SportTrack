--User(email(1),password(NN),lname(NN),fname(NN),date(NN),sex(NN),height(NN),weight(NN))
--Activity(id(1),user_id=@User.email(NN),date(NN),description(NN))
--ActivityData(activity_id=@Activity.id(NN),time(NN),cardio_frequency(NN),latitude(NN),longitude(NN),altitude(NN))
create table User (
	email text not null
		constraint User_pk
			primary key,
	password text not null,
	lname text not null,
	fname text not null,
	date text not null,
	sex text not null,
	height integer not null,
	weight integer not null
);

create table Activity (
	id integer
		constraint Activity_pk
			primary key,
	user_id integer not null
		constraint Activity_User_fk
			references User (email),
	date text not null,
	description text not null
);