<?php

/**
 * @var \Exception $exception
 */

$exceptionCode = $exception->getCode();
$exceptionMessage = $exception->getMessage();
?>

<h3 class='text-center'>
 <?= $exceptionCode ?> - <?= $exceptionMessage ?>
</h3>