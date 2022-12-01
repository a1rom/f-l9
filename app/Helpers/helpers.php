<?php

if (!function_exists('answerWithData')) {
    /**
     * @param string $message
     * @param int $code
     * @return array<string, mixed>
     */
    function answerWithData(string $message, int $code): array
    {
        return [
            'type' => 'error',
            'attributes' => [
                'code' => $code,
                'message' => $message,
            ],
        ];
    }
}
