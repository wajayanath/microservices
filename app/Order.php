<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $total
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OrderItem[] $orderItems
 * @property-read int|null $order_items_count
 * @property-read mixed $name
 */
class Order extends Model
{
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalAttribute()
    {
        return $this->orderItems->sum(function (OrderItem $item) {
            return $item->price * $item->quantity;
        });
    }

    public function getNameAttribute()
    {
        return $this->first_name . '' . $this->last_name;
    }
}
