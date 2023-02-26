<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wedding extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'grooms_name', 'brides_name',
        'date', 'hall', 'address', 'owner_id',
    ];

    /**
     * @var array
     */
    protected $appends = ['couple_name'];

    /**
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Customer::class, 'owner_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class, 'wedding_id', 'id');
    }

    /**
     * Generate the unique code.
     * 
     * @return int
     */
    public static function generateCode()
    {
        $code = mt_rand(1000000000, 9999999999);

        $checkCode = self::where('code', $code)->first();

        if ($checkCode) return self::generateCode();

        return $code;
    }

    /**
     * @return Attribute
     */
    protected function coupleName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->grooms_name . ' & ' . $this->brides_name,
        );
    }
}
