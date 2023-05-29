<?php

namespace Porifa\LaravelPackageKit\Tests\TestingPackage\Src\View\Components;

use Illuminate\View\Component;

class FooComponent extends Component
{
    public $message;

    /**
     * Create the component instance.
     *
     * @return void
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return '<div>' . $this->message . '</div>';
    }
}
