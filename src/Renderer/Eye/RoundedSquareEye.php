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
            ->move(-1.25, -3.5)
            ->line(1.25, -3.5) // 1
            ->ellipticArc(2.15,-2.15, 0, false, true, 3.5, -1.25) // 2
            ->line(3.5, 1.25)// 3
            ->ellipticArc(2.15, 2.15, 0, false, true, 1.25, 3.5) // 4
            ->line(-1.25, 3.5) // 5
            ->ellipticArc(-2.15, 2.15, 0, false, true, -3.5, 1.25) // 6
            ->line(-3.5, -1.25) // 7
            ->ellipticArc(-2.15,-2.15, 0, false, true, -1.25, -3.5) // 8
            ->close()
            ->move(-1, -2.45)
            ->line(1, -2.45) // 1
            ->ellipticArc(1.35,-1.35, 0, false, true, 2.45, -1) // 2
            ->line(2.45, 1)// 3
            ->ellipticArc(1.35, 1.35, 0, false, true, 1, 2.45) // 4
            ->line(-1, 2.45) // 5
            ->ellipticArc(-1.35, 1.35, 0, false, true, -2.45, 1) // 6
            ->line(-2.45, -1) // 7
            ->ellipticArc(-1.35,-1.35, 0, false, true, -1, -2.45) // 8
            ->close()
        ;
    }

    public function getInternalPath() : Path
    {
        return (new Path())
            ->move(-0.5, -1.5)
            ->line(0.5, -1.5) // 1
            ->ellipticArc(0.95,-0.95, 0, false, true, 1.5, -0.5) // 2
            ->line(1.5, 0.5)// 3
            ->ellipticArc(0.95, 0.95, 0, false, true, 0.5, 1.5) // 4
            ->line(-0.5, 1.5) // 5
            ->ellipticArc(-0.95, 0.95, 0, false, true, -1.5, 0.5) // 6
            ->line(-1.5, -0.5) // 7
            ->ellipticArc(-0.95,-0.95, 0, false, true, -0.5, -1.5) // 8
            ->close()
        ;
    }
}
