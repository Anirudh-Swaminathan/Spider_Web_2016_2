##This is task2 for Spider web dev inductions
### Overview Of The Project
    The task given was to create a website for student management.
    There must be 2 functions in the basic mode
* Add Student
* View Student

    The advanced mode includes the following:-
    
* [X] View all students
* [X] Group all students in ascending order or name
* [X] Group all students in ascending order of Roll Number
* [X] Group all students Department Wise
* [ ] Paginate the contents of the website.
    
    The language used by me was PHP. NO Frameworks or modules were used.
    The Database used was a MySQL Database.
    
    The Add Student page was first completed, implementing both Client side
    and server side validation.SQL Injection was also prevented by using 
    Prepared SQL Statements.
    Next View Student was completed,implementing both client side and server side
    validation. SQL Injection was also prevented using Prepared SQL Statements.
    The advanced tasks were completed next using simple SQL Queries.
    
### List Of Server Routes
    The list of server routes is as follows:-
- POST /addData.html
- GET /viewData?Roll=*roll*
- GET /viewDep?Dept=*dept*

### Tables used in the database
The database used was a MySQL database. The database name here was **spider_2016**
<br/>
<br/>
The table name used is **spider_2016_2**
<br/>
<br/>
The table consists of 7 columns. The type, and name is as follows:-
<table>
<tr>
<td>Row Name</td>
<td>Roll</td>
<td>Name</td>
<td>Dept</td>
<td>Email</td>
<td>Address</td>
<td>About</td>
<td>Password</td>
</tr>
<tr>
<td>Type Of Value Stored</td>
<td>BIGINT</td>
<td>TEXT</td>
<td>TEXT</td>
<td>TEXT</td>
<td>TEXT</td>
<td>TEXT</td>
<td>TEXT</td>
</tr>
<tr>
<td>Attributes</td>
<td>PRIMARY KEY</td>
<td>NOT NULL</td>
<td>NOT NULL</td>
<td>NOT NULL</td>
<td>NOT NULL</td>
<td>NULL ALLOWED</td>
<td>NOT NULL</td>
</tr>
</table>
<br/>
<br/>
### Build Instructions
> The website uses **WAMP Server**, which is used for running PHP Code, in Windows.
> The first step is to download it if it is not present in your workspace.
<br/>
<br/>
> For windows users,the link for the download can be found [HERE](http://www.wampserver.com/en/)
> Since WAMP is available only in Windows, an alternative could be XAMPP.
> Mac OS, and Linux users can click on [THIS](https://www.apachefriends.org/download.html) link 
> to download XAMPP in their respective devices.
<br/>
<br/>
> After installation, start the server by clicking on the exe file(Windows).
> The username is **root** and the password is *Cjul1968ScB*. This is to ensure compatibility with the
> code written by me.
<br/>
<br/>
> Download all the files and save them in a folder name *Spider_2016_2*.
> Save that folder in the **www** folder created during installation. By default, it is in C:/wamp64/www/
<br/>
<br/>
> Start your favourite browser.
> Type in *http://localhost/Spider_2016_2/* in the box provided.
<br/>
<br/>
> Enjoy using my website. :smiley:

### Screenshots
1. Index Page
<br/>
![Index Page Screenshot](/../screenshots/Screenshots/index.png?raw=true "Index Page")
<br/>
2. Add Data Page
<br/>
![Add Page Screenshot](/../screenshots/Screenshots/add_data.png?raw=true "Add Data Page")
<br/>
3. Response Page for add data
<br/>
![Response Page Screenshot](/../screenshots/Screenshots/add_data-auth.png?raw=true "Response Page")
<br/>
4. View Data Page
<br/>
![View Page Screenshot](/../screenshots/Screenshots/view_data.png?raw=true "View Data Page")
<br/>
5. Response Page for view data
<br/>
![Response Page Screenshot](/../screenshots/Screenshots/view_data_auth.png?raw=true "Response Page")
<br/>
6. Edit Data Page
<br/>
![Edit Page Screenshot](/../screenshots/Screenshots/edit_data.png?raw=true "Edit Data Page")
<br/>
7. Response Page for edit data
<br/>
![Response Page Screenshot](/../screenshots/Screenshots/edit_data_auth.png?raw=true "Response Page")
<br/>
8. Advanced Tasks Page
<br/>
![Advance Page Screenshot](/../screenshots/Screenshots/advance.png?raw=true "Advance Page")
<br/>
9. View All Page
<br/>
![View All Page Screenshot](/../screenshots/Screenshots/view_all.png?raw=true "View All Page")
<br/>
10. View All Name Wise
<br/>
![View Name Page Screenshot](/../screenshots/Screenshots/view_name.png?raw=true "View Name Page")
<br/>
11. View All Roll Number Wise
<br/>
![View Roll Page Screenshot](/../screenshots/Screenshots/view_roll.png?raw=true "View Roll Page")
<br/>
12. View All Department Wise
<br/>
![View Deptwise Page Screenshot](/../screenshots/Screenshots/view_dept_all.png?raw=true "View Deptwise Page")
<br/>
13. View All in Particular Department(Here, the department is Chemical)
<br/>
![View Dept Page Screenshot](/../screenshots/Screenshots/view_dept.png?raw=true "View Dept Page")
<br/>
11. Response Page for viewing a particular department.
<br/>
![Response Dept Page Screenshot](/../screenshots/Screenshots/view_dept_auth.png?raw=true "Response Dept Page")
<br/>


