<?php

namespace ACFStatisticsViewerLite\Includes;

/**
 * Manages and registers all hooks (actions and filters) for the plugin.
 */
class ACF_Statistics_Viewer_Lite_Loader {

    /**
     * @var array Holds all the actions to be registered.
     */
    protected array $actions;

    /**
     * @var array Holds all the filters to be registered.
     */
    protected array $filters;

    /**
     * Initializes the collections to store hooks and filters.
     */
    public function __construct() {
        $this->actions = [];
        $this->filters = [];
    }

    /**
     * Adds an action to the collection to be registered with WordPress.
     *
     * @param string $hook The name of the WordPress action to be registered.
     * @param object $component A reference to the instance of the object on which the action is defined.
     * @param string $callback The name of the function definition on the $component.
     * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
     * @param int $accepted_args Optional. The number of arguments that should be passed to the $callback. Default is 1.
     */
    public function add_action(string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1): void {
        $this->actions[] = compact('hook', 'component', 'callback', 'priority', 'accepted_args');
    }

    /**
     * Adds a filter to the collection to be registered with WordPress.
     *
     * @param string $hook The name of the WordPress filter to be registered.
     * @param object $component A reference to the instance of the object on which the filter is defined.
     * @param string $callback The name of the function definition on the $component.
     * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
     * @param int $accepted_args Optional. The number of arguments that should be passed to the $callback. Default is 1.
     */
    public function add_filter(string $hook, object $component, string $callback, int $priority = 10, int $accepted_args = 1): void {
        $this->filters[] = compact('hook', 'component', 'callback', 'priority', 'accepted_args');
    }

    /**
     * Registers the filters and actions with WordPress.
     */
    public function run(): void {
        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], [$hook['component'], $hook['callback']], $hook['priority'], $hook['accepted_args']);
        }

        foreach ($this->actions as $hook) {
            add_action($hook['hook'], [$hook['component'], $hook['callback']], $hook['priority'], $hook['accepted_args']);
        }
    }
}
