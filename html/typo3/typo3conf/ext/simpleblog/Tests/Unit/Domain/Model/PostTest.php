<?php
namespace Blog\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Uros 
 */
class PostTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Blog\Simpleblog\Domain\Model\Post
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Blog\Simpleblog\Domain\Model\Post();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getContentReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContent()
        );
    }

    /**
     * @test
     */
    public function setContentForStringSetsContent()
    {
        $this->subject->setContent('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'content',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPostdateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getPostdate()
        );
    }

    /**
     * @test
     */
    public function setPostdateForDateTimeSetsPostdate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPostdate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'postdate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCommentReturnsInitialValueForComment()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getComment()
        );
    }

    /**
     * @test
     */
    public function setCommentForObjectStorageContainingCommentSetsComment()
    {
        $comment = new \Blog\Simpleblog\Domain\Model\Comment();
        $objectStorageHoldingExactlyOneComment = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneComment->attach($comment);
        $this->subject->setComment($objectStorageHoldingExactlyOneComment);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneComment,
            'comment',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addCommentToObjectStorageHoldingComment()
    {
        $comment = new \Blog\Simpleblog\Domain\Model\Comment();
        $commentObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $commentObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($comment));
        $this->inject($this->subject, 'comment', $commentObjectStorageMock);

        $this->subject->addComment($comment);
    }

    /**
     * @test
     */
    public function removeCommentFromObjectStorageHoldingComment()
    {
        $comment = new \Blog\Simpleblog\Domain\Model\Comment();
        $commentObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $commentObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($comment));
        $this->inject($this->subject, 'comment', $commentObjectStorageMock);

        $this->subject->removeComment($comment);
    }

    /**
     * @test
     */
    public function getTagsReturnsInitialValueForTags()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTags()
        );
    }

    /**
     * @test
     */
    public function setTagsForObjectStorageContainingTagsSetsTags()
    {
        $tag = new \Blog\Simpleblog\Domain\Model\Tags();
        $objectStorageHoldingExactlyOneTags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTags->attach($tag);
        $this->subject->setTags($objectStorageHoldingExactlyOneTags);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTags,
            'tags',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTagToObjectStorageHoldingTags()
    {
        $tag = new \Blog\Simpleblog\Domain\Model\Tags();
        $tagsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tag));
        $this->inject($this->subject, 'tags', $tagsObjectStorageMock);

        $this->subject->addTag($tag);
    }

    /**
     * @test
     */
    public function removeTagFromObjectStorageHoldingTags()
    {
        $tag = new \Blog\Simpleblog\Domain\Model\Tags();
        $tagsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tag));
        $this->inject($this->subject, 'tags', $tagsObjectStorageMock);

        $this->subject->removeTag($tag);
    }

    /**
     * @test
     */
    public function getAuthorReturnsInitialValueForAuthor()
    {
        self::assertEquals(
            null,
            $this->subject->getAuthor()
        );
    }

    /**
     * @test
     */
    public function setAuthorForAuthorSetsAuthor()
    {
        $authorFixture = new \Blog\Simpleblog\Domain\Model\Author();
        $this->subject->setAuthor($authorFixture);

        self::assertAttributeEquals(
            $authorFixture,
            'author',
            $this->subject
        );
    }
}
