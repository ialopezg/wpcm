<?php

/**
 * @package wpcm
 */

namespace WPCMPlugin;

final class Init {
    /**
     * Store all the classes inside an array.
     *
     * @return array Full list of classes.
     */
    public static function get_services() {
        return array(
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\Links::class,
            Base\ApartmentsController::class,
            Base\RoomsController::class,
            Base\ParkingsController::class,
            Base\DepositsController::class,
            Base\TestimonialsController::class,
            Base\TemplatesController::class,
            Base\SecurityController::class,
            Base\MembershipController::class,
            Base\ChatController::class
        );
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists.
     */
    public static function register_services() {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class.
     *
     * @param object $class Class from the services array.
     *
     * @return object mixed New instance of the class.
     */
    public static function instantiate($class) {
        return new $class();
    }
}