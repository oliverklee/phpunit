<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Framework;

/**
 * @small
 */
final class TestSuiteIteratorTest extends TestCase
{
    /**
     * @test
     */
    public function currentAfterInstantiationForEmptyTestSuiteIsNull(): void
    {
        $testSuite = new TestSuite();
        $subject = new TestSuiteIterator($testSuite);

        self::assertNull($subject->current());
    }

    /**
     * @test
     */
    public function currentAfterRewindForEmptyTestSuiteIsNull(): void
    {
        $testSuite = new TestSuite();
        $subject = new TestSuiteIterator($testSuite);
        $subject->rewind();

        self::assertNull($subject->current());
    }

    /**
     * @test
     */
    public function validForNonEmptyTestSuiteInitiallyIsTrue(): void
    {
        $testSuite = new TestSuite();
        $testSuite->addTest(new \EmptyTestCaseTest());
        $subject = new TestSuiteIterator($testSuite);

        self::assertTrue($subject->valid());
    }
}
