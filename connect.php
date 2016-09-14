<?php
/* if(!mysql_connect("10.0.1.60","root","Pluto9000"))
{
    if(!mysql_connect("10.0.1.20","root","Starwars"))
     die('oops connection problem ! --> '.mysql_error());
    }   
*/

if(!mysql_connect("localhost","johnny","sw3263827"))
{
    if(!mysql_connect("localhost","root","fdgfg"))
     die('oops connection problem ! --> '.mysql_error());
    }   


if(!mysql_select_db("dbtest"))
{
     die('oops database selection problem ! --> '.mysql_error());
}




