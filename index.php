<!DOCTYPE html>
<head>
<title>My PHP Docs Page</title>
</head>
<!--There was already some CSS stuff here that was imported using PHP require. This has been ommited, but can be found at https://sabrenetworks.me/ as its our main CSS file.-->
<body>
<?php
$username = "USERNAME_OF_DATABASE_USER";
$password = "USER_PASSWORD";
$database = "SCHEMA_WHERE_DOCS_DATA_IS_STORED";

$conn = new mysqli("ADDRESS_OF_MYSQL_SERVER", $username, $password, $database);
?>
<div class="title">
    <i><h1>Docs Test Project - PHP</h1></i>
</div>
<div class="divider"></div>
<div class="content">
    <h3 id="header1Info">
        <b id="title">Unset title</b>
    </h3>
    <p id="createBy">Created by noone</p>
    <p id="createDate">on this date</p>
    <p id="content">content</p>
    <div class="sidenav">
        <?php
        $sql2 = "SELECT * FROM SCHEMA.TABLE;";
        if($result = mysqli_query($conn, $sql2)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<a href='#' onclick='" . $row['ID'] . "()' id=" . $row['ID'] . ">" . $row['title'] . "</a>";
                }
                mysqli_free_result($result);
            } else{
                echo "<h5 style='color: red;'>Nothing in docs but crickets...</h5>";
            }
        } else{
            echo "Unable to execute query." . mysqli_error($conn);
        }?>
    </div>
</div>
</body>
<script>
    <?php
    $sql2 = 'SELECT * FROM SCHEMA.TABLE;';
    if($result = mysqli_query($conn, $sql2)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo 'function ' . $row["ID"] . '(){ 
                ';
                echo 'document.getElementById("title").innerHTML="' . $row["title"] . '"; 
                ';
                echo 'document.getElementById("createBy").innerHTML="' . $row["createdBy"] . '";
                ';
                echo 'document.getElementById("createDate").innerHTML="' . $row["dateCreated"] . '";
                ';
                echo 'document.getElementById("content").innerHTML="' . $row["content"] . '";
                ';
                echo '}';
            }
            mysqli_free_result($result);
        } else{
            echo "<h5 style='color: red;'>Nothing in docs but crickets...</h5>";
        }
    } else{
            echo "Unable to execute query." . mysqli_error($conn);
    }?>
</script>
<style>
    .title {
        margin-left: 300px;
    }
    .content {
        margin-left: 300px;
    }
    .sidenav {
        height: 100%;
        max-width: 300px;
        position: fixed;
        z-index: 10;
        top: 0;
        left: 0;
        background-color: #111;
        padding-top: 20px;
        border-left: #111;
        border-top: #111;
        border-bottom: #111;
        border-right: #0FF;
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: #00ffFF;
    }
</style>
