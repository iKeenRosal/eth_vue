<h1>
Thought Process
</h1>
<ul>
<li>Files were placed within their according directories for ease of reference</li>
<li>I decided to use Classes for Games and Database connection so that the code is encapsulated accordingly, clean, reuseable, and scalable </li>
<li>Within the GamesClass, I follow the basic CRUD philosophy that includes create, read, update, and delete of data as basic features. Additional functionalities have been added according to what's necessary</li>
<li>As for validation, I chose server-side validation because it is more secure. Perhaps in the future, a cliet-side validation can also be implemented prior server-side validation to improve user experience</li>
<li>As for views (search, create, edit), I placed them on separate files to minimize corruption of other working features when working on a specific feature - this can speed up debugging</li>
<li>I am uncertain what are the requirements for search and so I searched for keywords if it partially exists in either 'publisher' or 'name' column within the Games Table> Now thinking about it, I could have searched the 'nickname' column as well.</li>
<li>I used POST on forms because I didn't want regular users to see what are the parameters being passed onto the server (unlike if GET method was used)</li>
<li>I tackled the backend first (building mysql, database class, game class) and then front end last</li>
<li>The front page is yet to be designed accordingly
<br/>
<ul>
    <li>Front page to only show "Search" upon first load</li>
    <li>When search button was clicked, submit the data to be analyzed and fetched from the database and display in a table. In the future, it will be nice if this can be a DIV allow flexibility</li>
    <li>I want to separate the search, create, and edit into 3 different template files</li>
    <li>I intend to use js/jquery to process the blob message that pops up when an action (search, create, edit) was performed so that the user know if it was a success or if an error occur</li>
</ul>
</li>
<li>Some Class Methods need to be refactored so that the codes are not duplicated</li>
<li>Improve validation and make dynamic and belong to its own class</li>
</ul>

<hr/>

<h1>
Installation
</h1>
<h3>Code</h3>
<ul>
<li>Open a terminal/ssh and clone options:
<br/>SSH option: "git clone git@github.com:katzrosal/eth.git"
<br/>HTTPS option: "git clone https://github.com/katzrosal/eth.git"
</li>
</ul>
<h3>Database</h3>
Follow the steps below if you would like to create the database in your own environment
<ul>
<li>
Locate file "ztak_eth/config/eth.sql" and import contents into your favorite MySQL administration tool 
</li>
<li>
Adjust the database information that is currently on "ztak_eth/includes/DatabaseClass.php" and adjust the credentials within the "__construct" function
</li>
</ul>

<h3>VirtualHost</h3>
<ul>
<li>Assure that virtual host for this test is present and pointed to the newly created directory</li>
<li>Assure to capture both :80 (http) and :443 (https)</li>
</ul>

<hr/>

<br/>
<i style="color:red;">If I am given more time to work on this projects, below are my thoughts.</i>

<h1>
General Improvements
</h1>

<ul>
<li>Add more documentation; perhaps start with a flowchart to get a clear visual of each processes</li>
<li>Styling needs work</li>
<li>Add unit testing; phpunit</li>
<li>Assure that credentials are stored OUTSIDE the code (perhaps as a VirtualHost Env)</li>
<li>create staging environment that has very similar configuration as production</li>
<li>Review for security holes: sql injection, javascript file vulnerability, add .htaccess to avoid file injection into directories, </li>
<li>Review speed of search (stress test)</li>
<li>Add pagination libraries (maybe use composer) so that if there are millions or results, then we can load XY records at time and not crash the site</li>
<li>Add a delete feature so that a game can be removed from the list; add a column in Games Table called "is_active" so that 1=active and 0=inactive/deleted</li>
<li>Assure that JS scripts are in /assets/js/games.js and NOT in the index.php</li>
<li>I want to eventually tackle caching/redis to help speed up load times. If images will be introduced in the future, I want to load that via CDN</li>
</ul>

<h1>
Database Improvement
</h1>

<ul>
<li>
Store the database credentials AWAY from the source code or git. BUT for this example, it's okay (maybe..)
</li>
<li>
Create a table with a list of publisher information and reference the primary id as a foreign key within Games table
</li>
<li>
Alter Games table so that it has column for user_id (the user who inputted the game if applicable), publisher_id (foreign key from Publisher table), created date, modified date, status (if active or inactive), image_id (if the game has a image representation), description.. This table can totally change as requirements become more detailed. There can even be more supporting tables that can be created the this can scale fairly large. Games can also have a category which will add another table "Category"  
</li>
<li>
Create a table with a list of image information and use its primary key on the Games table
</li>
<li>
For any table updates, modified date should be updated
</li>
<li>
Depending on the overall use, might consider a log table for all the information changes (but this might be too much for a simple game like this)
</li>
<li>
Confirm and check that data entries have been validated prior inputing into the table
</li>
</ul>

<h1>
Programming/Design Improvement
</h1>

<h2>Search/Display Page</h2>
<ul>
<li>Clarify if "search" is mainly searching the Game's name or also the Publisher's name; adjust schema according to this. So far, I am searching for keywords on both Publisher and Name</li>
<li>Allow an alternating color per row so that it's easier on the eyes</li>
<li>Since the entries were lowered case into the database, consider UCWORDS() function to capitalize the first letter per string when displaying the Publisher and Name of the game</li>
<li>Might consider converting the Table to DIVs for flexibility of how the result is shown. In the future if a games has in image, it can be displayed more pleasingly (and remember to CDN this image to lift off weights from the site)</li>
<li>Search can work dynamically and simultaneously so that as adequate keywords are entered, the list gets populated simultaneously (but this might be too fancy for an ordinary game search)</li>
</ul>
<h2>Create/Edit Page</h2>
<ul>
<li>Display validation error/warning in readable aesthetic</li>
<li>Clearly display what the errors are (especially if game is not given a unique Publisher and Name</li>
<li>Create and Edit can be totally separated for flexibility purposes</li>
</ul>
