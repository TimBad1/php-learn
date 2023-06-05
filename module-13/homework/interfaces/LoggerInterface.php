<?php

interface LoggerInterface {
    public function logMessage(string $error);
    public function lastMessages(int $count);
}