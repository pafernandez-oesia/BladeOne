<?php

namespace eftec\tests;

use eftec\bladeone\BladeOne;
use PHPUnit\Framework\TestCase;

/**
 * @author G.J.W. Oolbekkink <g.j.w.oolbekkink@gmail.com>
 * @since 16/09/2018
 */
abstract class AbstractBladeTestCase extends TestCase {
    const TEMPLATE_PATH = __DIR__ . '/resources/templates';
    const COMPILED_PATH = __DIR__ . '/resources/compiled';

    protected $blade;
    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->blade = new BladeOne(self::TEMPLATE_PATH, self::COMPILED_PATH, BladeOne::MODE_DEBUG);

    }
	/*
    // tearDown on php7.2 is implemented as tearDown():void. However PHP 5.6 doesn't allows it.
	// So I comment this line because it breaks Travis.
	protected function tearDown() {
        // Remove files compiled in this test to prevent side effects.
        array_map('unlink', glob(self::COMPILED_PATH . "/*"));
    }
	*/

    public function assertEqualsIgnoringWhitespace($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false) {
        $this->assertEquals(
            preg_replace('/\s/', '', $expected),
            preg_replace('/\s/', '', $actual),
            $message, $delta, $maxDepth, $canonicalize, $ignoreCase
        );
    }
}
