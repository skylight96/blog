<?php
namespace App\Enums;

enum Category: string
{
    case Personal = 'personal';
    case Trucking = 'trucking';
    case Programming = 'programming';
    case Content = 'content';
}