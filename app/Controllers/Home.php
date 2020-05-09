<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$nasional = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/'), true);
		$prov = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/provinsi'), true);
		$data = [
			'title' => 'Data Nasional',
			'nasional' => $nasional,
			'prov' => $prov,
			'isi' => 'v_home',

		];
		echo view('layout/v_wrapper', $data);
	}

	public function pemetaan_nasional()
	{
		$prov = json_decode(file_get_contents('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json'), true);
		$data = [
			'title' => 'Pemetaan Covid-19 Nasional',
			'prov' => $prov,
			'isi' => 'v_pemetaan_nasional',

		];
		echo view('layout/v_wrapper', $data);
	}

	public function global()
	{
		$positif = json_decode(file_get_contents('https://api.kawalcorona.com/positif'), true);
		$sembuh = json_decode(file_get_contents('https://api.kawalcorona.com/sembuh'), true);
		$meninggal = json_decode(file_get_contents('https://api.kawalcorona.com/meninggal'), true);
		$global = json_decode(file_get_contents('https://api.kawalcorona.com/'), true);
		$data = [
			'title' => 'Data Global',
			'positif' => $positif,
			'sembuh' => $sembuh,
			'meninggal' => $meninggal,
			'global' => $global,
			'isi' => 'v_global',

		];
		echo view('layout/v_wrapper', $data);
	}

	public function pemetaan_global()
	{
		$global = json_decode(file_get_contents('https://api.kawalcorona.com/'), true);
		$data = [
			'title' => 'Pemetaan Covid-19 Global',
			'global' => $global,
			'isi' => 'v_pemetaan_global',

		];
		echo view('layout/v_wrapper', $data);
	}
}
