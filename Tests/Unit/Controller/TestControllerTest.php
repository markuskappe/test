<?php

declare(strict_types=1);

namespace DIX\Test\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Markus Kappe <markus.kappe@dix.at>
 */
class TestControllerTest extends UnitTestCase
{
    /**
     * @var \DIX\Test\Controller\TestController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\DIX\Test\Controller\TestController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllTestsFromRepositoryAndAssignsThemToView(): void
    {
        $allTests = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $testRepository = $this->getMockBuilder(\DIX\Test\Domain\Repository\TestRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $testRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTests));
        $this->subject->_set('testRepository', $testRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('tests', $allTests);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenTestToView(): void
    {
        $test = new \DIX\Test\Domain\Model\Test();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('test', $test);

        $this->subject->showAction($test);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenTestToTestRepository(): void
    {
        $test = new \DIX\Test\Domain\Model\Test();

        $testRepository = $this->getMockBuilder(\DIX\Test\Domain\Repository\TestRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $testRepository->expects(self::once())->method('add')->with($test);
        $this->subject->_set('testRepository', $testRepository);

        $this->subject->createAction($test);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenTestToView(): void
    {
        $test = new \DIX\Test\Domain\Model\Test();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('test', $test);

        $this->subject->editAction($test);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenTestInTestRepository(): void
    {
        $test = new \DIX\Test\Domain\Model\Test();

        $testRepository = $this->getMockBuilder(\DIX\Test\Domain\Repository\TestRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $testRepository->expects(self::once())->method('update')->with($test);
        $this->subject->_set('testRepository', $testRepository);

        $this->subject->updateAction($test);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenTestFromTestRepository(): void
    {
        $test = new \DIX\Test\Domain\Model\Test();

        $testRepository = $this->getMockBuilder(\DIX\Test\Domain\Repository\TestRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $testRepository->expects(self::once())->method('remove')->with($test);
        $this->subject->_set('testRepository', $testRepository);

        $this->subject->deleteAction($test);
    }
}
