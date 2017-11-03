<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * Device status types
     */
    const ONLINE = 'OK';
    const OFFLINE = 'OFFLINE';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'checked_in_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['id', 'created_at', 'updated_at'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['status'];

    /**
     * Less than 1 day ago
     *
     * @return bool
     */
    public function recentlySeen()
    {
        return $this->checked_in_at->diffInDays(now()) < 1;
    }

    /**
     * Response status text
     *
     * @return string
     */
    public function getStatusAttribute()
    {
        return $this->recentlySeen() ? Device::ONLINE : Device::OFFLINE;
    }
}
