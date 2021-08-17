<?php

require_once dirname(__FILE__, 2) . "/model/db_config.php";

function insertHouseOwner($name, $email, $phone, $password, $aiub_nid_id)
{
    $query = "INSERT INTO house_owners (id, name, email, phone, password, aiub_nid_id) VALUES (NULL, '$name', '$email', '$phone', '$password', '$aiub_nid_id')";

    return execute($query);
}

function getAllHouseOwners()
{
    $query = "SELECT * FROM house_owners";
    $result = get($query);
    return $result;
}

function getHouseOwner($email)
{
    $query = "SELECT * FROM house_owners WHERE email = '$email'";
    $result = get($query);
  
    if (count($result) === 0)
        return NULL;
    return $result[0];
}
function getHouseOwnerbyID($id)
{
    $query = "SELECT * FROM house_owners WHERE id = '$id'";
    $result = get($query);

    if (count($result) === 0)
        return NULL;
    return $result[0];
}
function updateHouseOwner($id, $name, $phone, $aiub_nid_id)
{
    $query = "UPDATE house_owners SET name = '$name', phone = '$phone', aiub_nid_id = '$aiub_nid_id' WHERE id = $id";
    return execute($query);
}

function deleteHouseOwner($id)
{
    $query = "DELETE FROM house_owners WHERE id = '$id'";
    return execute($query);
}

function verifyHouseOwner($id)
{
    $query = "UPDATE house_owners SET verify = 1 WHERE id = '$id'";
    return execute($query);
}
