<?php

declare(strict_types=1);

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Common;

/**
 * Implements basic constructor for complex value objects.
 */
trait DisableWritingMethodsTrait
{
    /**
     * @see {@link ValueObjectInterface}
     */
    public function __set(string $field, $value): void
    {
    }
}
