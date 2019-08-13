<?php

class Converdo_Support_StringBuilder
{
    /**
     * @var array
     */
    protected $sequence = [];

    /**
     * @var string
     */
    protected $separator;

    public function __construct($segment = null)
    {
        if ($segment) {
            $this->sequence[] = $segment;
        }
    }

    /**
     * @param mixed $value
     *
     * Appends the specified value to the sequence as a string.
     *
     * @return $this
     */
    public function append($value)
    {
        $this->sequence[] = $value;

        return $this;
    }

    /**
     * @param Converdo_Support_StringBuilder $stringBuilder
     *
     * Appends the specified value to the sequence as a string.
     *
     * @return $this
     */
    public function merge(Converdo_Support_StringBuilder $stringBuilder)
    {
        $this->append($stringBuilder->toString());
        return $this;
    }

    /**
     * @param mixed $separator
     *
     * Sets the separator which is inserted between each appended section.
     *
     * @return $this
     */
    public function setSeparator($separator)
    {
        $this->separator = $separator;
        return $this;
    }

    /**
     * @param Integer $index
     *
     * Returns the current capacity.
     *
     * @return String
     */
    public function charAt($index)
    {
        return $this->sequence[(int)$index];
    }

    /**
     * @param Integer $start The beginning index, inclusive.
     * @param Integer $end The ending index, exclusive.
     *
     * Removes the characters in a substring of this sequence.
     *
     * @return $this
     */
    public function delete($start, $end)
    {
        array_splice($this->sequence, $start, $end);
        return $this;
    }

    /**
     * Removes all items from the sequence..
     *
     * @return $this
     */
    public function clear()
    {
        $this->sequence = [];
        return $this;
    }

    /**
     * @param Integer $index Index of char to remove
     *
     * Removes the char at the specified position in this sequence.
     *
     * @return $this
     */
    public function deleteCharAt($index)
    {
        array_splice($this->sequence, $index, 1);
        return $this;
    }

    /**
     * @param Integer $start The beginning index, inclusive.
     * @param Integer $end The ending index, exclusive.
     * @param mixed $value Value that will replace previous contents.
     *
     * Removes the char at the specified position in this sequence.
     *
     * @return $this
     */
    public function replace($start, $end, $value)
    {
        for ($i = $start; $i <= $end - $start; $i++) {
            $this->sequence[(int) $i] = $value;
        }

        return $this;
    }

    /**
     * Causes this character sequence to be replaced by the reverse of the sequence.
     *
     * @return $this
     */
    public function reverse()
    {
        $this->sequence = array_reverse($this->sequence);
        return $this;
    }

    /**
     * Returns the length.
     *
     * @return Integer
     */
    public function length()
    {
        return strlen($this->toString());
    }

    /**
     * Returns a string representing the data in this sequence.
     *
     * @return String
     */
    public function toString()
    {
        return implode($this->separator, $this->sequence);
    }

    /**
     * Returns a string representing the data in this sequence, in lower case.
     *
     * @return String
     */
    public function toLowerCaseString()
    {
        return strtolower($this->toString());
    }
}