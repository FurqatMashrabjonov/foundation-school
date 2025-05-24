<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use Mokhosh\FilamentKanban\Concerns\IsKanbanStatus;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
enum ApplicationStatus: string
{
    use IsKanbanStatus;

    case NEW = 'new';
    case CALLED = 'called';
    case CANCELLED = 'cancelled';

    public static function toSelectArray(): array
    {
        return [
            self::NEW->value => 'Yangi',
            self::CALLED->value => 'Qo\'ng\'iroq qilingan',
            self::CANCELLED->value => 'Bekor qilingan',
        ];
    }
}
