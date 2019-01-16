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
     * Return html formatted text of body field.
     */
    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }
}
