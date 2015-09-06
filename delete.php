<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Gallery</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>

<div id="container">
    <a href="adminHome.html"><img src="images/header-logo.png"/></a>
    <img src="images/tstamp.png"/>
    <div id="header">
        <nav>
            <ul>
                <li><a href ="adminImages.php">Gallery</a></li>
                <li><a href ="home.html" >Logout</a></li>
            </ul>
        </nav>
    </div>
    <br/>
    <br/>
    <br/>

    <form action="delete.php" method="post">
        <input type="text" name="deleteID" placeholder="insert image ID number"/>
        <input type="submit" name="delete" value="delete">
    </form>
    <br/>
    <br/>
    <?php
    //connection
    $con=mysql_connect("localhost","root","admin");
    mysql_select_db("brandon",$con);

    //query
    $qry="select * from store";

    $result=mysql_query($qry,$con);

    if(isset($_POST['delete'])){
        $sqlDelete= "delete from store where id=$_POST[deleteID]";
        mysql_query($sqlDelete,$con);
        header("delete.php");
    }

    while($row = mysql_fetch_array($result))
    {
        echo '<img height="277" width="277" src="data:image;base64,'.$row['image'].' "> ';
        echo 'Image ID:' .$row['id'].' ';
        echo '<img src="images/divider.gif">';
    }



    mysql_close($con);

    ?>


    <div class="content">
        <fieldset>
            <legend><h2>Comment</h2> </legend>
            <br/>
            <?php

            //display comment

            $con=mysql_connect("localhost","root","admin");
            mysql_select_db("brandon",$con);
            $sql = "select * from comment";
            $result=mysql_query($sql,$con);
            while($record = mysql_fetch_array($result)){
                echo $record['id'];
                echo ". ";
                echo $record['nameDB'];
                echo " (";
                echo $record['emailDB'];
                echo ") Says: <br/><pre>      ";
                echo $record['commentDB'];
                echo "</pre><br/>";
                echo '<hr/>';

                //delete

                if(isset($_POST['submitComment'])){
                    $sqlDeleteCom= "delete from comment where id=$_POST[commentID]";
                    mysql_query($sqlDeleteCom,$con);

                }
            }
            mysql_close($con)

            ?>
            <br/>
            <br/>
            <center><img src="images/Divider_for_Light.png"/></center>
            <br/>
            <br/>
            <form action="delete.php" method="post">
                <input type="text" name="commentID" placeholder="input comment ID"/>
                <input type="submit" value="Delete Comment" name="submitComment"/>
            </form>


            <?php
            $con=mysql_connect("localhost","root","admin");
            mysql_select_db("brandon",$con);



            ?>

        </fieldset>
    </div>

    <div id="footer">
        <p>2015 BRANDON TENNAKOON ONLINE GALLERY </br> Email: <a>brandon.tennakoon@jcu.edu.au.com</a></p>
    </div>


</body>
</html>
