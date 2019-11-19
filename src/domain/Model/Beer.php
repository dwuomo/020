<?php


namespace App\domain\Model;


/**
 * Class Beer
 * @package App\domain\Model
 */
class Beer
{
    /** @var int $id */
    private $id;
    /** @var string $name */
    private $name;
    /** @var string $tagline */
    private $tagline;
    /** @var string $firstBrewed */
    private $firstBrewed;
    /** @var string $description */
    private $description;
    /** @var string $imageUrl */
    private $imageUrl;
    /** @var float $abv */
    private $abv;
    /** @var int $ibu */
    private $ibu;
    /** @var int $targetFg */
    private $targetFg;
    /** @var int $targetOg */
    private $targetOg;
    /** @var int $ebc */
    private $ebc;
    /** @var int $srm */
    private $srm;
    /** @var float|null ph */
    private $ph;
    /** @var int $attenuationLevel */
    private $attenuationLevel;
    /** @var Volume $volume */
    private $volume;
    /** @var BoilVolume */
    private $boilVolume;
    /** @var Method */
    private $method;
    /** @var Ingredients */
    private $ingredients;
    /** @var FoodPairing $foodPairing */
    private $foodPairing;
    /** @var string $brewedTips */
    private $brewedTips;
    /** @var string $contributedBy */
    private $contributedBy;

    /**
     * Beer constructor.
     * @param int $id
     * @param string $name
     * @param string $tagline
     * @param string $firstBrewed
     * @param string $description
     * @param string $imageUrl
     * @param float $abv
     * @param int $ibu
     * @param int $targetFg
     * @param int $targetOg
     * @param int $ebc
     * @param int $srm
     * @param float|null $ph
     * @param int $attenuationLevel
     * @param Volume $volume
     * @param BoilVolume $boilVolume
     * @param Method $method
     * @param Ingredients $ingredients
     * @param FoodPairing $foodPairing
     * @param string $brewedTips
     * @param string $contributedBy
     */
    public function __construct(
        int $id,
        string $name,
        string $tagline,
        string $firstBrewed,
        string $description,
        float $abv,
        int $targetFg,
        int $targetOg,
        int $attenuationLevel,
        Volume $volume,
        BoilVolume $boilVolume,
        Method $method,
        Ingredients $ingredients,
        FoodPairing $foodPairing,
        string $brewedTips,
        string $contributedBy,
        string $imageUrl = null,
        int $ibu = null,
        int $ebc = null,
        int $srm = null,
        float $ph = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->tagline = $tagline;
        $this->firstBrewed = $firstBrewed;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
        $this->abv = $abv;
        $this->ibu = $ibu;
        $this->targetFg = $targetFg;
        $this->targetOg = $targetOg;
        $this->ebc = $ebc;
        $this->srm = $srm;
        $this->ph = $ph;
        $this->attenuationLevel = $attenuationLevel;
        $this->volume = $volume;
        $this->boilVolume = $boilVolume;
        $this->method = $method;
        $this->ingredients = $ingredients;
        $this->foodPairing = $foodPairing;
        $this->brewedTips = $brewedTips;
        $this->contributedBy = $contributedBy;
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
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @return float
     */
    public function getAbv(): float
    {
        return $this->abv;
    }

    /**
     * @return int
     */
    public function getIbu(): int
    {
        return $this->ibu;
    }

    /**
     * @return int
     */
    public function getTargetFg(): int
    {
        return $this->targetFg;
    }

    /**
     * @return int
     */
    public function getTargetOg(): int
    {
        return $this->targetOg;
    }

    /**
     * @return int
     */
    public function getEbc(): int
    {
        return $this->ebc;
    }

    /**
     * @return int
     */
    public function getSrm(): int
    {
        return $this->srm;
    }

    /**
     * @return float
     */
    public function getPh(): float
    {
        return $this->ph;
    }

    /**
     * @return int
     */
    public function getAttenuationLevel(): int
    {
        return $this->attenuationLevel;
    }

    /**
     * @return Volume
     */
    public function getVolume(): Volume
    {
        return $this->volume;
    }

    /**
     * @return BoilVolume
     */
    public function getBoilVolume(): BoilVolume
    {
        return $this->boilVolume;
    }

    /**
     * @return Method
     */
    public function getMethod(): Method
    {
        return $this->method;
    }

    /**
     * @return Ingredients
     */
    public function getIngredients(): Ingredients
    {
        return $this->ingredients;
    }

    /**
     * @return FoodPairing
     */
    public function getFoodPairing(): FoodPairing
    {
        return $this->foodPairing;
    }

    /**
     * @return string
     */
    public function getBrewedTips(): string
    {
        return $this->brewedTips;
    }

    /**
     * @return string
     */
    public function getContributedBy(): string
    {
        return $this->contributedBy;
    }
}