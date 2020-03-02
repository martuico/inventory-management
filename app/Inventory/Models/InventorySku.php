<?php

namespace App\Inventory\Models;

use App\Inventory\Traits\InventorySkuTrait;

/**
 * Class InventorySku.
 */
class InventorySku extends BaseModel
{
    use InventorySkuTrait;

    protected $table = 'inventory_skus';

    protected $fillable = [
        'inventory_id',
        'code',
    ];

    /**
     * The belongsTo item trait.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Inventory\Models\Inventory', 'inventory_id', 'id');
    }
}
