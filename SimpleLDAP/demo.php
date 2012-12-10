<?php

require('SimpleLDAP.php');

$ldap = new SimpleLDAP('192.168.0.1', 389, 3); // Host, port and server protocol (this one is optional)
$ldap->dn = 'ou=users,dc=demo,dc=com'; // The default DN (Distinguished Name)
$ldap->adn = 'cn=admin,dc=demo,dc=com'; // The admin DN
$ldap->apass = '987654'; // The admin password

// This is the information that will be sent to LDAP when creating a new user
$data['cn'][] = 'James';
$data['sn'][] = 'Bond';
$data['uid'][] = 'james';
$data['userpassword'][] = '123456';

// This is the information that will be sent to LDAP when modifying an user
$update['sn'][] = 'Bonded';

print_r($ldap->auth('demo', 123456)); // Authentication

print_r($ldap->getUsers('(!(description=warcraft))')); // Listing users WITHOUT warcraft in the description attribute
$ldap->addUser('james', $data); // Creating user
$ldap->modifyUser('james', $update); // Modifying user
$ldap->removeUser('james'); // Removing user
