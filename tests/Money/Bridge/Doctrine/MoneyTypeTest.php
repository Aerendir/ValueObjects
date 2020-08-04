<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Money\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Money\Bridge\Doctrine\MoneyType;

final class MoneyTypeTest extends TestCase
{
    /** @var MoneyType */
    private $type;

    /** @var AbstractPlatform */
    private $platform;

    protected function setUp(): void
    {
        $this->type     = new MoneyType();
        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    public function testGetName(): void
    {
        self::assertSame('money', $this->type->getName());
    }
}
