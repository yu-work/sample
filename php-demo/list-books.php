#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Sample\Commands\ListBooks;

$command = new ListBooks();
$command->execute();
