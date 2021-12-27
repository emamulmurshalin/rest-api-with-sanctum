<?php

    /**
     * @param $payload
     * @param string $message
     * @param bool $status
     * @param int $status_code
     * @return array
     */
function getFormattedResponseData($payload, string $message="Ok", bool $status=true, int $status_code = 200) : array
{
    return [
        'payload'       => $payload,
        'message'       => $message,
        'status'        => $status,
        'status_code'   => $status_code
    ];
}

function getFormattedErrorResponseData($payload =null, string $message="Failed! something wrong.", int $status_code = 500, bool $status=false) : array
{
    return [
        'payload'       => $payload,
        'message'       => $message,
        'status'        => $status,
        'status_code'   => $status_code
    ];
}

