<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Set slug of questions
     * @param  string $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * Get url of the question
     * @return Route of question
     */
    public function getUrlAttribute()
    {
        return route('questions.show', $this->slug);
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
     * Get the status of the answer.
     * @return String Name of the class.
     */
    public function getStatusAttribute()
    {
        if ($this->answers > 0 ) {
            if ($this->best_answer_id) {

                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    /**
     * Return html formatted text of body field.
     */
    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

}
