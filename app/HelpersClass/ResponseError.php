<?php

namespace App\HelpersClass;

class ResponseError
{
    public const NO_ERROR = 'NO_ERROR'; // 'OK'

    public const ERROR_100 = 'ERROR_100'; // 'User is not logged in.'
    public const ERROR_101 = 'ERROR_101'; // 'User does not have the right roles.'
    public const ERROR_102 = 'ERROR_102'; // 'Bad credentials.'
    public const ERROR_400 = 'ERROR_400'; // 'Bad request'
    public const ERROR_404 = 'ERROR_404'; // 'Item\'s not found.'

    public const ERROR_501 = 'ERROR_501'; // 'Error during create.'
    public const ERROR_502 = 'ERROR_502'; // 'Error during update.'
}
