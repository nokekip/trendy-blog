<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }
    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    }
    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
    if (empty($user['confpassword'])) {
        array_push($errors, 'Confirm password is required');
    }
    if ($user['password'] !== $user['confpassword']) {
        array_push($errors, 'Password does not match!');
    }

    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     array_push($errors, 'Email already exist!');
    // }
    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && ($existingUser['id'] != $user['id'])) {
            array_push($errors, 'Email already exists!');
        }
        
        if (isset($user['create-admin'])) {
            array_push($errors, 'Email already exists!');
        }
    }

    return $errors;
}


//  function to validate login

function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }

    return $errors;
}
