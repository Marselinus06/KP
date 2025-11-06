<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transaction_id',
        'waste_data_id',
        'weight',
        'price',
    ];

    /**
     * Get the transaction that this detail belongs to.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * Get the waste data for the transaction detail.
     */
    public function wasteData()
    {
        return $this->belongsTo(WasteData::class);
    }
}