<?php

/**
 * Element Attribute Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelElements\Element;

use \Gibocode\LaravelElements\Interfaces\AttributeInterface;
use Exception;

class Attribute implements AttributeInterface {

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $value
     */
    protected $value = '';

    /**
     * Element Attribute Class Constructor
     * 
     * @param string $name
     * @param string $value
     * @return void
     */
    public function __construct($name, $value = '') {

        $this->setName($name);
        $this->setValue($value);
    }

    /**
     * Sets the name of the attribute
     * @param string $name
     * @return object
     */
    public function setName($name) {

        if (empty($name)) throw new Exception('Attribute [name] must not be empty.');

        $this->name = $name;

        return $this;
    }

    /**
     * Sets the value of the attribute
     * @param string $value
     * @return object
     */
    public function setValue($value) {

        $this->value = $value;

        return $this;
    }

    /**
     * Gets the name of the attribute
     * @return string
     */
    public function getName() {

        return $this->name;
    }

    /**
     * Gets the value of the attribute
     * @return string
     */
    public function getValue() {

        return $this->value;
    }

    /**
     * Creates an HTML string of the attribute
     * @return string
     */
    public function render() {

        // Checks if the attribute name is set
        $this->setName($this->getName());

        return $this->getName() . '="' . $this->getValue() . '"';
    }
}