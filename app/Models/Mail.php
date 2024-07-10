<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'category_id',
        'title',
        'file_path',
    ];

    public function category()
    {
        return $this->belongsTo(MailCategory::class);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('H:i, d/m/Y');
    }
}
