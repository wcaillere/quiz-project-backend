<?php

namespace App\Factory;

use App\Entity\Difficulty;
use App\Repository\DifficultyRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Difficulty>
 *
 * @method        Difficulty|Proxy create(array|callable $attributes = [])
 * @method static Difficulty|Proxy createOne(array $attributes = [])
 * @method static Difficulty|Proxy find(object|array|mixed $criteria)
 * @method static Difficulty|Proxy findOrCreate(array $attributes)
 * @method static Difficulty|Proxy first(string $sortedField = 'id')
 * @method static Difficulty|Proxy last(string $sortedField = 'id')
 * @method static Difficulty|Proxy random(array $attributes = [])
 * @method static Difficulty|Proxy randomOrCreate(array $attributes = [])
 * @method static DifficultyRepository|RepositoryProxy repository()
 * @method static Difficulty[]|Proxy[] all()
 * @method static Difficulty[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Difficulty[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Difficulty[]|Proxy[] findBy(array $attributes)
 * @method static Difficulty[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Difficulty[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class DifficultyFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Difficulty $difficulty): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Difficulty::class;
    }
}
