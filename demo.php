<?php

include './autoload.php';

$keychain = new \LeonBarrett\Keychain;

//Add a new keychain item
$keychain->set_password('my_demo','password1234');

//Get the new password out
echo $keychain->get_password('my_demo');

//Update the keychain item
$keychain->update_password('my_demo','password12345678');

//Get the updated password out
echo $keychain->get_password('my_demo');

//Delete the demo item
$keychain->delete_password('my_demo');