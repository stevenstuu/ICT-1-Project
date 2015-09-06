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
    <?php
    //connection
    $con=mysql_connect("localhost","root","admin");
    mysql_select_db("brandon",$con);

    //query
    $qry="select * from store";

    if(isset($_POST['delete'])){
        $DeleteQuery = 'DELETE FROM store WHERE id=$_POST[id]';
        mysql_query($DeleteQuery, $con);
    }

    $result=mysql_query($qry,$con);

    while($row = mysql_fetch_array($result))
    {
        echo '<img height="auto" width="auto" src="data:image;base64,'.$row['image'].' "> ';
        echo '<br/> Image ID:' .$row['id'].' ';
        echo '<br/>Image name:'.$row['name'].' ';
        echo '<img src="images/divdivider.png">';
        echo "<br/>";
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
            }
            mysql_close($con)

            ?>
            <br/>
            <br/>
            <center><img src="images/Divider_for_Light.png"/></center>
            <br/>
            <br/>
            <form action="addCommentAdmin.php" method="post">
                <textarea rows="15" cols="100" name="comment" placeholder="Your Comment Here"></textarea><br/><br/>
                <input type="submit" value="Post Comment" name="submit"/>
            </form>
        </fieldset>
    </div>

    <div id="footer">
        <p>2015 BRANDON TENNAKOON ONLINE GALLERY </br> Email: <a>brandon.tennakoon@jcu.edu.au.com</a></p>
    </div>


</body>
</html>
