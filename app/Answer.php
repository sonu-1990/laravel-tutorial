<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * Answer belongs to question
     * @return Object BelongsTo relationship
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Answer belongs to user
     * @return Object BelongsTo relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the created_date in human readable format
     * @return Created_date
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Return html formatted text of body field.
     */
    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($answer) {
            $answer->question->increment('answers_count');
            $answer->question->save();
        });
    }
}
