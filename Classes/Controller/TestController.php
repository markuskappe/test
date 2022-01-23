<?php

declare(strict_types=1);

namespace DIX\Test\Controller;


/**
 * This file is part of the "Test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Markus Kappe <markus.kappe@dix.at>, DIX web.solutions
 */

/**
 * TestController
 */
class TestController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * testRepository
     *
     * @var \DIX\Test\Domain\Repository\TestRepository
     */
    protected $testRepository = null;

    /**
     * @param \DIX\Test\Domain\Repository\TestRepository $testRepository
     */
    public function injectTestRepository(\DIX\Test\Domain\Repository\TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    /**
     * action index
     *
     * @return string|object|null|void
     */
    public function indexAction()
    {
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $tests = $this->testRepository->findAll();
        $this->view->assign('tests', $tests);
    }

    /**
     * action show
     *
     * @param \DIX\Test\Domain\Model\Test $test
     * @return string|object|null|void
     */
    public function showAction(\DIX\Test\Domain\Model\Test $test)
    {
        $this->view->assign('test', $test);
    }

    /**
     * action new
     *
     * @return string|object|null|void
     */
    public function newAction()
    {
    }

    /**
     * action create
     *
     * @param \DIX\Test\Domain\Model\Test $newTest
     * @return string|object|null|void
     */
    public function createAction(\DIX\Test\Domain\Model\Test $newTest)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->testRepository->add($newTest);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \DIX\Test\Domain\Model\Test $test
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("test")
     * @return string|object|null|void
     */
    public function editAction(\DIX\Test\Domain\Model\Test $test)
    {
        $this->view->assign('test', $test);
    }

    /**
     * action update
     *
     * @param \DIX\Test\Domain\Model\Test $test
     * @return string|object|null|void
     */
    public function updateAction(\DIX\Test\Domain\Model\Test $test)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->testRepository->update($test);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \DIX\Test\Domain\Model\Test $test
     * @return string|object|null|void
     */
    public function deleteAction(\DIX\Test\Domain\Model\Test $test)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->testRepository->remove($test);
        $this->redirect('list');
    }
}
