<?php

session_start();
require("connect.php");

# to delete only for printing
function demo($value)
{
    echo "<pre>", print_r($value, true), "</pre";
    die();
}

// Function to execute query
function executeQuery($sql, $data)
{
    global $conn;

    $stmt = $conn->prepare($sql);

    if ($data) {
        $values = array_values($data);
        $types = str_repeat('s', count($values));
        $stmt->bind_param($types, ...$values);
    }
    $stmt->execute();
    return $stmt;
}

// function to select all 

function selectAll($table, $conditions = [])
{

    global $conn;

    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        // return the records that matches the conditions...
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key = ?";
            } else {
                $sql = $sql . " AND $key = ?";
            }
            $i++;
        }
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

// select one
function selectOne($table, $conditions)
{

    global $conn;

    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key = ?";
        } else {
            $sql = $sql . " AND $key = ?";
        }
        $i++;
    }

    $sql =  $sql . " LIMIT 1";

    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}


// create function

function create($table, $data)
{
    global $conn;

    // $sql = "INSERT INTO users SET username=?,admin=?,email=?,password=?,"

    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

// Update function

function update($table, $id, $data)
{
    global $conn;

    // $sql = "UPDATE users SET username=?,admin=?,email=?,password=? WHERE id=?"

    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;


    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $stmt->affected_rows;
}

// delete function

function delete($table, $id)
{
    global $conn;

    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

// fetch published post 
function getPublishedPosts()
{
    global $conn;

    $sql = "SELECT 
                posts_tbl.*, users_tbl.username 
            FROM posts AS posts_tbl 
            JOIN users AS users_tbl 
            ON posts_tbl.user_id=users_tbl.id 
            WHERE posts_tbl.published=?";

    $stmt = executeQuery($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

// function to fetch posts related to same topic
function getPostsByTopic($topic_id)
{
    global $conn;

    $sql = "SELECT 
                posts_tbl.*, users_tbl.username 
            FROM posts AS posts_tbl 
            JOIN users AS users_tbl 
            ON posts_tbl.user_id=users_tbl.id 
            WHERE posts_tbl.published=?
            AND topic_id=?";

    $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


// search posts function
function searchPosts($term)
{
    $match = '%' . $term . '%';
    global $conn;

    $sql = "SELECT 
                posts_tbl.*, users_tbl.username 
            FROM posts AS posts_tbl 
            JOIN users AS users_tbl 
            ON posts_tbl.user_id=users_tbl.id 
            WHERE posts_tbl.published=?
            AND posts_tbl.title LIKE ? OR posts_tbl.body LIKE ?";

    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

// total
function countRows()
{
    global $conn;

    $sql = "SELECT COUNT(*) as total_rows FROM users";
    $stmt = executeQuery($sql,);
    
}
