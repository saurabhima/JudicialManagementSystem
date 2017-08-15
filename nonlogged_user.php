<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Not Logged In:(</title>
    <style>
        body { text-align: center;}
        h1 { font-size: 50px; text-align: center }
        span[frown] { transform: rotate(90deg); display:inline-block; color: #bbb; }
        body { font: 20px Constantia, 'Hoefler Text',  "Adobe Caslon Pro", Baskerville, Georgia, Times, serif; color: #999; text-shadow: 2px 2px 2px rgba(200, 200, 200, 0.5); }
        ::-moz-selection{ background:#FF5E99; color:#fff; }
        ::selection { background:#FF5E99; color:#fff; }
        article {display:block; text-align: left; width: 500px; margin: 0 auto; }

        a { color: rgb(36, 109, 56); text-decoration:none; }
        a:hover { color: rgb(96, 73, 141) ; text-shadow: 2px 2px 2px rgba(36, 109, 56, 0.5); }
    </style>
</head>

<body>
<article>
    <h1>User Not Logged In<span frown>:(</span></h1>
    <div>
        <p>Sorry, It seems that you tried to access a page without logging in with propoer username and password.No problem we will transfer you back to the main page or click at <a href="index.php">main page</a> </p>
        <p>Please contact the Administrator for any issues at :</p>
        <ul>
            <li><a href="mailto:jissupport@gmail.com"> Support: jissupport@gmail.com</a><br><br></li>
            <li>JIS Project,MTech 2016-18, Computer Science & Engineering Department,Indian Institute of Technology, Kharagpur, West Bengal, Pin-721306, India</li>
        </ul>
    </div>


</article>
<?php
header("Refresh: 5; url=index.php");


?>
</body>
</html>