<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Index extends Controller
{
    public function agenda_evenement()
    {
        return get_field('agenda_evenement');
    }

    public function agenda_tijdstip()
    {
        return get_field('agenda_tijdstip');
    }

    public function agenda_locatie()
    {
        return get_field('agenda_locatie');
    }

    public function agenda_inschrijfformulier_url()
    {
        return get_field('agenda_inschrijfformulier_url');
    }

    public function action_box_vraagteken()
    {
        return get_field('action_box_vraagteken');
    }

    public function action_box_download()
    {
        return get_field('action_box_download');
    }

    public function project_afgerond()
    {
        return get_field('project_afgerond');
    }

    public function project_websites() {
        $return = '';

        // Get the appropriate projects
        $project_websites = get_field('project_websites');

        if(is_array($project_websites)) {
            $active = 'active';
            foreach($project_websites as $p) {
                $project_title = $p['project_title'];
                if (!$project_title) {
                    $project_title = rtrim(preg_replace('/^https?:\/\//', '', $p['project_url']), '/');
                }

                $return .= \App\template('partials.project-website-big-screenshot', [
                    'project_plaatje' => wp_get_attachment_image($p['project_plaatje'], 'medium', '', array("class" => "img-fluid screenshot-big")),
                    'project_url' => $p['project_url'],
                    'project_title' => $project_title,
                    'active' => $active,
                ]);

                // Only add the 'active' class to the first website
                if ($active) {
                    $active = '';
                }
            }
        }

        return $return;
    }

    public function project_websites_controls() {
        $return = '';

        // Get the appropriate projects
        $project_websites = get_field('project_websites');

        if(is_array($project_websites) && count($project_websites) > 1) {
            $counter = 0;
            $active = 'active';
            $return .= '<ol class="carousel-indicators d-block d-lg-flex">';
            foreach($project_websites as $p) {
                $project_title = $p['project_title'];
                if (!$project_title) {
                    $project_title = rtrim(preg_replace('/^https?:\/\//', '', $p['project_url']), '/');
                }

                $return .= \App\template('partials.project-website-small-screenshot', [
                    'project_screenshot_small' => wp_get_attachment_image($p['project_plaatje'], 'medium', '', array("class" => "img-fluid d-none d-lg-flex screenshot-small mx-auto")),
                    'project_title' => $project_title,
                    'active' => $active,
                    'counter' => $counter,
                ]);
                $counter++;

                // Only add the 'active' class to the first website
                if ($active) {
                    $active = '';
                }
            }
            $return .= '</ol>';
        }

        return $return;
    }

    public function project_websites_count() {
        $return = 0;

        // Get the appropriate projects
        $project_websites = get_field('project_websites');

        if(is_array($project_websites)) {
            $return = count($project_websites);
        }

        return $return;
    }
}
