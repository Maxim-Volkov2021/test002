<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'mark_id',
        'user_id',
        'year',
        'probig',
        'image',
        'description'
    ];

    public function mark($id)
    {
        return $this->hasMany(Mark::class)->find($id);
    }
    public function user($id)
    {
        return $this->hasMany(User::class)->find($id);
    }
}
