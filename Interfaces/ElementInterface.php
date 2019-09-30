<?php

/**
 * Element Interface
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelElements\Interfaces;

use \Gibocode\LaravelElements\Element\Attribute;

interface ElementInterface {

    /**
     * Sets the name of the element
     * @param string $elementName
     */
    public function setElementName($elementName);

    /**
     * Sets the content of the element
     * @param string $content
     */
    public function setContent($content);

    /**
     * Adds a new attribute to the element
     * @param Attribute $attribute
     */
    public function addAttribute(Attribute $attribute);

    /**
     * Overrides the existing attribute or adds a new attribute to the element
     * @param Attribute $attribute
     */
    public function setAttribute(Attribute $attribute);

    /**
     * Sets an array of attributes to the element
     * @param array $attributes
     */
    public function setAttributes(array $attributes);

    /**
     * Sets or gets the element if self closed
     * @param null|bool $selfClose
     */
    public function isSelfClose($selfClose);

    /**
     * Gets the name of the element
     */
    public function getElementName();

    /**
     * Gets the content of the element
     */
    public function getContent();

    /**
     * Gets a specific attribute of the element
     * @param string $name
     */
    public function getAttribute($name);

    /**
     * Gets an array of attributes of the element
     */
    public function getAttributes();

    /**
     * Creates an HTML string of attributes
     */
    public function renderAttributes();

    /**
     * Creates an HTML element
     */
    public function render();
}