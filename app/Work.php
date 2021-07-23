<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [ 'name', 'file', 'amount_page', 'type_id', 'theme_id', 'status_id', 'user_id', 'year', 'price', 'description', 'content', 'intro', 'biblio', 'im_author'];

    public function getInterval()
    {
        switch ($this->interval) {
            case 10:
                return 'одинарный';
            case 15:
                return 'полуторный';
            case 20:
                return 'двойной';
        }

    }

    public function scopeMy($query)
    {

        return $query->where('user_id', auth()->user()->id);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->hasOne(OrderStatus::class, 'id', 'status_id');
    }
    public function antiplagiat()
    {
        return $this->belongsTo(Antiplagiat::class );
    }
}
