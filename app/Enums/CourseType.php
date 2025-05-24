<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CourseType extends Enum
{
    const MATH = 'math';
    const ENGLISH = 'english';
    const RUSSIAN = 'russian';

    public static function toSelectArray(): array
    {
        return [
            self::MATH => 'Matematika',
            self::ENGLISH => 'Ingliz tili',
            self::RUSSIAN => 'Rus tili',
        ];
    }
}
