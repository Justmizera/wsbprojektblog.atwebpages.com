<?php

$pol=mysqli_connect("fdb34.awardspace.net","4016277_justyna","Projekt123!","4016277_justyna") or die ('Brak połączenia z serwerem');
$pol->set_charset("utf8");


$user_name = mysqli_real_escape_string($pol, $_POST["name"]);
$user_surname = mysqli_real_escape_string($pol, $_POST["surname"]);
$user_email = mysqli_real_escape_string($pol, $_POST["email"]);
$user_password = mysqli_real_escape_string($pol, $_POST["password"]);
$user_password2 = mysqli_real_escape_string($pol, $_POST["password2"]);

$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

if($user_password == $user_password2)
{ if (filter_var($user_email, FILTER_VALIDATE_EMAIL))

    {
        if (mysqli_query($pol, "INSERT INTO users (user_name, user_surname, user_email, user_passwordhash) VALUES ('$user_name', '$user_surname', '$user_email', '$user_password_hash')")){
            echo "Rejestracja przebiegła poprawnie";
         } else{
            echo "Nieoczekiwany błąd";
         }
    }
    else{
        echo "Adres email jest niepoprawny"; 
    }
    
    
}
else{
    echo "Hasła nie są identyczne";
}


mysqli_close($pol);


?>