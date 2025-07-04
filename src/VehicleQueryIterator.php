<?php

namespace Indielab\AutoScout24;

use Countable;
use Indielab\AutoScout24\Vehicle;

class VehicleQueryIterator implements \Iterator, Countable
{
    private array $_data;

    public function __construct(array $data)
    {
        $this->_data = $data;
    }

    public int $totalResultCount;

    public int $totalPages;

    public int $currentPage;

    public int $currentPageResultCount;

    /**
     * @return int The count of items in the collection
     */
    #[\ReturnTypeWillChange]
    public function count(): int
    {
        return count($this->_data);
    }

    /**
     * Rewind the Iterator to the first element
     */
    #[\ReturnTypeWillChange]
    public function rewind(): void
    {
        reset($this->_data);
    }

    /**
     * @return Vehicle Returns the Vehicle Object.
     */
    #[\ReturnTypeWillChange]
    public function current(): Vehicle
    {
        return new Vehicle(current($this->_data));
    }

    /**
     * @return mixed The current position key
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return key($this->_data);
    }

    /**
     * Move forward to next element
     */
    #[\ReturnTypeWillChange]
    public function next(): void
    {
        next($this->_data);
    }

    /**
     * Checks if current position is valid
     * 
     * @return bool Whether the current position is valid
     */
    #[\ReturnTypeWillChange]
    public function valid(): bool
    {
        return key($this->_data) !== null;
    }
}
