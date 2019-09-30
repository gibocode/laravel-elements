<?php

/**
 * Element Attribute Interface
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelElements\Interfaces;

interface AttributeInterface {

    /**
     * Sets the name of the attribute
     * @param string $name
     */
    public function setName($name);

    /**
     * Sets the value of the attribute
     * @param string $value
     */
    public function setValue($value);

    /**
     * Gets the name of the attribute
     */
    public function getName();

    /**
     * Gets the value of the attribute
     */
    public function getValue();

    /**
     * Creates an HTML string of the attribute
     */
    public function render();
}