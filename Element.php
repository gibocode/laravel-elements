<?php

/**
 * Element Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelElements;

use \Gibocode\LaravelElements\Interfaces\ElementInterface;
use \Gibocode\LaravelElements\Element\Attribute;
use Exception;

class Element implements ElementInterface {

    /**
     * @var string $elementName
     */
    protected $elementName;

    /**
     * @var string $content
     */
    protected $content = '';

    /**
     * @var array $attributes
     */
    protected $attributes = [];

    /**
     * @var bool $selfClose
     */
    protected $selfClose = false;

    /**
     * Element Class Constructor
     * 
     * @param string $elementName
     * @param string $content
     * @param array $attributes
     * @param bool $selfClose
     * @return void
     */
    public function __construct($elementName, $content = '', $attributes = [], $selfClose = false) {

        $this->setElementName($elementName);
        $this->setContent($content);
        $this->setAttributes($attributes);
        $this->isSelfClose($selfClose);
    }

    /**
     * Sets the name of the element
     * @param string $elementName
     * @return object
     */
    public function setElementName($elementName) {

        if (empty($elementName)) throw new Exception('Element [name] must not be empty.');

        $this->elementName = $elementName;

        return $this;
    }

    /**
     * Sets the content of the element
     * @param string $content
     * @return object
     */
    public function setContent($content) {

        $this->content = $content;

        return $this;
    }

    /**
     * Adds a new attribute to the element
     * @param Attribute $attribute
     * @return object
     */
    public function addAttribute(Attribute $attribute) {

        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * Overrides the existing attribute or adds a new attribute to the element
     * @param Attribute $attribute
     * @return object
     */
    public function setAttribute(Attribute $attribute) {

        // Overrides existing attribute if existing
        foreach ($this->getAttributes() as $index => $_attribute) {

            if ($_attribute->getName() == $attributes->getName()) {

                $this->attributes[$index] = $attribute;

                return $this;
            }
        }

        return $this->addAttribute($attribute);
    }

    /**
     * Sets an array of attributes to the element
     * @param array $attributes
     * @return object
     */
    public function setAttributes(array $attributes) {

        foreach ($attributes as $attribute) {

            $this->addAttribute($attribute);
        }

        return $this;
    }

    /**
     * Sets or gets the element if self closed
     * @param null|bool $selfClose
     * @return bool|object
     */
    public function isSelfClose($selfClose = null) {

        if (!is_null($selfClose) && is_bool($selfClose)) {

            $this->selfClose = $selfClose;
        }

        return $this->selfClose;
    }

    /**
     * Gets the name of the element
     * @return string
     */
    public function getElementName() {

        return $this->elementName;
    }

    /**
     * Gets the content of the element
     * @return string
     */
    public function getContent() {
        
        return $this->content;
    }

    /**
     * Gets a specific attribute of the element
     * @param string $elementName
     * @return Attribute
     */
    public function getAttribute($elementName) {

        $attribute = null;

        foreach ($this->getAttributes() as $_attribute) {

            if ($_attribute->getName() == $elementName) {

                $attribute = $_attribute;
                break;
            }
        }

        return $attribute;
    }

    /**
     * Gets an array of attributes of the element
     * @return array
     */
    public function getAttributes() {

        return $this->attributes;
    }

    /**
     * Creates an HTML string of attributes
     * @return string
     */
    public function renderAttributes() {

        $htmlAttributes = '';

        foreach ($this->getAttributes() as $attribute) {

            $htmlAttributes .= $attribute->render();
        }

        return $htmlAttributes;
    }

    /**
     * Creates an HTML element
     * @return string
     */
    public function render() {

        // Checks if the element name is set
        $this->setElementName($this->getElementName());

        $html = '<' . $this->getElementName() . ' ' . $this->renderAttributes() . '/>';
        
        if (!$this->isSelfClose()) {

            $html = str_replace('/>', '>', $html) . $this->getContent() . '</' . $this->getElementName() . '>';
        }

        return $html;
    }
}