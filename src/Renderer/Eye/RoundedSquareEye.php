<?php
declare(strict_types = 1);

namespace BaconQrCode\Renderer\Eye;

use BaconQrCode\Renderer\Path\Path;

/**
 * Renders the eyes in their default square shape.
 */ 
final class RoundedSquareEye implements EyeInterface
{
    /**
     * @var self|null
     */
    private static $instance;

    private function __construct()
    {
    }

    public static function instance() : self
    {
        return self::$instance ?: self::$instance = new self();
    }

    public function getExternalPath() : Path
    {
        return (new Path())
            ->move(-1.25, -3.25)
            ->line(1.25, -3.25)
            ->ellipticArc(2.5,-2.5, 0, false, true, 3.25, -1.25)
            ->line(3.25, 1.25)
            ->ellipticArc(2.5, 2.5, 0, false, true, 1.25, 3.25)
            ->line(-1.25, 3.25)
            ->ellipticArc(-2.5, 2.5, 0, false, true, -3.25, 1.25)
            ->line(-3.25, -1.25)
            ->ellipticArc(-2.5,-2.5, 0, false, true, -1.25, -3.25)
            ->close()
            ->move(-1, -2.25)
            ->line(1, -2.25)
            ->ellipticArc(1.5,-1.5, 0, false, true, 2.25, -1)
            ->line(2.25, 1)
            ->ellipticArc(1.5, 1.5, 0, false, true, 1, 2.25)
            ->line(-1, 2.25)
            ->ellipticArc(-1.5, 1.5, 0, false, true, -2.25, 1)
            ->line(-2.25, -1)
            ->ellipticArc(-1.5,-1.5, 0, false, true, -1, -2.25)
            ->close()
        ;
    }

    public function getInternalPath() : Path
    {
        return (new Path())
            ->move(-0.5, -1.5)
            ->line(0.5, -1.5) // 1
            ->ellipticArc(1,-1, 0, false, true, 1.5, -0.5) // 2
            ->line(1.5, 0.5)// 3
            ->ellipticArc(1, 1, 0, false, true, 0.5, 1.5) // 4
            ->line(-0.5, 1.5) // 5
            ->ellipticArc(-1, 1, 0, false, true, -1.5, 0.5) // 6
            ->line(-1.5, -0.5) // 7
            ->ellipticArc(-1,-1, 0, false, true, -0.5, -1.5) // 8
            ->close()
        ;
    }
}
