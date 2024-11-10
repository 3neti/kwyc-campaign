<?php

namespace App\Interfaces;

interface RecordType
{
    function key(): string;
    function name(): string;
    function description(): string;
}
