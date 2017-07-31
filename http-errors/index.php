<?php

$scheme = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$resource_prefix = $scheme . '://' . $_SERVER['HTTP_HOST'] . '/http-error';

$status_messages = [
    '000' => 'No Error',
    '001' => 'Unrecognized Status Code',

    '400' => 'Bad Request',
    '401' => 'Unauthorized',
    '402' => 'Payment Required',
    '403' => 'Forbidden',
    '404' => 'Not Found',
    '405' => 'Method Not Allowed',
    '406' => 'Not Acceptable',
    '407' => 'Proxy Authentication Required',
    '408' => 'Request Timeout',
    '409' => 'Conflict',
    '410' => 'Gone',
    '411' => 'Length Required',
    '412' => 'Precondition Failed',
    '413' => 'Request Entity Too Large',
    '414' => 'Request-URI Too Long',
    '415' => 'Unsupported Media Type',
    '416' => 'Requested Range Not Satisfiable',
    '417' => 'Expectation Failed',

    '500' => 'Internal Server Error',
    '501' => 'Not Implemented',
    '502' => 'Bad Gateway',
    '503' => 'Service Unavailable',
    '504' => 'Gateway Timeout',
    '505' => 'HTTP Version Not Supported'
];

$status_code;
if (isset($_GET['code'])) {
    $status_code = $_GET['code'];
    $status_code = !isset($status_messages[$status_code]) ? '001' : $status_code;
} else {
    $status_code = '000';
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Error: <?php echo $status_code ?>: <?php echo $status_messages[$status_code] ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="<?php echo $resource_prefix ?>/main.css">
        <link rel="icon" type="image/png" href="<?php echo $resource_prefix ?>/icons/016.png" sizes="16x16">
        <link rel="icon" type="image/png" href="<?php echo $resource_prefix ?>/icons/032.png" sizes="32x32">
        <link rel="icon" type="image/png" href="<?php echo $resource_prefix ?>/icons/048.png" sizes="48x48">
        <link rel="icon" type="image/png" href="<?php echo $resource_prefix ?>/icons/096.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?php echo $resource_prefix ?>/icons/192.png" sizes="192x192">
        <link rel="apple-touch-icons-precomposed" type="image/png" href="<?php echo $resource_prefix ?>/icons/180.png" sizes="180x180">
    </head>
    <body>
        <img src="<?php echo $resource_prefix ?>/error.svg">
        <h1><?php echo $status_code ?>: <?php echo $status_messages[$status_code] ?></h1>
        <p>
        <?php if ($status_code === '000') { ?>
            It's a wonder you've ended up here really.
        <?php } else if ($status_code === '001') { ?>
            The HTTP status code "<?php echo $_GET['code'] ?>" isn't one I recognize. Without a status code I do understand, I can't tell you anything of use.
        <?php } else { ?>
            I'd love to tell you more, but I'm pretty clueless. The relevant <a href="https://en.wikipedia.org/wiki/List_of_HTTP_status_codes#<?php echo $status_code ?>">Wikipedia article</a> will probably tell you more.
        <?php } ?>
        </p>
    </body>
</html>
