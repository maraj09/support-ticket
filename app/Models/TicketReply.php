<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ticket_id', 'message'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
