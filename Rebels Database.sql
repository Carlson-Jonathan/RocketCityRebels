/******************************************************************************
* Author:
*   Jonathan Carlson
* Description:
*   This is the Rocket City Rebels PostgreSQL website database. This database
*   is intended to store information about the team so as to allow a website
*   administrator on the Rocket City Rebels board of directors to make changes
*   to the site without the use of HTML or any type of coding.
******************************************************************************/

/******************************************************************************
* "skaters" Table
* Contents:
*   SERIAL "player_id"
*   "name" - The skater's roller derby name, not their real name
*   "number" - The skater's player number on their jersy
*   "DOB" - The skater's MM/YYYY date of birth. This will only be used to
*           calculate and display the skater's age in years only. No PII.
*           See http://www.postgresqltutorial.com/postgresql-date/ for age.
*   "start" - Represents the date the skater joined the Rebels.       
*   "description" - Text information about the player entered by the admin
*   "image" - The name of the .jpg file that is a portrait of the skater.
******************************************************************************/
CREATE TABLE public.skaters (
	person_id SERIAL PRIMARY KEY,		
	name VARCHAR(50) NOT NULL UNIQUE,
    number int NOT NULL UNIQUE,
	DOB DATE NOT NULL,
    start DATE NOT NULL,
	description TEXT,
    image VARCHAR(20)
);

/* Sample table test inserts: */
INSERT INTO skaters (name, number, DOB, start, description, image)
VALUES 
('Player 1', 14,  '2005-05-23', '2017-12-18', 
'Player 1 is a super elite jammer who will circle the arena like Wonder Woman. 
She is a senior member of the Rebels who always has her team mates backs and 
will go the extra mile.', 'p1.jpg'),
('Player 2', 68,  '2009-11-15', '2018-03-28', 'Player 2 loves to eat...', 'p2.jpg'),
('Player 3', 911, '2007-06-04', '2016-01-14', 'Player 3 one jumped off of a...', 'p3.jpg'),
('Player 4', 23,  '2005-05-23', '2017-08-09', 'Player 4 is a super elite jammer...', 'p4.jpg'),
('Jonnyboy', 3712,  '1981-05-23', '2019-08-15', 'Jonnyboy is super handsome and can eat a lot!', 'jon2.jpg');

/******************************************************************************
* "coaches" Table
* Same as the "skaters" table for use on the skaters page.
* Contents: 
*   SERIAL "coach_id".
*   "name" - coach name.
*   "position" - eg. "Head coach", "Assistant Coach", etc.
*   "start" - Date they became a coach.
*   "filler" - replacable field for keeping CSS balanced.
*   "description" - Misc info about the coach.
*   "image" - the image file name for the coach's portrait.
******************************************************************************/
CREATE TABLE public.coaches (
	person_id SERIAL PRIMARY KEY,		
	name VARCHAR(50) NOT NULL UNIQUE,
    position VARCHAR(30),
    start DATE,
    filler VARCHAR (50),
	description TEXT,
    image VARCHAR(20)
);

/* Sample table test inserts: */
INSERT INTO coaches (name, position, start, filler, description, image)
VALUES
('Coach 1', 'Head Coach', '2019-11-15', 'Lorem Ipsum', 'This coach will make you a super star!', 'coach1.jpg'),
('Coach 2', 'Assistant Coach', '2017-11-15', 'Lorem Ipsum', 'This is the right hand coach.', 'coach2.jpg'),
('Coach 3', 'Lacky Coach', '2025-11-15', 'Lorem Ipsum', 'This coach washes the other coachs cars.', 'coach3.png');

/******************************************************************************
* "referees" Table
* Same as the "skaters" table for use on the skaters page.
* Contents: 
*   SERIAL "referee_id".
*   "name" - referee name.
*   "position" - eg. "Head referee", "Jr. referee", etc.
*   "start" - Date they became a referee.
*   "filler" - replacable field for keeping CSS balanced.
*   "description" - Misc info about the referee.
*   "image" - the image file name for the referee's portrait.
******************************************************************************/
CREATE TABLE public.referees (
	person_id SERIAL PRIMARY KEY,		
	name VARCHAR(50) NOT NULL UNIQUE,
    position VARCHAR(30),
    start DATE,
    filler VARCHAR (50),
	description TEXT,
    image VARCHAR(20)
);

/* Sample table test inserts: */
INSERT INTO referees (name, position, start, filler, description, image)
VALUES
('Ref 1', 'Head Ref', '2019-11-15', 'Lorem Ipsum', 'This ref cheats!', 'ref1.jpg'),
('Ref 2', 'Assistant Ref', '2017-11-15', 'Lorem Ipsum', 'This is the left hand ref.', 'ref2.jpg'),
('Ref 3', 'Lacky Ref', '2025-11-15', 'Lorem Ipsum', 'This ref washes anyones car.', 'ref3.png');

/******************************************************************************
* "board" Table
* Board of Directors. Same as the "skaters" table for use on the skaters page.
* Contents: 
*   SERIAL "member_id".
*   "name" - member name.
*   "position" - eg. "President", "Treasurer", etc.
*   "start" - Date they joined the RCR board of directors.
*   "contact" - Contact info for member.
*   "description" - Misc info about the board of directors member.
*   "image" - the image file name for the members's portrait.
******************************************************************************/
CREATE TABLE public.board (
	person_id SERIAL PRIMARY KEY,		
	name VARCHAR(50) NOT NULL UNIQUE,
    position VARCHAR(30),
    start DATE,
    contact VARCHAR (50),
	description TEXT,
    image VARCHAR(20)
);

/* Sample table test inserts: */
INSERT INTO board (name, position, start, contact, description, image)
VALUES
('Sally Smith', 'President', '2019-11-15', 'Sally.Smith@gmail.com - 256-123-4567', 'I love to hang glide!', 'pres.jpg'),
('Rufus Rodrigez', 'Vice President', '2011-11-15', 'bite.me@hotmail.com - 1-800-654-9870', 'Tigers are good, tigers are great!', 'VP.jpg'),
('Joe Shmoe Nobody', 'Treasurer', '2048-11-15', 'moneyman@AOL.com - 555-555-5555', 'The Little Mermaid was the best Disney movie ever!', 'Tr.png'),
('Cora Snake', 'A Player', '2010-01-02', 'Cora@coramail.com', 'Meet Cora L. Snake! She is #911 on the Rebels and has been involved with derby since 2010. Im currently in the engineering strand at New Century, but Im thinking about being a Graphic Designer! Being on my skates is freedom. The feeling of movement is the escape I need after dealing with everything going on in the world today. Derby is tough, but its one of the most fantastic feelings in the world everytime I hit the track. Dont let other peoples opinions run how youre going to live your life. You need to be unapologetic and expressive with everything you do. First and foremost, make sure you are comfortable with your decisions. You dont want to put yourself in a position that youll regret in the long run. Only you can dictate who you are, so dont let others tell you what you need to be. You are a piece of art, and that is beautiful. Fun Fact: I could live off of mashed potatoes. 2 minute mashed potatoes + salt, pepper, sour cream, and butter? The greatest food in the world. Also, Ive been to two junior roller cons, and they were pretty great. Keep a lookout for more introductions to our amazing skaters!', 'cora.jpg');

/******************************************************************************
* "sponsors" Table
* This table lists the current sponsors with their associated logo's filename.
* This table will be displayed on the footer of each page.
* Contents: 
*   SERIAL "sponsor_id"
*   "name" - sponsor company name
*   "logo" - sponsor's logo image file name
******************************************************************************/
CREATE TABLE public.sponsors (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    logo VARCHAR(20)
);

/* Sample sponsor table inserts */
INSERT INTO sponsors (name, logo)
VALUES
('Black Hall', 'blackhall.jpg'),
('Chick Fil-A', 'chickfila.jpg'),
('Insanity', 'insanity.jpg'),
('Jacks', 'jacks.png'),
('OReilly', 'oreilly.jpg');

/******************************************************************************
* "bootcamp" Table
* This table contains only a single line representing the start and stop dates
* of the bootcamp enrollment periods.
* Contents: 
*   SERIAL "dates"
*   "start" - The first day of the enrollment season.
*   "end" - The last day of the enrollment season.
******************************************************************************/
CREATE TABLE public.bootcamp (
    id SERIAL PRIMARY KEY,
    begin date,
    finish date
);

/* Sample sponsor table inserts */
INSERT INTO bootcamp (begin, finish)
VALUES
('2019-08-31', '2019-09-16');

/******************************************************************************
* "passwords" Table
* This table contains the hashed passwords for acess to the administrative 
* site. 
* Contents: 
*   SERIAL "id"
*   "hash1" - User defined password hash.
*   "hash2" - Web designer password (for backup only).
******************************************************************************/
CREATE TABLE public.passwords (
    id SERIAL PRIMARY KEY,
    hash1 VARCHAR(255),
    hash2 VARCHAR(255)
);

/* Password table inserts */
INSERT INTO passwords (hash1, hash2)
VALUES
('$2y$10$YS8qQEG0O/zPqTEi8kMnWORxdKQb2/jfUurqHj1Sm82SqQ2nQyaii', 
'$2y$10$LnbyA4krpGSr4htuhEgFLOBfEvhDMwXhsuWemXhJZE6U6ongPu1fe');

/******************************************************************************
* "practicedays" Table
* This table contains the weekdays and times that practices are held. 
* Contents: 
*   SERIAL "id"
*   "day" - Day of the week (eg. "Mondays", "Wednesdays")
*   "begin" - Time that the practice begins.
*   "stop" - Time that practice ends.
******************************************************************************/
CREATE TABLE public.practicedays (
    id SERIAL PRIMARY KEY,
    day VARCHAR(25),
    begin VARCHAR(25),
    stop VARCHAR(25)
);

/* practicedays table inserts */
INSERT INTO practicedays (day, begin, stop)
VALUES
('Mondays', '6:00 PM', '8:00 PM'),
('Wednesdays', '6:00 PM', '8:00 PM');

/******************************************************************************
* "schedulechanges" Table
* This table stores information about any upcomming changes to the weekly 
* practice schedule. 
* Contents: 
*   SERIAL "id"
*   "day" - Date of change
*   "description" - An explaination of why the change is happening.
******************************************************************************/
CREATE TABLE public.schedulechanges (
    id SERIAL PRIMARY KEY,
    day date,
    description text
);

/* practicedays table inserts */
INSERT INTO schedulechanges (day, description)
VALUES
('2019-07-24', 'Practice cancelled due to zombie apocolypse'),
('2019-11-21', 'Monday practice will be held on Tuesday 11/22/2019'),
('2019-12-18', 'Cookout at Shannon''s house');

/******************************************************************************
* "googlemap" Table
* This table stores the google map code that shows the GPS location of the
* roller rink where the Rebels practice and have games. 
* Contents: 
*   SERIAL "id"
*   "gps" - Google's GPS code - see https://www.maps.ie/create-google-map/
******************************************************************************/
CREATE TABLE public.gps (
    id SERIAL PRIMARY KEY,
    gps text
);

/* Insanity complex GPS */
INSERT INTO gps (gps)
VALUES
('<div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=100%20Skate%20Park%20Dr+(Insanity%20Complex)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/coordinates.html">find my coordinates</a></iframe></div><br />');

/******************************************************************************
* "games" Table
* This table stores the upcomming games and events for the schedule page. 
* Contents: 
*   SERIAL "id"
*   "day" - Date of the upcomming game/event
*   "title" - The heading of the event
*   "description" - details about the event (location, times, etc)
******************************************************************************/
CREATE TABLE public.games (
    id SERIAL PRIMARY KEY,
    day date,
    title VARCHAR(255),
    description text
);

/* Insanity complex GPS */
INSERT INTO games (day, title, description)
VALUES
('2019-12-24', 'Christmas Eve Bash', 'Will be held at Wonder Womans house
at 555 Bunny Hop Lane from 4:30 PM to 1:00 AM. Bring drinks, fireworks,
and your favorite voodoo doll.'),
('2020-01-13', 'Jonnyboys Birthday', 'Celebraties only. Will be held on a
private yacht and sail to Hawaii. Bring lots of money for Jonnyboy and gifts.'),
('2023-07-13', 'Solar Eclipse!', 'Bring your eclipse glasses because this will
be awesome! I will go to Austin to see this bad boy and chill with Damon, the
wussy and Andrea.'),
('2019-10-31', 'Haloween Party', 'Dress up. There will be a costume contest. The 
winner will get a Willi Wankas everlasting gob stopper that explodes in your mouth!');

/******************************************************************************
* "enroll" Table
* This table stores the enrollment form URL address for boot camp season. 
* Contents: 
*   SERIAL "id"
*   "url" - URL of enrollment form
******************************************************************************/
CREATE TABLE public.enroll (
    id SERIAL PRIMARY KEY,
    url VARCHAR(255)
);

/* Insanity complex GPS */
INSERT INTO enroll (url)
VALUES
('https://www.rocketcityrebels.com/boot-camp');

/******************************************************************************
* "store" Table
* Contents:
*   SERIAL "item_id"
*   "name" - The name of the product
*   "price" - The price to be payed if purchased.
*   "description" - Information about the product.
*   "image" - The name of the .jpg file for the item
******************************************************************************/
CREATE TABLE public.store (
	item_id SERIAL PRIMARY KEY,		
	name VARCHAR(50) NOT NULL UNIQUE,
	price numeric NOT NULL,
	description text,
	quantity int NOT NULL,
    image VARCHAR(20)
);

INSERT INTO store (name, price, description, quantity, image)
VALUES
('pizza', 23, 'Pizza is yummy!', 15, 'pizza.jpg');

/******************************************************************************
* "clothing" Table
* Contents:
*   SERIAL "item_id"
*   "name" - The name of the clothing product
*   "price" - The price to be payed if purchased.
*   "description" - Information about the clothing product.
*   "small" - The quantity of available small sizes.
*   "medium" - The quantity of available medium sizes.
*   "large" - The quantity of available large sizes.
*   "xlarge" - The quantity of available xlarge sizes.
*   "image" - The name of the .jpg file for the clothing item
******************************************************************************/
CREATE TABLE public.clothing (
	item_id SERIAL PRIMARY KEY,		
	name VARCHAR(50) NOT NULL UNIQUE,
	price numeric NOT NULL,
	description text,
	small int NOT NULL,
	medium int NOT NULL,
	large int NOT NULL,
	xlarge int NOT NULL,
    image VARCHAR(20)
);

INSERT INTO clothing (name, price, description, small, medium, large, xlarge, image)
VALUES
('jersey', 15, 'Best darn jersey around!', 20, 15, 15, 10, 'jersey.jpg');
