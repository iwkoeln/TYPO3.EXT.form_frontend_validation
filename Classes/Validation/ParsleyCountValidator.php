<?php

namespace R3H6\FormFrontendValidation\Validation;

use R3H6\FormFrontendValidation\Utility\FormElementUtility;
use TYPO3\CMS\Extbase\Validation\Validator\ValidatorInterface;
use TYPO3\CMS\Form\Domain\Model\FormElements\FormElementInterface;

/***
 *
 * This file is part of the "OAuth2 Server" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020
 *
 ***/

 /**
  * ParsleyCountValidator
  */
class ParsleyCountValidator implements FrontendValidatorInterface
{
    public function __invoke(FormElementInterface $formElement, ValidatorInterface $validator): void
    {
        FormElementUtility::addAttribute($formElement, 'data-parsley-trigger', 'change');
        FormElementUtility::addAttribute($formElement, 'data-parsley-errors-container', '#' . $formElement->getUniqueIdentifier() . '-error-container');

        $options = array_merge(['minimum' => 0, 'maximum' => 0], $validator->getOptions());

        if ($options['minimum'] && $options['maximum']) {
            FormElementUtility::addAttribute($formElement, 'data-parsley-mincheck', $options['minimum']);
            FormElementUtility::addAttribute($formElement, 'data-parsley-maxcheck', $options['maximum']);
            FormElementUtility::addAttribute($formElement, 'data-parsley-error-message', FormElementUtility::getErrorMessage($formElement, 1475002994, [$options['minimum'], $options['maximum']]));
        } elseif ($options['minimum']) {
            FormElementUtility::addAttribute($formElement, 'data-parsley-mincheck', $options['minimum']);
            FormElementUtility::addAttribute($formElement, 'data-parsley-error-message', FormElementUtility::getErrorMessage($formElement, 1475002994, [$options['minimum'], '∞']));
        } elseif ($options['maximum']) {
            FormElementUtility::addAttribute($formElement, 'data-parsley-maxcheck', $options['maximum']);
            FormElementUtility::addAttribute($formElement, 'data-parsley-error-message', FormElementUtility::getErrorMessage($formElement, 1475002994, ['0', $options['maximum']]));
        }
    }
}
