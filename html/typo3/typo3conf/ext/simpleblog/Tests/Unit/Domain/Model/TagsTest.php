<?php
namespace Blog\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Uros 
 */
class TagsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Blog\Simpleblog\Domain\Model\Tags
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Blog\Simpleblog\Domain\Model\Tags();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTagvalueReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTagvalue()
        );
    }

    /**
     * @test
     */
    public function setTagvalueForStringSetsTagvalue()
    {
        $this->subject->setTagvalue('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'tagvalue',
            $this->subject
        );
    }
}
