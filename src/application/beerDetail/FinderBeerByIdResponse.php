<?php


namespace App\application\beerDetail;

/**
 * Class FinderBeerByIdResponse
 * @package App\application\beerDetail
 */
class FinderBeerByIdResponse
{
    /** @var int $id */
    private $id;
    /** @var string $name */
    private $name;
    /** @var string $description */
    private $description;
    /** @var string $image */
    private $image;
    /** @var string $tagline */
    private $tagline;
    /** @var string $firstBrewed */
    private $firstBrewed;

    /**
     * FinderBeerByIdResponse constructor.
     * @param int $id
     * @param string $name
     * @param string $description
     * @param string $image
     * @param string $tagline
     * @param string $firstBrewed
     */
    public function __construct(
        int $id,
        string $name,
        string $description,
        string $tagline,
        string $firstBrewed,
        string $image = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->tagline = $tagline;
        $this->firstBrewed = $firstBrewed;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getTagline(): string
    {
        return $this->tagline;
    }

    /**
     * @return string
     */
    public function getFirstBrewed(): string
    {
        return $this->firstBrewed;
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->getId() ?? "",
            'name' => $this->getName() ?? "",
            'description' => $this->getDescription() ?? "",
            'image' => $this->getImage() ?? "",
            'tag_line' => $this->getTagline() ?? "",
            'first_brewed' => $this->getFirstBrewed() ?? "",
        ];
    }
}