CREATE TABLE public.finances
(
	id SERIAL NOT NULL PRIMARY KEY,
	card1 INT,
	card2 INT,
	card3 INT,
	paypal VARCHAR(100)	
);

CREATE TABLE public.user
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(20) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	description VARCHAR(500),
	paymentInfoID INT REFERENCES public.finances(id)
);

CREATE TABLE public.itemsList
(
	id SERIAL NOT NULL PRIMARY KEY,
	namme VARCHAR(250) NOT NULL,
	currentBid NUMERIC NOT NULL,
	description VARCHAR(500),
	currentBidUser INT NOT NULL REFERENCES public.user(id),
	photoName VARCHAR(50),
	condition VARCHAR(50),
	owner INT NOT NULL REFERENCES public.user(id),
	datePosted TIMESTAMPTZ NOT NULL
);