# INSTRUCTIONS FOR RUNNING THE WEBAPP LOCALLY

## STEP 1: INSTALLING XAMPP (running PHP locally)

- go to https://www.apachefriends.org/index.html
- download your OS version (Windows, Linux, MacOS)
- open the XAMPP control panel, and start the Apache and MySQL modules
<img width="335" alt="image" src="https://user-images.githubusercontent.com/97817114/156104627-b8fae2e2-5d73-4096-a69e-d18e87b937a3.png">

- place the folder "estore.ca" in the directory folder XAMPP('C:\xampp\htdocs') -> 'C:\xampp\htdocs\estore.ca'
- the php files in the "estore.ca" are connected to the local database.


## STEP 2: SETTING UP LOCAL MySQL DATABASE

- type in 'localhost' into the address bar to go to the homepage of XAMPP
- click on phpMyAdmin at the top-right of the page 
![image](https://user-images.githubusercontent.com/97817114/156104743-b7c15f3f-396d-4f8b-975a-9016f0ad893b.png)

- on the left click the "New" button to create a new database
![image](https://user-images.githubusercontent.com/97817114/156104837-c7f979e9-57ce-4e11-abbc-059a7dba99db.png)

- name this database "estore-3230388f1d" and click create
![image](https://user-images.githubusercontent.com/97817114/156104894-ebbbcdba-5948-4353-8063-a7d1cd3fd1ad.png)

- click on the database "estore-3230388f1d" on the left and then click import at the top of the page to import database tables
![image](https://user-images.githubusercontent.com/97817114/156104927-8e0b9ec4-0bff-486c-9705-c187e8b73794.png)

- click "Choose File" and select the "estore-3230388f1d.SQL" file located at 'C:\xampp\htdocs\estore.ca' and the click "Go"
![image](https://user-images.githubusercontent.com/97817114/156104967-68b3faf5-d30f-4e88-84a0-6e467183ac0f.png)
<img width="656" alt="image" src="https://user-images.githubusercontent.com/97817114/156105179-5bc1b366-66f6-4a3b-b450-87d3eaee0693.png">


## STEP 3: RUNNING WEBAPP LOCALLY

- go to "localhost/estore.ca" in the address bar
- the webapp is now running locally
