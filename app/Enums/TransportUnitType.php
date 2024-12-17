<?php
namespace App\Enums;

enum TransportUnitType: string
{
    case TRUCK = 'truck';
    case TRAILER = 'trailer';

    public function label(): string
    {
        return match ($this) {
            self::TRUCK => 'Truck',
            self::TRAILER => 'Trailer',
        };
    }

    /**
     * Get all allowed types.
     *
     * @return array
     */
    public static function getAllowedTypes(): array
    {
        return array_column(self::cases(), 'value');
    }
}
