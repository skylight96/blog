<?php
namespace App\Enums;

enum Status: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Scheduled = 'scheduled';
    case Private = 'private';
}