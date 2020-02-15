<?php namespace Mobileia\Newsletter\Model;

/**
 * Description of CacheInter
 *
 * @author matiascamiletti
 */
class Newsletter extends \Illuminate\Database\Eloquent\Model
{
    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_UNSUBSCRIBE = 2;
    
    protected $table = 'newsletter';
    
    protected $casts = ['data_extra' => 'array'];
    
    //public $timestamps = false;
}