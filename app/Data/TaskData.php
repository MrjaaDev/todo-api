<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class TaskData extends Data
{
    public function __construct(
      public string $title,
        public bool $done,
        #[MapInputName('user')]
        public int $user_id
    ) {}
}
