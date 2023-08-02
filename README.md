# Golden Book
<b> Design and development of a guestbook functionality that allows users to share their comments and opinions on the site. </b>

## What I learn in this project
● Create a database <br>
● Communicate with a database <br>
● Forms management <br>
● Define and use sessions <br>
● Date management

## My plan to build this project
● <b>Create the livreor database</b> and the "user" and "comment" tables with phpmyadmin</b>. <br>

● <b>Create a connection.php file that contains the database connection</b> and credential verification functions. <br>

● <b>Create a user.php file that contains the User class,</b> with the id, login and password attributes, and the methods for creating, modifying and deleting a user. <br>

● <b>Create a comment.php file that contains the Comment class,</b> with the attributes id, comment, id_user and date, and the methods for creating, displaying and deleting a comment. <br>

● <b>Create an index.php file containing the home page of the site,</b> with a presentation of the guestbook and links to the registration and login pages. <br>

● <b>Create a registration.php file which contains the registration form,</b> which allows the user to enter his username and password, and which creates a User object with the create() method. <br>

● <b>Create a login.php file which contains the connection form,</b> which allows the user to enter his login and password, and which checks the identifiers with the check_login() function of the connection.php file. If the identifiers are valid, a session is launched and the user is redirected to the livre-or.php page. <br>

● <b>Create a profil.php file which contains the profile modification form,</b> which allows the connected user to change his username or password with the update() method of the User class. This form uses the XMLHttpRequest attribute to send data without reloading the page. <br>

● <b>Create a guestbook.php file which contains the guestbook page,</b> which displays all the comments with the display() method of the Comment class, in descending order of date. If the user is logged in, a link to the comment.php page is also displayed. <br>

● <b>Create a comment.php file which contains the form for adding comments,</b> which allows the connected user to enter his comment and which creates a Comment object with the create() method. After adding the comment, the user is redirected to the guestbook.php page. <br>

## Screenshots
