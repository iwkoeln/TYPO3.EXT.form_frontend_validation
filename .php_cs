<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config->getFinder()->in([__DIR__ . '/Classes', __DIR__ . '/Configuration/TCA']);
return $config;
