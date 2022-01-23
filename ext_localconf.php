<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Test',
        'Pi1',
        [
            \DIX\Test\Controller\TestController::class => 'index, list'
        ],
        // non-cacheable actions
        [
            \DIX\Test\Controller\TestController::class => 'index, list'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        iconIdentifier = test-plugin-pi1
                        title = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_pi1.name
                        description = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = test_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'test-plugin-pi1',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:test/Resources/Public/Icons/user_plugin_pi1.svg']
    );


    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['templateRootPaths'][701] = 'EXT:test/Resources/Private/Templates/Email';

})();
