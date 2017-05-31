<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
