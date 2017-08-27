<?php

namespace App\Models;

interface Formable
{
    /**
     * @return string
     */
    public function getPrimaryKeyName(): string;

    /**
     * @return int
     */
    public function getId(): int;
}