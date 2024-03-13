<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $aboutModel;
    protected $achievementsModel;
    protected $crewModel;
    protected $eventsModel;
    protected $programModel;
    protected $structureModel;
    protected $topchartModel;
    protected $pesanModel;
    protected $settingsModel;

    public function __construct()
    {
        $this->aboutModel        = new \App\Models\AboutModel();
        $this->achievementsModel = new \App\Models\AchievementsModel();
        $this->crewModel         = new \App\Models\CrewModel();
        $this->eventsModel       = new \App\Models\EventsModel();
        $this->programModel      = new \App\Models\ProgramModel();
        $this->structureModel    = new \App\Models\StructureModel();
        $this->topchartModel     = new \App\Models\TopChartModel();
        $this->pesanModel        = new \App\Models\PesanModel();
        $this->settingsModel     = new \App\Models\SettingsModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Rapma FM',
            'about'         => $this->aboutModel->paginate(5, 'about'),
            'achievements'  => $this->achievementsModel->paginate(5, 'achievements'),
            'events'        => $this->eventsModel->paginate(5, 'events'),
            'program'       => $this->programModel->paginate(5, 'program'),
            'structure'     => $this->structureModel->paginate(5, 'structure'),
            'crew'          => $this->crewModel->paginate(1, 'crew'),
            'topchart'      => $this->topchartModel->paginate(5, 'topchart'),
            'settings'      => $this->settingsModel->paginate(5, 'settings'),
        ];

        return view('home/index', $data);
    }

    // Save Data Messages
    public function save()
    {
        $this->pesanModel->save([
            'name'    => $this->request->getVar('name'),
            'email'   => $this->request->getVar('email'),
            'subject' => $this->request->getVar('subject'),
            'message' => $this->request->getVar('message'),
        ]);

        session()->setFlashdata('pesan', 'Pesan Anda Telan Dikirim! Terima Kasih CampusBrainers!');
        return redirect('index');
    }
}
