<?php

namespace App\Inventory\Models;

use App\Inventory\Traits\InventoryStockTrait;

/**
 * Class InventoryStock.
 */
class InventoryStock extends BaseModel
{
    use InventoryStockTrait;

    protected $table = 'inventory_stocks';

    protected $fillable = [
        'inventory_id',
        'location_id',
        'quantity',
        'aisle',
        'row',
        'bin',
    ];

    /**
     * The belongsTo inventory item relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Inventory\Models\Inventory', 'inventory_id', 'id');
    }

    /**
     * The hasMany movements relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movements()
    {
        return $this->hasMany('App\Inventory\Models\InventoryStockMovement', 'stock_id', 'id');
    }

    /**
     * The hasMany transactions relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Inventory\Models\InventoryTransaction', 'stock_id', 'id');
    }

    /**
     * The hasOne location relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location()
    {
        return $this->hasOne('App\Inventory\Models\Location', 'id', 'location_id');
    }
}
