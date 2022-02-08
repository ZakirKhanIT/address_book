/*
Developed by Zakir Khan
version:0.1
Repository:Address Book
*/

Set up
Change the base url by navigating through config/appConfig.php # I have setup with http://localhost/address_book

Add your all required database setting in the same file.

Hit the url you will get the further step to set up the project

If further step  you will not get from url you can follow from the below step

* Database Creation Query
  CREATE TABLE IF NOT EXISTS `contact` ( `id` int(11) NOT NULL AUTO_INCREMENT, `first_name` varchar(255) NOT NULL, `last_name` varchar(255) NOT NULL, `zip_code` varchar(11) NOT NULL, `street` varchar(255) NOT NULL, `city_id` int(11) NOT NULL, `email_address` varchar(255) NOT NULL DEFAULT "", `created_date` timestamp NOT NULL DEFAULT current_timestamp(), `updated_date` timestamp NOT NULL DEFAULT current_timestamp(), PRIMARY KEY(`id`) )

* Table Creation
  Contacts
  CREATE TABLE IF NOT EXISTS `contact` ( `id` int(11) NOT NULL AUTO_INCREMENT, `first_name` varchar(255) NOT NULL, `last_name` varchar(255) NOT NULL, `zip_code` varchar(11) NOT NULL, `street` varchar(255) NOT NULL, `city_id` int(11) NOT NULL, `email_address` varchar(255) NOT NULL DEFAULT "", `created_date` timestamp NOT NULL DEFAULT current_timestamp(), `updated_date` timestamp NOT NULL DEFAULT current_timestamp(), PRIMARY KEY(`id`) )

* Dummy Data for Contacts
  INSERT INTO contact( first_name, last_name, email_address, street, zip_code, city_id ) VALUES ("Sam","Wallace","same@gmail.com","street 49","23456",1), ("Tom","Vetter","tom@gmail.com","street 49","23456",2), ("Mike","Graves","mike@gmail.com","street 49","23456",3), ("Zack","Rohe","zack@gmail.com","street 49","23456",4)


* city
* CREATE TABLE IF NOT EXISTS `city` ( `id` int(11) NOT NULL AUTO_INCREMENT, `name` varchar(100) NOT NULL, `created_date` timestamp NOT NULL DEFAULT current_timestamp(), `updated_date` timestamp NOT NULL DEFAULT current_timestamp(), PRIMARY KEY(`id`)

* Dummy data for city
* INSERT INTO city( name ) VALUES("Mumbai"),("Delhi"),("Bengluru"),("Chennai")

Technology Used
MVC Design pattern followed


