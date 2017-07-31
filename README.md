# Trading-Post
The Trading Post runtime is for creating a functional Ebay/Craigslist like store front on whatever network you want.

# Requirements
* PHP-7
* MySQL 5.7
* Apache 2.4

# Todo
* Log those who open Inspector/Debuger in thier browser. Possible?
* Make accounts.
* Link accounts to item pages.
* Other stuff.

# Getting Started with Your Server
## Setting Up Your Server (On Raspberry Pi)
This setup will make your Raspberry Pi be its own Server and Web Host.
Essentially, this will allow your server to act on its own without another internet network.
However, this does mean it can not be accessed unless you are within the Pi's WiFi range.
1. Get a Raspberry Pi 3 (or and older model with a WiFi Antenna, probably)
2. TBD

## Setting Up the Database
1. Open phpMyAdmin
2. Create new database with the name: "items_site_data"
3. Click on the new "items_site_data" database
4. In the database's window, click on "import"
5. Choose the file in "root/databse_configuration"
6. Make sure character set is "UTF-8" and format is "SQL"
7. Hit "Go" at the bottom
8. In "root/tpapi" open "tpapiDBConnector.php"
9. Change _dbAddress, _dbUser, and _dbPasskey to the correct values for your system
..* _dbSchema should stay "items_site_data" as long as you followed these instructionss

# Powered By
![T-Papi API Logo](https://github.com/Tsadow/Trading-Post/blob/master/tpapi/tpapiLogo.png "T-Papi API")
"Come and get some."