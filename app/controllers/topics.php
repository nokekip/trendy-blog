<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateTopic.php");

$table = 'topics';

$errors = array();
$id = '';
$name = '';
$description = '';

$topics = selectAll($table);

// add topic
if (isset($_POST['add-topic'])) {
    $errors = validateTopic($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-topic']);
        $topic_id = create('topics', $_POST);
        $_SESSION['message'] = 'Topic created succesfully';
        $_SESSION['type'] = 'success';
        header('Location: ' . BASE_URL . '/admin/topics/manageTopics.php');
        exit();
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

// fetch topic by id 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

// delete topic
if (isset($_GET['del_id'])) {
    adminOnly();
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Topic deleted succesfully';
    $_SESSION['type'] = 'success';
    header('Location: ' . BASE_URL . '/admin/topics/manageTopics.php');
    exit();
}

// update topic 
if (isset($_POST['update-topic'])) {
    adminOnly();
    $errors = validateTopic($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-topic'], $_POST['id']);
        
        $topic_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'Topic updated succesfully';
        $_SESSION['type'] = 'success';
        header('Location: ' . BASE_URL . '/admin/topics/manageTopics.php');
        exit();
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}
