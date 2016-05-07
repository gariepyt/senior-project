# senior-project
Team: Trevor Apple, Tom Gariepy, Joseph Sibaila

# Instructions

Data File Framework
----------------------------------------------------------------------------------
Location:
URL to Public Directory
http://web.engr.oregonstate.edu/~sibailaj/framework/ (Links to an external site.)

Files Contained in 'framework' directory:
demo.html - This is a front end web interface to simulate AJAX calls to the server
request.js - The AJAX JavaScript code which converts object data to JSON and creates GET and POST requests to retrieve and update data respectfully
handler.php - The Server Side API that handles GET (file retrieval) and POST (file creation and update requests)

To create a file on the server, pass in a JavaScript unitdata object into the setFile() method containing the following attributes (e.g. unitdata.gameid = 12345):

Method: setFile(unitdata object)
1. unitdata.id - The unique identifier for the current game (e.g. 12345)
2. unitdata.type - The type of unit (rock, paper, or scissors)
3. unitdata.player - Either 'user' or 'opponent'
4. unitdata.index - An integer identifing an individual unit in case there are duplicate units
           (e.g. unitdata.index = 2 for the 2nd Unit on the map for a specific type)
5. Additional Data as necessary:
   - unitdata.health = 50
   - unitdata.x_coord = 28
   - unitdata.y_coord = 94
   - etc...

To retrieve all of the data for a single game, pass in the gameid integer into the
getFiles() method as shown below:

Method: getFiles(int gameid)
1.gameid - The unique identifier for the current game (e.g. 12345)

Returns a JSON object containing all file data in the gameid directory. This data is
parsed and converted into a JavaScript object which is returned by the function.




Home Page
----------------------------------------------------------------------------------
Location:
http://web.engr.oregonstate.edu/~gariepyt/senior-project/home/

Description:
This is where an example of what the layout will be for the final project. 




Graphics
----------------------------------------------------------------------------------
Location:
http://web.engr.oregonstate.edu/~gariepyt/senior-project/Graphics/graphicsTest.html

Description:
Can select and unselect the two squares by clicking on them.
Can move selected squares by clicking on a spot on the board.

Current issues:
Pathfinding works better after following these steps:
  1) selecting and unselecting a square
  2) selecting the other square
  3) moving that other square
