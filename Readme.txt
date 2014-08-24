
Installation: (very Easy installation)

   1. Unzip the package in an empty directory.
   2. Set up the config.php file in the includes directory with your database connection details.
   3. Run install.php and done!!

===>If you just want to test the functionality of the application, it is hosted at "http://solutions.6te.net".

Directory Structure:
   |
   |==>css
   |    |-> foundaion.css
   |
   |==>js
   |    |-> ajax.js //all ajax functions. checking login and signup, Posting update, sending, accepting, deleting friend requests are done through
   |               // these functions.
   |
   |==>images //all images
   |
   |==>includes
   |   |-> Class.php      //contains all php functions.Functions for friends update, posting status, showing users, friends and friend requests,
   |   |                  //sending, accepting and deleting friend request are present here.
   |   |-> config.php     //Configuring database and ABSPATH
   |   |-> connection.php //connecting to database
   |
   |==>home // files related to profile page
   |   |-> index.php
   |   |-> center.php
   |   |-> header.php
   |   |-> post.php       //status posting
   |   |-> updates.php    //friends update
   |
   |==>friends // files related to friends page
   |   |-> index.php
   |   |-> center.php
   |   |-> header.php
   |   |-> friend_request.php // showing all friend request
   |   |-> accept_request.php // accepting friend requests
   |   |-> delete_request.php // deleting friend requests
   |   |-> friends.php        // showing all friends
   |   |-> users.php          // showing non-friends
   |   |-> add_friend.php     // adding friend requests
   |   |-> load_more_friends.php//loading more friends
   |
   |==>index.php
   |
   |==>login.php
   |
   |==>signup.php
   |
   |==>home_center.php
   |
   |==>logout.php
   |
   |==>install.php
   |
   |==>db.sql
