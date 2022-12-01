<?php

if (!function_exists('answerWithData')) {
    /**
     * @param string $message
     * @param int $code
     * @return array<string, mixed>
     */
    function answerWithData(string $message, int $code): array
    {
        if (floor($code/100) == 2) {
            $type = 'success';
        }
        elseif (floor($code/100) == 4) {
            $type = 'error';
        }
        elseif (floor($code/100) == 5) {
            $type = 'error';
        }
        else {
            $type = 'warning';
        }

        return [
            'type' => $type,
            'attributes' => [
                'code' => $code,
                'message' => $message,
            ],
        ];
    }
}
