<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Course (version anglaise) plutôt que Cours (version française) pour bien pouvoir faire la différence entre le pluriel et le singulier
 */
class Course extends Model
{
    use HasFactory;
}
