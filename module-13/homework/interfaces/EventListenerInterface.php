<?php

interface EventListenerInterface {
    public function attachEvent(string $method, callable $funcName);
    public function detouchEvent (string $method);
}