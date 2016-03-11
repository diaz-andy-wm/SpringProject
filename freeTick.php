<!DOCTYPE>
<html>
<head>
    <title>list</title>
</head>
<body>

<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

$dbh = new PDO('mysql:host=localhost;dbname=SpringProj_db', 'root', 'root');

if(empty($first_name) || empty($last_name) || empty($email)){
    die('Error: A Required Field was empty');
} else{
    $stmt = $dbh->prepare("INSERT INTO SpringProj_db.freeTicket_list (first_name, last_name, email)  VALUES (:first_name, :last_name, :email)");
    $result= $stmt->execute(
        array(
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email
        )
    );
}

if(!$result || $result == null) {
    die('Error Querying Database');
}
echo '<h1>You Have Been Successfully Entered</h1>';
?>
<h3>Return to the homepage <a style="display: inline-block;" href="Index.html">Here</a></h3>
</body>
</html>
