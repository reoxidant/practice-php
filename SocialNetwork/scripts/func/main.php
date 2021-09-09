<?php
/**
 * @param $length_pass
 * @return string
 */
function getPass($length_pass)
{
    $password = '';
    $words = array(
        'a', 'b', 'c', 'd', 'e', 'f',
        'g', 'h', 'i', 'j', 'k', 'l',
        'm', 'n', 'o', 'p', 'q', 'r',
        's', 't', 'u', 'v', 'w', 'x',
        'y', 'z', 'A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H', 'I', 'J',
        'K', 'L', 'M', 'N', 'O', 'P',
        'Q', 'R', 'S', 'T', 'U', 'V',
        'W', 'X', 'Y', 'Z', '1', '2',
        '3', '4', '5', '6', '7', '8',
        '9', '0', '#', '!', "?", "&"
    );

    for ($i = 0; $i < $length_pass; $i++) {
        $password .= $words[mt_rand(0, count($words) - 1)];
    }
    return $password;
}

/**
 * @return string
 */
function generateSalt()
{
    $salt = '';
    $lenght = 8;
    for ($i = 0; $i < $lenght; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }
    return $salt;
}

/**
 * @param string $value
 * @param $min
 * @param $max
 * @return bool
 */
function checkLenght($value, $min, $max)
{
    if (!$value) {
        $value = "";
    }

    return strlen($value) > $min && strlen($value) < $max;
}

/**
 * @param $login
 * @param $password
 * @param $salt
 * @return string
 */
function generateSaltedPassword($login, $password, $salt)
{
    return md5($login . md5($password) . $salt);
}

/**
 * @return bool
 */
function isAdmin()
{
    session_start();
    return $_SESSION['auth'] === true && $_SESSION['status'] === 10;
}

/**
 * @param array $status
 * @return bool
 */
function isAccess(array $status)
{
    foreach ($status as $iValue) {
        return $iValue === $_SESSION['status'];
    }
}

?>