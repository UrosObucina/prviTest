<?php
namespace Blog\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Uros 
 */
class CommentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Blog\Simpleblog\Domain\Model\Comment
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Blog\Simpleblog\Domain\Model\Comment();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCommentReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getComment()
        );
    }

    /**
     * @test
     */
    public function setCommentForStringSetsComment()
    {
        $this->subject->setComment('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'comment',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCommentdataReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getCommentdata()
        );
    }

    /**
     * @test
     */
    public function setCommentdataForDateTimeSetsCommentdata()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setCommentdata($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'commentdata',
            $this->subject
        );
    }
}
