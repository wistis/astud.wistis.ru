<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'comment', 'price', 'original', 'curs', 'vuz', 'amount_page', 'type_id', 'theme_id', 'user_id', 'status_id', 'antiplagiat_id', 'font', 'interval', 'guarant', 'expired_at', 'premium_at'];

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

    public function files(){
        return $this->hasMany(OrderFile::class);
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
