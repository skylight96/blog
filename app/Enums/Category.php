<?php
namespace App\Enums;

enum Status: string
{
    case Personal = 'personal';
    case Trucking = 'trucking';
    case Programming = 'programming';
    case Content = 'content';
}