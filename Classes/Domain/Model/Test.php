<?php

declare(strict_types=1);

namespace DIX\Test\Domain\Model;


/**
 * This file is part of the "Test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Markus Kappe <markus.kappe@dix.at>, DIX web.solutions
 */

/**
 * Test
 */
class Test extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * demo
     *
     * @var string
     */
    protected $demo = '';

    /**
     * Returns the demo
     *
     * @return string $demo
     */
    public function getDemo()
    {
        return $this->demo;
    }

    /**
     * Sets the demo
     *
     * @param string $demo
     * @return void
     */
    public function setDemo(string $demo)
    {
        $this->demo = $demo;
    }
}
