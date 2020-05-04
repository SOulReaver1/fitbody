<?php

require_once("./factories/contactFactory.php");

$contact = new newContact($pdo);
$getContact = $contact->getContact();
$contactCount = $contact->contactCount()[0]->result;