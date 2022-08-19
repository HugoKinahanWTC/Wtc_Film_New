# Wtc_Film Module

This module is used for training purposes only.

Facts
-----
- Composer Key: 
- PHP Version:  `8.0`

Description
-----------

Technical steps:
1. Create a new module (Wtc_Film)
2. Create a new configuration with Enable Film (yes/no), debug (yes/no). 
   Please review system.xml and config.xml.
3. Create a new declaration schema for a new table(e.g. film_list)
   1. Columns: ID, TITLE, STATUS (active/inactive) (We want a DB table that 
      contains a list of films. In the table, there will be a STATUS column 
      (boolean) to enable/disable the film entity from being displayed on 
      the front end).
4. Generate db_schema_whitelist.json.
5. Create a new data patch in order to populate the table. 
6. Create CRUD (Model, Resource Model, Collection + Service Contract).
7. Extend your repository to the rest API using webapi.xml + example of 
   client api. 
8. Create a new customer attribute (e.g. favourite_film), visible in the 
   frontend, with the source model getting the records from the table 
   film_list where STATUS is active. 
9. Update create account section, adding the new attribute visible as option 
   select (select your favourite film). The new select option will be 
   visible only if the configuration Enable Film is set to Yes. When we 
   create a new customer we will save the new information against the new 
   attribute. (We want a section in the account registration page so that 
   new accounts can select their favourite film from a dropdown box).
10. Create a new section within my account section (logged in user). The 
    name of the section will be Favourite Film. Review sortLinkInterface in 
    order to add a new link in my account section. The new Link within my 
    account section will be visible only if the new configuration is set to 
    yes. 
11. Create a translation file for your module. The default language will be 
    English. 
12. When you create a new account. Log the Information of the Favourite Film.
13. Create ReadMe file.
14. Create a grid in order to manage the new film. 

Story:
- 

Plugins:
-----------
```
- Class: 
- Method: 
- Spec: 
```
Configuration:
-----------
The path in admin for the configuration is:
```
Stores > Configuration 
```
List of configuration
``` 
- 
- 
```
```
- 
- 
```
```

Requirements
------------
- PHP >= 7.1.15

Dependencies


Compatibility
-------------
- Magento >= 2.3.4

Usage Instructions
-------------------------

Developer
---------

* Hugo Kinahan
