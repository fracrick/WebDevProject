<?php

function emptyInput($username, $password)
{

    if (empty($username) || ($password)) {
        $result = true;
    } else {
        $result = false;
    }
};
