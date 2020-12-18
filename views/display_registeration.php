<?php

require('database.php');


$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$birthday = filter_input(INPUT_POST, 'birthday');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

echo "First Name: $firstName <br>";
echo "Last Name: $lastName <br>";
echo "Birthday: $birthday <br>";
echo "Email: $email <br>";
echo "Password: $password <br>";

if (strlen($password) >= 8) {
    echo "First Name: $firstName <br>";
    echo "Last Name: $lastName <br>";
    echo "Birthday: $birthday <br>";
    echo "Email: $email <br>";
    echo "Password: $password <br>";


//SQL QUERY
    $query = 'INSERT INTO accounts
            (email, fname, lname, birthday, password)
           VALUE 
            (:email, :fname, :lname, :birthday, :password)';

//PDO STATEMENT
    global $db;
    $statement = $db->prepare($query);

//Bind Form Value
    $statement->bindValue('email', $email);
    $statement->bindValue('fname', $firstName);
    $statement->bindValue('fname', $lastName);
    $statement->bindValue('birthday', $birthday);
    $statement->bindValue('password', $password);

//Execute
    $statement->execute();

// close
    $statement->closeCursor();

} else {
    echo "form is invalid";
}
