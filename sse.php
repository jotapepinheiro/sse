<?php

declare(strict_types=1);

date_default_timezone_set("America/Sao_Paulo");

header("X-Accel-Buffering: no");
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
header("Connection: keep-alive");

$counter = rand(1, 10); // a random counter
while (1) {
// 1 is always true, so repeat the while loop forever (aka event-loop)

  $curDate = date(DATE_ISO8601);

  echo "id: cards" . PHP_EOL;
  echo "event: cardLog". PHP_EOL;
  echo 'data: {"time": "' . $curDate . '"}' . PHP_EOL;
  echo PHP_EOL;

  // Send a simple message at random intervals.

  $counter--;

  if (!$counter) {
    echo "event: cardMessage". PHP_EOL;
    echo 'data: Esta é uma mensagem na hora ' . $curDate . PHP_EOL;
    echo PHP_EOL;

    $counter = rand(1, 10); // reset random counter
  }

  // flush the output buffer and send echoed messages to the browser

  while (ob_get_level() > 0) {
    ob_end_flush();
  }
  flush();

  // break the loop if the client aborted the connection (closed the page)
  
  if ( connection_aborted() ) break;

  // sleep for 1 second before running the loop again
  
  sleep(1);

}