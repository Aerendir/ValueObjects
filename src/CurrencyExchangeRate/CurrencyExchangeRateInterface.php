<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate;

use Money\Currency;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a Currency object.
 *
 * {@inheritdoc}
 */
interface CurrencyExchangeRateInterface extends ComplexValueObjectInterface
{
    /**
     * Get the conversion rate.
     *
     * This is not retrieved from some sources but set when creating the object.
     * So it may be not updated.
     *
     * @return float
     */
    public function getExchangeRate(): float;

    /**
     * The date on which the exchange rate were given.
     *
     * @return \DateTime|null
     */
    public function getExchangeRateDate(): ? \DateTime;

    /**
     * Get the base Currency the amount is in.
     *
     * @return Currency
     */
    public function getFrom(): Currency;

    /**
     * Get the Currency in which convert the amount.
     *
     * @return Currency
     */
    public function getTo(): Currency;
}
