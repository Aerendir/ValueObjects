<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2017 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Twig;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * {@inheritdoc}
 */
class MoneyFormatterExtension extends AbstractExtension
{
    /** @var ISOCurrencies $currencies */
    private $currencies;

    /**
     * Initiaizes the currencies repository.
     */
    public function __construct()
    {
        $this->currencies = new ISOCurrencies();
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return array_merge(parent::getFilters(), [
            new TwigFilter('localizedmoney', [$this, 'localizeMoneyFilter']),
            new TwigFilter('localizedmoneyfromarr', [$this, 'localizeMoneyFromArrFilter']),
        ]);
    }

    /**
     * @param Money       $money
     * @param string|null $locale
     *
     * @throws SyntaxError
     *
     * @return string
     */
    public function localizeMoneyFilter(Money $money, string $locale = null): string
    {
        $formatter      = twig_get_number_formatter($locale, \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($formatter, $this->currencies);

        /** @var \Money\Money $formattingMoney */
        $formattingMoney = $money->getValueObject();

        return $moneyFormatter->format($formattingMoney);
    }

    /**
     * @param array<string,float|int|string> $money
     * @param string|null                    $locale
     *
     * @throws SyntaxError
     *
     * @return string
     */
    public function localizeMoneyFromArrFilter(array $money, string $locale = null): string
    {
        if (isset($money['humanAmount'], $money['baseAmount'])) {
            unset($money['humanAmount']);
        }

        $formattingMoney = new Money($money);

        return $this->localizeMoneyFilter($formattingMoney, $locale);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'localized_money';
    }
}
