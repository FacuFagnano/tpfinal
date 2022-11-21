<?php
class DailyController {
    private $dailyModel;
    private $view;

    public function __construct($dailyModel, $view, $logger)
    {
        
        $this->dailyModel = $dailyModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list(){
        $this->renderer->render('dailyView.mustache');
    }
}
