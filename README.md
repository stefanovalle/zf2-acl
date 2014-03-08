Zend Framework 2 - User ACLs sample app
=======================

Introduction
------------
This is a sample app aimed to show how simple and flexibile could be the ACLs
management in ZF2. It contains the code needed to prepare 
[the slides](http://www.slideshare.net/stefanovalle/instant-acls-with-zend-framework-2) 
of my Zend Framework Day 2014 presentation in Turin (Italy).

This code is based on [Zend Framework 2 Skeleton App](https://github.com/zendframework/ZendSkeletonApplication).


Installation
------------
This app needs several ZF2 modules so Composer is the recommended way to install all dependencies.
It uses Doctrine 2 ORM to handle persistence on a PostgreSQL database.


Contents
----------------------------
The concepts behind this app:
- Events to be managed
- Users that could manage events through an administration area
- Roles that restricts the actions a user could perform

For more details take a look to [the presentation](http://www.slideshare.net/stefanovalle/instant-acls-with-zend-framework-2).