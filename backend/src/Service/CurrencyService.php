<?php

declare(strict_types=1);

namespace Service;

use Entities\Currency;
use Repository\RepositoryContainer;

class CurrencyService
{
    private $currencyRepo;

    public function __construct()
    {
        $this->currencyRepo = RepositoryContainer::currency();
    }

    public function getCurrencyById($id): Currency
    {
        return new Currency($this->currencyRepo->getCurrencyId($id));
    }
}
