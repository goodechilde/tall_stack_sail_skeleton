<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;

class MainNavLink extends Component
{
    public $routeName;
    public $displayName;

    /**
     * Create a new component instance.
     *
     * @param $routeName
     * @param null $displayName
     */
    public function __construct($routeName, $displayName = null)
    {
        $this->routeName = $routeName;
        $this->displayName = ($displayName) ?: ucwords(str_replace("-"," ",$routeName));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navigation.main-nav-link');
    }
}
