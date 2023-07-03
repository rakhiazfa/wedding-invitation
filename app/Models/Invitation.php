<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class Invitation extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'qr_code_link',
        'guest_name',
        'is_already_received',
        'time_received',
        'guest_estimates',
        'arriving_guest',
    ];

    /**
     * @var array
     */
    protected $appends = ['callback_link'];

    /**
     * @return BelongsTo
     */
    public function wedding()
    {
        return $this->belongsTo(Wedding::class, 'wedding_id', 'id');
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
     * Generate the unique code link.
     * 
     * @return string
     */
    public static function generateQrCode(string $weddingCode, string $invitationCode)
    {
        $accessToken = Crypt::encrypt($weddingCode . '.' . $invitationCode);

        $link = route('invitations.accept_invitation', [
            'accessToken' => $accessToken,
        ]);

        return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$link&choe=UTF-8";
    }

    /**
     * @return Attribute
     */
    public function callbackLink(): Attribute
    {
        return new Attribute(
            get: fn () => route('invitations', [
                'wedding' => $this->wedding->code,
                'invitation' => $this->code,
            ]),
        );
    }
}
