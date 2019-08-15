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
	player_id SERIAL PRIMARY KEY,		
	name VARCHAR(50) NOT NULL UNIQUE,
    number int NOT NULL UNIQUE,
	DOB DATE,
    start DATE,
	description text,
    image VARCHAR(20)
);

/* Sample table test inserts: */
INSERT INTO skaters (name, number, DOB, start, description, image)
VALUES 
('Player 1', 14,  '2005-05-23', '2017-12-18', 'Player 1 is a super elite jammer...', 'p1.jpg'),
('Player 2', 68,  '2009-11-15', '2018-03-28', 'Player 2 loves to eat...', 'p2.jpg'),
('Player 3', 911, '2007-06-04', '2016-01-14', 'Player 3 one jumped off of a...', 'p3.jpg'),
('Player 4', 23,  '2005-05-23', '2017-08-09', 'Player 4 is a super elite jammer...', 'p4.jpg');


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
    sponsor_id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    logo VARCHAR(20)
);

/* Sample sponsor table inserts */
INSERT INTO sponsors (name, logo)
VALUES
('Sponsor 1', 's1.jpg'),
('Sponsor 2', 's2.jpg');




