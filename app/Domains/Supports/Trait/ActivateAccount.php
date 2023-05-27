<?php

namespace Domains\Supports\Traits;

trait ActivateAccount
{
    public function isActivatedAccount(): bool
    {
        return !is_null($this->email_verified_at);
    }

    public function setAsActivateAccount()
    {
        $this->update([
            'email_verified_at' => now(),
        ]);

        return $this;
    }
}
