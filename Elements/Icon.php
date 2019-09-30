<?php

/**
 * Icon Element Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelElements\Elements;

use \Gibocode\LaravelElements\Element;
use \Gibocode\LaravelElements\Element\Attribute;
use Exception;

class Icon extends Element {

    /**
     * @var string ELEMENT_NAME
     */
    private const ELEMENT_NAME = 'span';

    /**
     * @var string $type
     */
    protected $type;

    /**
     * Icon Element Class Constructor
     * 
     * @param string $type
     * @return void
     */
    public function __construct($type) {

        $this->setType($type);

        $class =  new Attribute('class', $this->getClass());

        parent::__construct($this::ELEMENT_NAME, '', [$class]);
    }

    /**
     * Sets the type of the icon
     * @param string $type
     * @return Icon
     */
    public function setType($type) {

        if (empty($type)) throw new Exception('Icon [type] must not be empty.');

        $this->type = $type;

        return $this;
    }

    /**
     * Gets the type of the icon
     * @return string
     */
    public function getType() {

        return $this->type;
    }

    /**
     * Gets the class of the icon
     * @return string
     */
    public function getClass() {

        return 'fa ' . $this->getType();
    }

    /**
     * Creates an icon object
     * @param string $type
     * @return Icon
     */
    public static function create($type) {

        return new self($type);
    }
}