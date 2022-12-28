<?php

namespace app\core\base;

use app\core\form\Field;

abstract class BaseField
{
 abstract public function renderInput(): string;
}