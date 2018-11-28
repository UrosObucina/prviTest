<?php
namespace Blog\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Uros 
 */
class BlogTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Blog\Simpleblog\Domain\Model\Blog
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Blog\Simpleblog\Domain\Model\Blog();
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
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPostReturnsInitialValueForPost()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPost()
        );
    }

    /**
     * @test
     */
    public function setPostForObjectStorageContainingPostSetsPost()
    {
        $post = new \Blog\Simpleblog\Domain\Model\Post();
        $objectStorageHoldingExactlyOnePost = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePost->attach($post);
        $this->subject->setPost($objectStorageHoldingExactlyOnePost);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePost,
            'post',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPostToObjectStorageHoldingPost()
    {
        $post = new \Blog\Simpleblog\Domain\Model\Post();
        $postObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $postObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($post));
        $this->inject($this->subject, 'post', $postObjectStorageMock);

        $this->subject->addPost($post);
    }

    /**
     * @test
     */
    public function removePostFromObjectStorageHoldingPost()
    {
        $post = new \Blog\Simpleblog\Domain\Model\Post();
        $postObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $postObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($post));
        $this->inject($this->subject, 'post', $postObjectStorageMock);

        $this->subject->removePost($post);
    }
}
