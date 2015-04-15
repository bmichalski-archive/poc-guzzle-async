<?php

$sleep = $_GET['sleep'];

set_time_limit(10);

sleep($sleep);

echo sprintf('Slept %s seconds.', $sleep);