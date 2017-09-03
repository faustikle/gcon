<?php

namespace App\Models;

trait Identificable
{
    public function getPrimaryKeyName(): string
    {
        return $this->primaryKey;
    }

    public function getId(): int
    {
        return $this->{$this->primaryKey};
    }
}
