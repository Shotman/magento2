<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Captcha\Test\Constraint;

use Magento\Captcha\Test\Page\Captcha\AdminAuthLoginWithCaptcha;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Assert captcha on backend login page.
 */
class AssertCaptchaFieldOnBackend extends AbstractConstraint
{
    /**
     * Assert captcha and reload button visibility on backend login page.
     *
     * @param AdminAuthLoginWithCaptcha $adminAuthLogin
     * @return void
     */
    public function processAssert(AdminAuthLoginWithCaptcha $adminAuthLogin)
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $adminAuthLogin->getLoginBlockWithCaptcha()->getCaptcha()->isVisible(),
            'Captcha image is not present on backend login page.'
        );

        \PHPUnit_Framework_Assert::assertTrue(
            $adminAuthLogin->getLoginBlockWithCaptcha()->getCaptchaReloadButton()->isVisible(),
            'Captcha reload button is not present on backend login page.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Captcha and reload button are presents on backend login page.';
    }
}
