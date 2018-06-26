<?php namespace App\Http\Functions;


class UnidbFunction extends ApimdsFunction
{
    protected $service = '/unidb/';

    public function searchArea($search = '', $offset = 0)
    {
        $url = $this->urlBase . $this->service . 'areas?search=' . urlencode($search) . '&limit=&offset=' . $offset;
        $this->call($url);
    }

    public function getDatosArea($id)
    {
        $url = $this->urlBase . $this->service . 'areas/' . $id;
        $this->call($url);
    }

    public function searchSede($search, $offset = 0)
    {
        $url = $this->urlBase . $this->service . 'sedes?search=' . urlencode($search) . '&offset=' . $offset;
        $this->call($url);
    }

    public function getDatosSede($id)
    {
        $url = $this->urlBase . $this->service . 'sedes/' . $id;
        $this->call($url);
    }

    public function getOficinas($id)
    {
        $url = $this->urlBase . $this->service . 'areas/' . $id . '/oficinas';
        $this->call($url);
    }

    public function listContratos()
    {
        $url = $this->urlBase . $this->service . 'contratos';
        $this->call($url);
    }
}