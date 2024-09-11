<?php

namespace App;

enum UserRole: string
{
    case STUDENT = 'student';
    case SOCIETY_PRESIDENT = 'society_president';
    case SOCIETY_COORDINATOR = 'society_coordinator';
}
