<?php
/*
 * Add this file to a directory named `mykeys` in the plugin directory. Reload 
 * TT-RSS and enable the plugin via Preferences→Plugins.
 */
class MyKeys extends Plugin {

    private $link;
    private $host;

    function about() {
        return [
            1.0,
            'Personal keyboard configuration',
            'dandersson',
            false];
    }

    function init($host) {
        $this->link = $host->get_link();
        $this->host = $host;

        $host->add_hook($host::HOOK_HOTKEY_MAP, $this);
    }

    function hook_hotkey_map($hotkeys) {
        $hotkeys['(13)|enter']    = 'open_in_new_window';
        $hotkeys['*(13)|s-enter'] = 'open_in_background_tab';
        $hotkeys['(37)|left']     = 'prev_article_noscroll';
        $hotkeys['(38)|up']       = 'article_scroll_up';
        $hotkeys['(39)|right']    = 'next_article_noscroll';
        $hotkeys['(40)|down']     = 'article_scroll_down';
        $hotkeys['*(38)|s-up']    = 'prev_feed';
        $hotkeys['*(40)|s-down']  = 'next_feed';

        return $hotkeys;
    }
}

