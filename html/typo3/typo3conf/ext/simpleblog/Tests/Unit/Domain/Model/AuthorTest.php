<?php
namespace Blog\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Uros 
 */
class AuthorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Blog\Simpleblog\Domain\Model\Author
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Blog\Simpleblog\Domain\Model\Author();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getFullnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFullname()
        );
    }

    /**
     * @test
     */
    public function setFullnameForStringSetsFullname()
    {
        $this->subject->setFullname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'fullname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }
}
