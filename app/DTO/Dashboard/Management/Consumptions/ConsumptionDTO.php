<?php

namespace App\DTO\Dashboard\Management\Consumptions;

class ConsumptionDTO
{
    protected int $user_id;
    protected int $branch_id;
    protected int $amount;
    protected string $comment;

    public function __construct(array $data)
    {
        $this->user_id = $this->getUserId();
        $this->branch_id = $data['branch_id'];
        $this->amount = $data['amount'];
        $this->comment = $data['comment'];
    }

    public function getAsArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'branch_id' => $this->branch_id,
            'amount' => $this->amount,
            'comment' => $this->comment,
        ];
    }

    private function getUserId()
    {
        return auth()->user()->id;
    }
}
