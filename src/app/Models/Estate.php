<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method search
 * @return Collection|null
 */

class Estate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bedrooms', 'bathrooms', 'storeys', 'garages', 'price'];

    public function scopeSearch(Builder $query, array $params): Builder
    {
        $query->select('name', 'bedrooms', 'bathrooms','storeys', 'garages','price',);

        if (isset($params['name'])) {
            $query->where('name', 'LIKE', '%' . $params['name'] . '%');
        }

        if (isset($params['bedrooms'])) {
            $query->where('bedrooms', $params['bedrooms']);
        }

        if (isset($params['bathrooms'])) {
            $query->where('bathrooms', $params['bathrooms']);
        }

        if (isset($params['storeys'])) {
            $query->where('storeys', $params['storeys']);
        }

        if (isset($params['garages'])) {
            $query->where('garages', $params['garages']);
        }

        if (isset($params['price_min'])) {
            $query->where('price', '>=', $params['price_min']);
        }

        if (isset($params['price_max'])) {
            $query->where('price', '<=', $params['price_max']);
        }

        return $query;
    }
}
