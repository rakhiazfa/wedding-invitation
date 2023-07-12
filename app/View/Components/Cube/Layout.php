<?php

namespace App\View\Components\Cube;

use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var array
     */
    public array $meta = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title = "", array $meta = [])
    {
        $this->title = $title . ' - ' . env('APP_NAME');
        $this->meta = $meta;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cube.layout');
    }
}
