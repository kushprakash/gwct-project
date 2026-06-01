<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passbook extends Model
{
    protected $fillable = [
        'user_id',
        'desc',
        'type',
        'pre_balance',
        'amount',
        'balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the available balance for a user.
     *
     * @param int $userId
     * @return float
     */
    public static function getAvailableBalance($userId)
    {
        $lastTransaction = self::where('user_id', $userId)
                                ->orderBy('id', 'desc')
                                ->first();

        return $lastTransaction ? $lastTransaction->balance : 0;
    }

    /**
     * Add a transaction to the passbook.
     *
     * @param int $userId
     * @param string $desc
     * @param string $type 'CR' or 'DR'
     * @param float $amount
     * @return \App\Models\Passbook
     * @throws \Exception
     */
    public static function addTransaction($userId, $desc, $type, $amount)
    {
        $preBalance = self::getAvailableBalance($userId);

        if ($type === 'CR') {
            $balance = $preBalance + $amount;
        } elseif ($type === 'DR') {
            if ($preBalance < $amount) {
                throw new \Exception('Insufficient balance.');
            }
            $balance = $preBalance - $amount;
        } else {
            throw new \Exception('Invalid transaction type.');
        }

        return self::create([
            'user_id' => $userId,
            'desc' => $desc,
            'type' => $type,
            'pre_balance' => $preBalance,
            'amount' => $amount,
            'balance' => $balance,
        ]);
    }
}
