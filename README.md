# gamestore

Database-driven web sites are a must for companies nowadays. This project is focused on designing and implementation of a simple database-driven online gamestore by using Oracle 12c, an object-relational database, from the ground up. 

The gamestore includes the following features:
  The data of a game includes
    a unique ASIN (10 characters),
    a title,
    a list of developers, and
    a price.

  The data of a developer includes
    a unique ID (assigned by the system automatically),
    a name, and
    a list of games developed by him or her.

  The data of a customer includes
    a unique ID (assigned by the system automatically after signing up),
    a name, and
    an account including
      a list of purchased games (no duplicate games),
      the corresponding quantities of the purchased games (one quantity for each game), and
       a total amount spent on the purchased games.
