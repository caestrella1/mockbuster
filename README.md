# Mockbuster
**Mockbuster** is a group project developed for **CST 336: Internet Programming** at CSUMB. The website allows all users to browse movies, add and remove movies from their cart, apply discount codes and check out items. Administrators can additionally add, edit and delete movies from the system as well as view system reports.

### Project Structure
#### API
The `/api` folder contains all the code necessary to interact with the MySQL database. This includes requesting and editing a movie's information, filtering results the movie database, creating invoices and generating admin reports.

#### Backend
The `/backend` folder consists primarily of database creation files. Here, you can automatically populate your database with a selection of movies found in the provided JSON files. This folder also contains code to log administrators in and out of the system.
