<?php

declare(strict_types=1);

namespace DIX\Test\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Kappe <markus.kappe@dix.at>
 */
class TestTest extends UnitTestCase
{
    /**
     * @var \DIX\Test\Domain\Model\Test|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \DIX\Test\Domain\Model\Test::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDemoReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDemo()
        );
    }

    /**
     * @test
     */
    public function setDemoForStringSetsDemo(): void
    {
        $this->subject->setDemo('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('demo'));
    }
}
