<?php

namespace App\Controllers;

class Settings extends BaseController
{
    protected $settingsModel;

    public function __construct()
    {
        $this->settingsModel = new \App\Models\SettingsModel();
    }

    // Settings
    public function index()
    {
        $data = [
            'title'       => 'Rapma FM | Settings',
            'settings'    => $this->settingsModel->paginate(5, 'settings'),
        ];

        return view('control/settings/index', $data);
    }

    // Update Data
    public function update($id)
    {
        $this->settingsModel->save([
            'id'            => $id,
            'owner'         => $this->request->getVar('owner'),
            'slogan'        => $this->request->getVar('slogan'),
            'nama_mtalent'  => $this->request->getVar('nama_mtalent'),
            'no_mtalent'    => $this->request->getVar('no_mtalent'),
            'nama_medpart'  => $this->request->getVar('nama_medpart'),
            'no_medpart'    => $this->request->getVar('no_medpart'),
            'ymail'         => $this->request->getVar('ymail'),
            'gmail'         => $this->request->getVar('gmail'),
            'alamat'        => $this->request->getVar('alamat'),
            'twitter'       => $this->request->getVar('twitter'),
            'facebook'      => $this->request->getVar('facebook'),
            'instagram'     => $this->request->getVar('instagram'),
            'youtube'       => $this->request->getVar('youtube'),
            'spotify'       => $this->request->getVar('spotify'),
            'whatsapp'      => $this->request->getVar('whatsapp'),
            'blogger'       => $this->request->getVar('blogger'),
            'line'          => $this->request->getVar('line'),
            'tiktok'        => $this->request->getVar('tiktok'),
            'streaming'     => $this->request->getVar('streaming'),
        ]);

        session()->setFlashdata('pesan', 'Data Settings Berhasil Diubah!');
        return redirect('control/settings');
    }
}
