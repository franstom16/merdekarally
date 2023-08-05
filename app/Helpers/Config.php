<?php

if (! function_exists('app_menu'))
{
    function app_menu($page, $menu = [], $lvl = 0)
    {
        $res  = '';
        if ($lvl == 0)
        {
            $menu = [
                ['name' => 'Dashboard', 'link' => 'dashboard', 'icon' => 'icon-home2'],
                ['name' => 'Participant', 'link' => 'participants', 'icon' => 'icon-people'],
                ['name' => 'Assessment', 'link' => 'assessments', 'icon' => 'icon-finish'],
                ['name' => 'Race', 'icon' => 'icon-racing',
                 'child' => [
                     ['name' => 'Class', 'link' => 'race/class', 'icon' => 'icon-make-group'],
                     ['name' => 'Team', 'link' => 'race/team', 'icon' => 'icon-vcard'],
                     ['name' => 'Score', 'link' => 'race/score', 'icon' => 'icon-target2'],
                 ]
                ],
            ];
        }
        foreach ($menu as $mn)
        {
            $child  = !empty($mn['child']) ? array_column(array_values($mn['child']), 'link') : [];
            $slug   = !empty($mn['link']) ? url($mn['link']) : 'javascript:;';
            $active = !empty($mn['link']) && $mn['link'] == $page ? ' active mn-active' : '';
            $li_act = !empty($mn['child']) && in_array($page, $child) ? ' nav-item-expanded nav-item-open' : '';
            $li_sub = !empty($mn['child']) ? ' nav-item-submenu'. $li_act : '';
            $res   .= '<li class="nav-item'. $li_sub .'">';
            $res   .= '<a href="'. $slug .'" class="nav-link'. $active .'">';
            $res   .= '<i class="'. $mn['icon'] .'"></i> ';
            $res   .= $lvl == 0 ? '<span>'. $mn['name'] .'</span>' : $mn['name'];
            $res   .= '</a>';
            if (!empty($mn['child']))
            {
                $res .= '<ul class="nav nav-group-sub';
                $res .= $lvl == 0 ? '" data-submenu-title="'. $mn['name'] .'">' : '">';
                $res .= app_menu($page, $mn['child'], $lvl+1);
                $res .= '</ul>';
            }
            $res .= '</li>';
        }
		return $res;
    }
}

if (! function_exists('getUri'))
{
    function getUri()
    {
        $route  = \Request::route();
        return $route->uri;
    }
}
